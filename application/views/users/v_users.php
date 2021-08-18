<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!--h1 class="h3 mb-4 text-gray-800">Kelola User</-h1-->

    <div class="col-xl-12 col-lg-7">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between shadow mb-4">
            <p class="m-0 text-gray-800">Data user / <a href="<?= base_url('dashboard'); ?>">Home</a></p>
            <p class="m-0 text-gray-800 navbar-right"><?= date('D, d M Y H:i'); ?></p>
        </div>
    </div>

    <div class="col-xl-12 col-lg-7">
        <div class="row">
            <?php foreach ($waw as $u) : ?>
                <div class="card card-danger card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="img-profile rounded-circle" style="width: 100px; height: 100px" src="<?= base_url('asset/sbadmin/img/profile/' . $u['foto']); ?>" alt="User profile picture">
                        </div><br>

                        <h4 class="profile-username text-center"><?= $u['nama']; ?></h4>

                        <p class="text-muted text-center"><?= $u['nik']; ?></p>
                        <p class="text-muted text-center"><?= $u['gudang']; ?></p>
                        <a href="#" type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#modal-sm<?php echo $u['id']; ?>"><b>Lihat Lengkap</b></a>
                    </div>
                    <!-- /.card-body -->
                    <div class="modal fade" id="modal-sm<?php echo $u['id']; ?>" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Profile Lengkap</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-header text-muted border-bottom-0">
                                        <?= $u['gudang']; ?>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead"><b><?= $u['nama']; ?></b></h2>
                                                <p class="text-muted text-sm"><b>E-mail: </b> <?= $u['email']; ?> </p>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: <?= $u['alamat']; ?></li>
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: <?= $u['telpon']; ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
                <!-- /.card -->
            <?php endforeach; ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->