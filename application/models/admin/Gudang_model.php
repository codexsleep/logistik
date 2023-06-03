<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Load library PhpSpreadsheet
require_once APPPATH . 'third_party/vendor/autoload.php';

// Use classes from PhpSpreadsheet namespace
use PhpOffice\PhpSpreadsheet\IOFactory;

class Gudang_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function importDataFromExcel($file_path) {

    
        // Load file Excel
        $spreadsheet = IOFactory::load($file_path);
    
        // Mendapatkan data dari lembar aktif (sheet)
        $sheet = $spreadsheet->getActiveSheet();
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
    
        $data = array();
        // Looping baris (mulai dari baris kedua, baris pertama adalah header)
        for ($row = 2; $row <= $highestRow; $row++) {
            // Memeriksa apakah semua nilai kolom pada baris tersebut kosong
            $rowData = [];
            $isEmptyRow = true;
            for ($col = 'A'; $col <= $highestColumn; $col++) {
                $cellValue = $sheet->getCell($col . $row)->getValue();
                $rowData[] = $cellValue;
                if (!empty($cellValue)) {
                    $isEmptyRow = false;
                }
            }
    
            // Jika baris tidak kosong, tambahkan data ke dalam array
            if (!$isEmptyRow) {
                $status = $rowData[4];
                if ($status == "aktif") {
                    $status = 1;
                } elseif ($status == "tidak aktif") {
                    $status = 2;
                }
    
                $data[] = array(
                    'nama_barang' => $rowData[0],
                    'satuan_barang' => $rowData[1],
                    'harga_satuan' => $rowData[2],
                    'min_stok' => $rowData[3],
                    'status' => $status
                );
            }
        }
    
        // Insert data ke tabel tbl_barang
        $this->db->insert_batch('tbl_barang', $data);
    
        return $this->db->affected_rows();
    }
    
    

    public function count_all()
    {
        return $this->db->count_all('tbl_barang');
    }
    public function count_all_log()
    {
        return $this->db->count_all('tbl_log_barang');
    }


    public function get_data($start, $length, $search_value)
    {
        $query = "SELECT b.id AS id, b.nama_barang AS nama, b.satuan_barang AS satuan, b.harga_satuan AS harga, COALESCE(SUM(l.jumlah * CASE l.jenis WHEN 1 THEN 1 WHEN 2 THEN -1 END), 0) AS sisa, (CASE b.status WHEN 1 THEN 'Aktif' WHEN 2 THEN 'Tidak Aktif' END) AS status, b.min_stok as min_stok FROM tbl_barang b LEFT JOIN tbl_log_barang l ON b.id = l.id_barang WHERE 1";
        if (!empty($search_value)) {
            $query .= " AND (b.nama_barang LIKE '%$search_value%' OR b.harga_satuan LIKE '%$search_value%')";
        }
        $query .= " GROUP BY b.id, b.nama_barang, b.satuan_barang, b.harga_satuan, b.status order by sisa asc";
        $query .= " LIMIT $start, $length";
        $hasil = $this->db->query($query);
        return $hasil->result_array();
    }

    public function log_data($filter, $start, $length, $search_value)
    {
        $query = "SELECT l.id AS id, l.tanggal AS tanggal, b.nama_barang AS barang, CASE WHEN l.jenis = '1' THEN CONCAT('Barang Masuk', IFNULL(CONCAT(' (', l.keterangan, ')'), '')) WHEN l.jenis = '2' THEN o.nama_outlet ELSE '-' END AS keterangan, l.jumlah AS jumlah FROM tbl_log_barang l LEFT JOIN tbl_barang b ON b.id = l.id_barang LEFT JOIN tbl_outlet o ON o.id = l.id_outlet WHERE 1";
        
        if (!empty($filter['filstart']) && !empty($filter['filend'])) {
            $filstart = $filter['filstart'];
            $filend = $filter['filend'];
            $query .= " AND l.tanggal >= '$filstart' AND l.tanggal <= '$filend'";
        }
    
        if (!empty($filter['filbarang'])) {
            $filbarang = $filter['filbarang'];
            $query .= " AND l.id_barang = '$filbarang'";
        }
    
        if (!empty($filter['filstatus'])) {
            if ($filter['filstatus'] == 'masuk') {
                $filstatus = '1';
            } elseif ($filter['filstatus'] == 'keluar') {
                $filstatus = '2';
            }
            $query .= " AND l.jenis = '$filstatus'";
        }
    
        if (!empty($search_value)) {
            $query .= " AND (b.nama_barang LIKE '%$search_value%' OR l.keterangan LIKE '%$search_value%')";
        }

        $query .= " ORDER BY l.id ASC";

        // Menambahkan klausul LIMIT
        $query .= " LIMIT $start, $length";
        
        $hasil = $this->db->query($query);
        return $hasil->result_array();
    }

    public function baranglog($status)
    {
        $this->db->select('*');
        $this->db->from('tbl_barang');
        if($status==true){
            $this->db->where('status', '1');
        }
        $hasil = $this->db->get();
        return $hasil->result_array();
    }

    public function getOutlet($status)
    {
        $this->db->select('*');
        $this->db->from('tbl_outlet');
        if($status==true){
            $this->db->where('status', '1');
        }
        $hasil = $this->db->get();
        return $hasil->result_array();
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_barang');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function insert($data)
    {
        $this->db->insert('tbl_barang', $data);
        return $this->db->insert_id();
    }

    
    public function insertLog($data)
    {
        $this->db->insert('tbl_log_barang', $data);
        return $this->db->insert_id();
    }



    public function update($where, $data)
    {
        $this->db->update('tbl_barang', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('l.id_barang', $id);
        $this->db->delete('tbl_log_barang AS l');
        $this->db->where('b.id', $id);
        $this->db->delete('tbl_barang AS b');
        return $this->db->affected_rows();
    }
    

    public function deleteLog($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_log_barang');
        return $this->db->affected_rows();
    }


    public function exportlog_data($filter)
    {
        $query = "SELECT l.id AS id, l.tanggal AS tanggal, b.nama_barang AS barang, CASE WHEN l.jenis = '1' THEN CONCAT('Barang Masuk', IFNULL(CONCAT(' (', l.keterangan, ')'), '')) WHEN l.jenis = '2' THEN o.nama_outlet ELSE '-' END AS keterangan, l.jumlah AS jumlah, l.jenis as jenis FROM tbl_log_barang l LEFT JOIN tbl_barang b ON b.id = l.id_barang LEFT JOIN tbl_outlet o ON o.id = l.id_outlet WHERE 1";
        
        if (!empty($filter['filstart']) && !empty($filter['filend'])) {
            $filstart = $filter['filstart'];
            $filend = $filter['filend'];
            $query .= " AND l.tanggal >= '$filstart' AND l.tanggal <= '$filend'";
        }
    
        if (!empty($filter['filbarang'])) {
            $filbarang = $filter['filbarang'];
            $query .= " AND l.id_barang = '$filbarang'";
        }
    
        if (!empty($filter['filstatus'])) {
            if ($filter['filstatus'] == 'masuk') {
                $filstatus = '1';
            } elseif ($filter['filstatus'] == 'keluar') {
                $filstatus = '2';
            }
            $query .= " AND l.jenis = '$filstatus'";
        }
    
        $query .= " ORDER BY l.id ASC";

        $hasil = $this->db->query($query);
        return $hasil->result_array();
    }


}