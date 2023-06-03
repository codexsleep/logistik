<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> &copy; Pegadaian - Logistik</a>
            </div>
            <div class="col-md-6">
                <div class="text-md-end footer-links d-none d-sm-block">
                    Creaft with ❤️ <a href="" class="text-black-50">TTF From Politeknik Caltex Riau
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-bordered nav-justified" role="tablist">
            <li class="nav-item">
                <a class="nav-link py-2 active" data-bs-toggle="tab" href="#settings-tab" role="tab">
                    <i class="mdi mdi-cog-outline d-block font-22 my-1"></i>
                </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content pt-0">
            <div class="tab-pane active" id="settings-tab" role="tabpanel">
                <h6 class="fw-medium px-3 m-0 py-2 font-13 text-uppercase bg-light">
                    <span class="d-block py-1">Theme Settings</span>
                </h6>

                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                    </div>

                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Color Scheme</h6>
                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="layout-color" value="light"
                            id="light-mode-check" checked />
                        <label class="form-check-label" for="light-mode-check">Light Mode</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="layout-color" value="dark"
                            id="dark-mode-check" />
                        <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                    </div>

                    <!-- Width -->
                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Width</h6>
                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="layout-width" value="fluid"
                            id="fluid-check" checked />
                        <label class="form-check-label" for="fluid-check">Fluid</label>
                    </div>
                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="layout-width" value="boxed"
                            id="boxed-check" />
                        <label class="form-check-label" for="boxed-check">Boxed</label>
                    </div>

                    <!-- Menu positions -->
                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Menus (Leftsidebar and Topbar) Positon</h6>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="menu-position" value="fixed"
                            id="fixed-check" checked />
                        <label class="form-check-label" for="fixed-check">Fixed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="menu-position" value="scrollable"
                            id="scrollable-check" />
                        <label class="form-check-label" for="scrollable-check">Scrollable</label>
                    </div>

                    <!-- Left Sidebar-->
                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Color</h6>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftbar-color" value="light"
                            id="light-check" />
                        <label class="form-check-label" for="light-check">Light</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftbar-color" value="dark"
                            id="dark-check" checked />
                        <label class="form-check-label" for="dark-check">Dark</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftbar-color" value="brand"
                            id="brand-check" />
                        <label class="form-check-label" for="brand-check">Brand</label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input" name="leftbar-color" value="gradient"
                            id="gradient-check" />
                        <label class="form-check-label" for="gradient-check">Gradient</label>
                    </div>

                    <!-- size -->
                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Size</h6>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftbar-size" value="default"
                            id="default-size-check" checked />
                        <label class="form-check-label" for="default-size-check">Default</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftbar-size" value="condensed"
                            id="condensed-check" />
                        <label class="form-check-label" for="condensed-check">Condensed <small>(Extra Small
                                size)</small></label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftbar-size" value="compact"
                            id="compact-check" />
                        <label class="form-check-label" for="compact-check">Compact <small>(Small size)</small></label>
                    </div>


                </div>

            </div>
        </div>

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- third party js -->
<script src="<?= base_url() ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url() ?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="<?= base_url() ?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="<?= base_url() ?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url() ?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url() ?>assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="<?= base_url() ?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/libs/pdfmake/build/vfs_fonts.js"></script>

<!-- third party js ends -->

<!-- Sweet Alerts js -->
<script src="<?= base_url() ?>assets/libs/sweetalert2/sweetalert2.all.min.js"></script>

<script type="text/javascript">
    var site_url = "<?= base_url(); ?>";
    <?php
    if (!isset($appconfig['ajaxfun']) or $appconfig['ajaxfun'] == null) {
    } else {
        echo $appconfig['ajaxfun'];
    } ?>
    // Ambil elemen selectbox
    var selectBox = document.getElementById("satuan-input");
    var selectDefault = document.getElementById("satuan-default");

    // Ambil data dari URL
    fetch('<?= base_url(); ?>assets/data/satuanbarang.json')
        .then(response => response.json())
        .then(data => {
            // Tambahkan data ke dalam selectbox
            for (var i = 0; i < data.satuan.length; i++) {
                var option = document.createElement("option");
                option.text = data.satuan[i].nama.toUpperCase();
                option.value = data.satuan[i].nama;
                if (data.satuan[i].nama === selectDefault.value) {
                    option.selected = true;
                }
                selectBox.add(option);
            }
        });

    // Dapatkan tombol filter dan section filter
    const filterBtn = document.getElementById('filter-btn');
    const filterSection = document.getElementById('filter-section');
    filterSection.style.display = 'none';
    // Tambahkan event listener untuk klik pada tombol filter
    filterBtn.addEventListener('click', () => {
        // Cek apakah section filter sedang ditampilkan atau tidak
        if (filterSection.style.display === 'none') {
            // Jika tidak ditampilkan, tampilkan section filter
            filterSection.style.display = 'block';
        } else {
            // Jika sudah ditampilkan, sembunyikan section filter
            filterSection.style.display = 'none';
        }
    });
</script>

<!-- Loading buttons js -->
<script src="<?= base_url() ?>assets/libs/ladda/spin.min.js"></script>
<script src="<?= base_url() ?>assets/libs/ladda/ladda.min.js"></script>

<!-- Buttons init js-->
<script src="<?= base_url() ?>assets/js/pages/loading-btn.init.js"></script>
<!-- App js -->
<script src="<?= base_url() ?>assets/js/app.min.js"></script>
<!-- Init js-->
<script>
(function (t) {
    "use strict";
    function e() { }
    e.prototype.initSelect2 = function () {
        t('[data-toggle="select2"]').each(function () {
            var $this = t(this);
            var dropdownParent = $this.closest('.modal').length > 0 ? ".modal" : "body";
            $this.select2({
                dropdownParent: dropdownParent
            });
        });
    };
    e.prototype.init = function () {
        this.initSelect2();
    };
    t.FormAdvanced = new e();
    t.FormAdvanced.Constructor = e;
})(window.jQuery);

(function () {
    "use strict";
    window.jQuery.FormAdvanced.initSelect2();
})();

</script>
</body>

</html>