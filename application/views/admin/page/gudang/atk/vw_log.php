<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">SIMLOG</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Gudang</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Atk</a></li>
                                <li class="breadcrumb-item active">Log</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Semua Data
                            <?= $appconfig['title']; ?>
                        </h4>
                    </div>
                </div>
            </div>

            <!-- end page title -->
            <div class="row" id="filter-section" style="display:none;">
                <?php
                $year = date('Y');
                $filstart = date('Y-m-d', strtotime("$year-01-01"));
                $filend = date('Y-m-d', strtotime("$year-12-31"));
                $filbarang = "";
                $filstatus = "all";

                if (isset($_GET['filstart'])) {
                    $filstart = $_GET['filstart'];
                }

                if (isset($_GET['filend'])) {
                    $filend = $_GET['filend'];
                }

                if (isset($_GET['filbarang'])) {
                    $filbarang = $_GET['filbarang'];
                }

                if (isset($_GET['filstatus'])) {
                    $filstatus = $_GET['filstatus'];
                }

                if (isset($_GET['filstart']) || isset($_GET['filend']) || isset($_GET['filbarang']) || isset($_GET['filstatus'])) {
                    echo '<script>
                            document.addEventListener("DOMContentLoaded", function() {
                                document.getElementById("filter-section").style.display = "block";
                            });
                        </script>';
                }

                ?>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-auto">
                                    <form class="d-flex flex-wrap align-items-center" action="?fil" method="GET">
                                        <label for="status-select" class="me-2">Tanggal</label>
                                        <div class="me-sm-3">
                                            <input class="form-control" type="date" name="filstart"
                                                value="<?= $filstart; ?>" />
                                        </div>
                                        <div class="me-sm-3">
                                            <input class="form-control" type="date" name="filend"
                                                value="<?= $filend; ?>" />
                                        </div>
                                        <div class="me-sm-3">
                                            <select class="form-select my-1 my-lg-0" id="barang-select" name="filbarang"
                                                style="max-width:200px;">
                                                <option value="">Semua Barang</option>
                                            </select>
                                        </div>
                                        <div class="me-sm-3">
                                            <select class="form-select my-1 my-lg-0" id="status-select"
                                                name="filstatus">
                                                <option value="all" <?php if ($filstatus == 'all') {
                                                    echo "selected";
                                                } ?>>
                                                    Semua Status</option>
                                                <option value="masuk" <?php if ($filstatus == 'masuk') {
                                                    echo "selected";
                                                } ?>>
                                                    Barang Masuk</option>
                                                <option value="keluar" <?php if ($filstatus == 'keluar') {
                                                    echo "selected";
                                                } ?>>
                                                    Barang Keluar</option>
                                            </select>
                                        </div>

                                </div>
                                <div class="col-auto">
                                    <div class="text-lg-end my-1 my-lg-0">
                                        <button type="submit" class="btn btn-info waves-effect waves-light ">
                                            <i class="mdi mdi-filter-outline"></i></button>
                                        <a href="<?= base_url() ?>admin/gudang/logatk"
                                            class="btn btn-warning waves-effect waves-light">
                                            <i class="mdi mdi-reload"></i></a>
                                    </div>
                                </div><!-- end col-->
                                </form>
                            </div> <!-- end row -->
                        </div>
                    </div> <!-- end card -->
                </div> <!-- end col-->
            </div>
            <!-- end row-->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <button type="button" class="btn btn-danger waves-effect waves-light"
                                        data-bs-toggle="modal" data-bs-target="#tambah-log" id="tambah-logbtn"><i
                                            class="mdi mdi-plus-circle me-1"></i> Tambah Log Atk</button>
                                </div>
                                <div class="col-sm-8">
                                    <div class="text-sm-end mt-2 mt-sm-0">
                                        <button type="button" class="btn btn-success mb-2 me-1" id="filter-btn"><i
                                                class="mdi mdi-cog"></i></button>
                                        <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                        <button type="button" id="exportBtn" class="btn btn-light mb-2">Export</button>
                                    </div>
                                </div><!-- end col-->
                            </div>
                            <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama Barang</th>
                                        <th>Keterangan</th>
                                        <th>Jumlah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
        </div> <!-- container -->

    </div> <!-- content -->



    <div class="modal fade" id="tambah-log" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myCenterModalLabel">Tambah Log Atk</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body p-4">
                    <div id="message"></div>
                    <form>
                        <div class="mb-3">
                            <label for="barang" class="form-label">Pilih Barang</label>
                            <select class="form-control" id="barang-input" name="barang">
                                <option value="">Semua Barang</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis</label>
                            <select class="form-control" id="jenis-input" name="jenis">
                                <option value="">Pilih jenis log</option>
                                <option value="1">Log Masuk</option>
                                <option value="2">Log Keluar</option>
                            </select>
                        </div>

                        <div class="mb-3" id="departemenInput">
                            <label for="outlet" class="form-label">Departemen</label>
                            <select class="form-control" id="outlet-input" name="outlet">
                                <option value="">Pilih Departemen</option>
                                <option value="bisnis">Bisnis</option>
                                <option value="keuangan">Keuangan</option>
                                <option value="logistik">Logistik</option>
                                <option value="resiko">Resiko</option>
                                <option value="sdm">SDM</option>

                            </select>
                        </div>
                        <div class="mb-3" id="keteranganInput">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan-input" name="keterangan"
                                placeholder="ex: dari toko">
                        </div>
                        <div class="mb-3" id="jumlahInput">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah-input" name="jumlah"
                                placeholder="ex: 100">
                        </div>
                        <div class="mb-3" id="tanggalInput">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal-input" name="tanggal"
                                value="<?= date('Y-m-d'); ?>">
                        </div>
                        <div class="text-end">
                            <button class="btn btn-success waves-effect waves-light" id="simpan-btn"
                                type="submit">Simpan</button>
                            <button class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal"
                                type="button">Tutup</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



    <script>
        // Mendapatkan referensi ke tombol "Export"
        const exportBtn = document.getElementById('exportBtn');

        // Menambahkan event listener untuk mengekspor halaman saat tombol ditekan
        exportBtn.addEventListener('click', function () {
            // Mendapatkan nilai parameter "filbarang" dari URL
            const urlParams = new URLSearchParams(window.location.search);
            const filbarang = urlParams.get('filbarang');

            // Memeriksa jika parameter "filbarang" tidak ada, kosong, atau berisi "all"
            if (!filbarang || filbarang === '' || filbarang.toLowerCase() === 'all') {
                Swal.fire({
                    title: 'Peringatan',
                    text: 'Harap melakukan filter data barang terlebih dahulu.',
                    icon: 'warning',
                    confirmButtonText: 'Tutup'
                });
            } else {
                const url = new URL(window.location.href);
                const filstart = url.searchParams.get("filstart") ? url.searchParams.get("filstart") : "";
                const filend = url.searchParams.get("filend") ? url.searchParams.get("filend") : "";
                const filbarang = url.searchParams.get("filbarang") ? url.searchParams.get("filbarang") : "";
                const filstatus = url.searchParams.get("filstatus") ? url.searchParams.get("filstatus") : "";

                // Membuat URL untuk ekspor halaman terkait
                const exportUrl = url.origin + "/admin/gudang/export_logatk?filstart=" + filstart + "&filend=" + filend + "&filbarang=" + filbarang + "&filstatus=" + filstatus;

                // Menambahkan event listener untuk mengatur pengaturan pencetakan saat tautan diklik
                exportBtn.addEventListener('click', function (event) {
                    event.preventDefault(); // Mencegah navigasi ke URL '#' saat tautan diklik

                    // Pengaturan pencetakan
                    const settings = 'width=800,height=600,menubar=no,toolbar=no,location=no';

                    // Membuka jendela baru untuk pencetakan
                    const printWindow = window.open(exportUrl, '_blank', settings);
                });
            }
        });

        var jenisInput = document.getElementById("jenis-input");
        var departemenInput = document.getElementById("departemenInput");
        var keteranganInput = document.getElementById("keteranganInput");
        var jumlahInput = document.getElementById("jumlahInput");
        var tanggalInput = document.getElementById("tanggalInput");
        departemenInput.style.display = "none";
        keteranganInput.style.display = "none";
        jumlahInput.style.display = "none";
        tanggalInput.style.display = "none";
        jenisInput.onchange = function () {
            if (jenisInput.value === "1") { // Log Masuk
                departemenInput.style.display = "none";
                keteranganInput.style.display = "block";
                jumlahInput.style.display = "block";
                tanggalInput.style.display = "block";
            } else if (jenisInput.value === "2") { // Log Keluar
                departemenInput.style.display = "block";
                keteranganInput.style.display = "none";
                jumlahInput.style.display = "block";
                tanggalInput.style.display = "block";
            }
        }

        $(document).ready(function () {
            $('#tambah-logbtn').click(function () {
                $.ajax({
                    url: "<?= base_url(); ?>admin/gudang/getAtk",
                    method: 'POST',
                    dataType: 'json',
                    success: function (response) {
                        // Mengosongkan selectbox
                        $('#barang-input').empty();

                        $('#barang-input').append(
                            $('<option></option>').val('').text('Semua Barang')
                        );

                        // Menambahkan data ke selectbox
                        $.each(response, function (index, data) {
                            $('#barang-input').append(
                                $('<option></option>').val(data.id).html(data.nama_atk)
                            );
                        });
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(thrownError);
                    }
                });
            });
        });
        $(document).ready(function () {
            var url = new URL(window.location.href);
            var filBarang = "";

            if (url.searchParams.has("filstart") || url.searchParams.has("filend") || url.searchParams.has("filbarang") || url.searchParams.has("filstatus")) {
                getData();
            }

            $('#filter-btn').click(function () {
                getData();
            });

            // Fungsi untuk mendapatkan data menggunakan Ajax
            function getData() {
                $.ajax({
                    url: "<?= base_url(); ?>admin/gudang/getAtk",
                    method: 'POST',
                    dataType: 'json',
                    success: function (response) {
                        $('#barang-select').empty();

                        // Menambahkan opsi "Semua Barang" yang dipilih secara default
                        $('#barang-select').append(
                            $('<option></option>').val('').html('Semua Barang')
                        );

                        // Menambahkan data ke selectbox
                        $.each(response, function (index, data) {
                            var selected = '';
                            if (getParameterByName('filbarang') === data.id) {
                                selected = 'selected';
                            }

                            $('#barang-select').append(
                                $('<option></option>').val(data.id).html(data.nama_atk).prop('selected', selected)
                            );
                        });
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log(thrownError);
                    }
                });
            }

            // Fungsi untuk mendapatkan nilai parameter dari URL
            function getParameterByName(name) {
                name = name.replace(/[\[\]]/g, '\\$&');
                var url = window.location.href;
                var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                    results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, ' '));
            }
        });



    </script>