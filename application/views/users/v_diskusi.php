<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!--h1 class="h3 mb-4 text-gray-800">Kelola User</-h1-->

    <div class="col-xl-12 col-lg-7">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between shadow mb-4">
            <p class="m-0 text-gray-800">Forum Dsikusi / <a href="<?= base_url('dashboard'); ?>">Home</a></p>
            <p class="m-0 text-gray-800 navbar-right"><?= date('D, d M Y H:i'); ?></p>
        </div>
    </div>

    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <br>

            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content bg-default">

                    </div>
                    <!-- /.modal-content -->
                </div>
            </div>

            <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#card1">
                    <div id="card1" class="card col-sm-12 border border-secondary"><br>
                        <?php foreach ($diskusi as $a) : ?>
                            <?php if ($a['nama'] == $user['nama']) : ?>
                                <div class="card col-sm-6 border border-info bg-success">
                                    <p style="color: azure;"><?= $a['time'] ?></p>
                                    <div class="row offset-sm-0">
                                        <img class="img-profile rounded-circle" style="width: 50px; height: 50px" src="<?= base_url('asset/sbadmin/img/profile/' . $user['foto']); ?>" alt="User profile picture"> &nbsp;&nbsp;&nbsp;
                                        <div class="costom-files">
                                            <table>
                                                <thead>
                                                    <td style="color: azure;"><b><?= $a['nama'] ?></b></td>
                                                </thead>
                                                <tbody>
                                                    <td style="color: azure;"><?= $a['diskusi'] ?></td>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><br>
                                </div><br>
                            <?php else : ?>
                                <div class="card col-sm-6 border border-info bg-info">
                                    <p style="color: azure;"><?= $a['time'] ?></p>
                                    <div class="row offset-sm-0">
                                        <img class="img-profile rounded-circle" style="width: 50px; height: 50px" src="<?= base_url('asset/sbadmin/img/profile/' . $user['foto']); ?>" alt="User profile picture"> &nbsp;&nbsp;&nbsp;
                                        <div class="costom-files">
                                            <table>
                                                <thead>
                                                    <td style="color: azure;"><b><?= $a['nama'] ?></b></td>
                                                </thead>
                                                <tbody>
                                                    <td style="color: azure;"><?= $a['diskusi'] ?></td>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><br>
                                </div><br>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <form id="quickForm" method="POST" action="<?= base_url('user/kirim') ?>">
                <input type="hidden" name="nama" class="form-control" id="inputName" value="<?= $user['nama']; ?>" required></input>
                <div class="row offset-sm-0">
                    <div class="col-sm-11">
                        <div class="input-group">
                            <input type="text" name="diskusi" placeholder="Tulis pesan" class="form-control" required>
                            <span class="input-group-append">
                                <button type="submit" class="btn col-sm-12 btn-success"><i class="fa fa-paper-plane"></i>&nbsp;Kirim</button>
                            </span>
                        </div>
                    </div>
                </div>
            </form>

            <div class="card-body">
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->