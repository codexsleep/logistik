<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- JQuery js -->
    <script src="<?= base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquerypage.js"></script>
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

    <script>
        $(document).ready(function () {
            // Membaca nilai parameter dari URL
            var urlParams = new URLSearchParams(window.location.search);
            var filstart = urlParams.get('filstart');
            var filend = urlParams.get('filend');
            var filbarang = urlParams.get('filbarang');
            var filstatus = urlParams.get('filstatus');

            // Membuat objek data untuk dikirimkan melalui permintaan Ajax
            var data = {
                filstart: filstart,
                filend: filend,
                filbarang: filbarang,
                filstatus: filstatus
            };

            // Permintaan Ajax menggunakan metode GET
            $.ajax({
                url: '<?= base_url(); ?>admin/gudang/exportlog_data',
                type: 'GET',
                data: data,
                success: function (response) {
                    // Berhasil menerima respons dari server
                    // Menampilkan data pada tabel
                    var table = $('table'); // Menggunakan selektor 'table' untuk mengambil tabel
                    var tbody = table.find('tbody');

                    // Membersihkan isi tbody sebelum menambahkan data baru
                    tbody.empty();

                    // Variabel untuk menyimpan sisa dari baris sebelumnya
                    var sisaSebelumnya = 0;

                    // Menambahkan baris baru untuk setiap item dalam respons
                    $.each(response, function (index, item) {
                        var row = $('<tr>');
                        row.append($('<td>').text(item.tanggal));
                        row.append($('<td colspan="3">').text(item.keterangan));
                        // Cek jenis barang (1 untuk masuk, 2 untuk keluar)
                        if (item.jenis === '1') {
                            var masuk = parseInt(item.jumlah);
                            var keluar = 0;
                            var sisa = sisaSebelumnya + masuk - keluar;
                            sisaSebelumnya = sisa;
                            row.append($('<td colspan="2">').text(masuk));
                            row.append($('<td colspan="2">').text(keluar));
                        } else if (item.jenis === '2') {
                            var masuk = 0;
                            var keluar = parseInt(item.jumlah);
                            var sisa = sisaSebelumnya + masuk - keluar;
                            sisaSebelumnya = sisa;
                            row.append($('<td colspan="2">').text(masuk));
                            row.append($('<td colspan="2">').text(keluar));
                        }

                        row.append($('<td>').text(sisa));
                        tbody.append(row);
                    });

                    // Memanggil fungsi untuk mengkonversi tabel ke Excel setelah menampilkan data
                    exportToExcel();
                },

                error: function (xhr, status, error) {
                    // Terjadi kesalahan saat melakukan permintaan Ajax
                    console.log(error);
                }
            });

            // Fungsi untuk mengkonversi tabel ke format Excel dan mengunduhnya
           // Fungsi untuk mengkonversi tabel ke format Excel dan mengunduhnya
           function exportToExcel() {
  // Mendapatkan referensi ke tabel HTML
  var table = document.querySelector('table');

  // Mengkonversi tabel HTML ke objek workbook
  var wb = XLSX.utils.table_to_book(table, { sheet: "Sheet1" });

  // Mengkonversi workbook menjadi binary Excel
  var wbout = XLSX.write(wb, { type: 'binary', bookType: 'xlsx' });

  // Fungsi untuk mengubah string menjadi ArrayBuffer
  function s2ab(s) {
    var buf = new ArrayBuffer(s.length);
    var view = new Uint8Array(buf);
    for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xff;
    return buf;
  }

  // Membuat blob dari data Excel
  var blob = new Blob([s2ab(wbout)], { type: 'application/octet-stream' });

  // Membuat URL objek untuk blob
  var url = URL.createObjectURL(blob);

  // Membuat elemen anchor untuk mengunduh file
  var a = document.createElement('a');
  a.href = url;
  a.download = 'data.xlsx'; // Nama file yang akan diunduh

  // Menambahkan elemen anchor ke dokumen
  document.body.appendChild(a);

  // Mengklik elemen anchor untuk memicu unduhan
  a.click();

  // Menghapus elemen anchor dari dokumen
  document.body.removeChild(a);

  // Membersihkan URL objek
  URL.revokeObjectURL(url);
}


        });

    </script>
</head>

<body>
    <table cellspacing="0" cellpadding="0" border="1" width="100%" id="table-id">
        <thead>
            <tr>
            <tr style="height: 16px">
                <td colspan="6">Nama barang :
                    <span id="barang">
                        <?= $barang['nama_barang']; ?>
                    </span>
                </td>
                <td colspan="6" rowspan="2">HARGA SATUAN : Rp.
                    <span id="harga">
                        <?= number_format($barang['harga_satuan']); ?>
                    </span>,-
                </td>
            </tr>
            <tr style="height: 16px">
                <td colspan="6">Satuan barang :
                    <span id="satuan">
                        <?= strtoupper($barang['satuan_barang']); ?>
                    </span>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td colspan="3">Keterangan</td>
                <td colspan="2">Masuk</td>
                <td colspan="2">Keluar</td>
                <td>Sisa / Stock</td>
            </tr>
        </thead>
        <tbody id="data">
        </tbody>
    </table>
</body>

</html>