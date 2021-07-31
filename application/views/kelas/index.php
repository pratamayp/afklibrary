                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
                    <br>
                    <h2 class="text-center"><?= $title ?></h2><br>
                    <table class="table col-sm-6 offset-3">
                        <a href="<?= base_url() ?>kelas/tambah" class="btn btn-primary mb-3" style="
                            margin-left : 25%
                        ">
                            Tambah Kelas</a>
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID Kelas</th>
                                <th scope="col">Nama Kelas</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <?php foreach($kelas as $row) : ?>
                        <tbody>
                            <tr>
                                <td><?= $row['id_kelas'] ?></td>

                                <td><?= $row['nama_kelas'] ?></td>

                                <td style="text-align : right"">
                                    <a href="<?= base_url() ?>kelas/delete/<?= $row['id_kelas'] ?>"
                                        class="badge badge-pill badge-danger tombol-hapus">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        <?php endforeach ?>
                    </table>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                </div>
                <!-- End of Content Wrapper -->

                </div>
                <!-- End of Page Wrapper -->

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>