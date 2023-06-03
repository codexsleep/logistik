<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">SIMLOG</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pengguna</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Akun</h4>
                        <a href="<?= base_url() ?>admin/users" type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="mdi mdi-keyboard-backspace"></i> Kembali</a>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="message"></div>

                            <form class="parsley-examples">
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Nama<span class="text-danger">*</span></label>
                                    <input type="text" name="nama" placeholder="John Wick" class="form-control" id="userName-input" />
                                </div>

                                <div class="mb-3">
                                    <label for="emailAddress" class="form-label">Email<span class="text-danger">*</span></label>
                                    <input type="email" name="email" parsley-trigger="change" placeholder="john@gmail.com" class="form-control" id="emailAddress-input" />
                                </div>

                                <div class="mb-3">
                                    <label for="pass1" class="form-label">Password<span class="text-danger">*</span></label>
                                    <input type="password" name="password" placeholder="***********" class="form-control" id="password-input" />
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                                    <select name="role" class="form-control" id="role-input">
                                        <option value="">Pilih Role</option>
                                        <?php
                                        foreach ($getRole as $getRole) {
                                        ?>
                                            <option value="<?= $getRole['id']; ?>"><?= $getRole['role_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="mt-3">
                                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <input type="radio" name="status" class="form-check-input" value="1" id="status-input">
                                        <label class="form-check-label">Aktif</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="radio" name="status" class="form-check-input" value="2" id="status-input">
                                        <label class="form-check-label">Tidak Aktif</label>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button class="ladda-button btn btn-primary" id="simpan-btn" type="submit" dir="ltr" data-style="expand-right">Simpan</button>
                                    <button type="reset" class="btn btn-secondary waves-effect">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div> <!-- end card -->
                </div>
                <!-- end col -->
            </div>
        </div> <!-- container -->

    </div> <!-- content -->