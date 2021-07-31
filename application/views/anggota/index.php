                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
                    <br>
                    <h2 class="text-center"><?= $title ?></h2><br>
                    <table class="table col-sm-10 offset-1">
                        <a href="<?= base_url() ?>anggota/tambah" class="btn btn-primary mb-3 tombol-add">Tambah
                            Anggota</a>
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NIS</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kelas</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <?php $i = 1; foreach($anggota as $row) : ?>
                        <tbody>
                            <tr>
                                <td scope="row"><?= $i ?></td>
                                <td><?= $row['nis'] ?></td>
                                <td><?= $row['nama_anggota'] ?></td>

                                <td><?= $row['nama_kelas'] ?></td>

                                <td style="text-align : right"">
                                        <a href=" <?= base_url() ?>anggota/detail/<?= $row['id_anggota'] ?>"
                                    class="badge badge-pill badge-success">
                                    <i class="fa fa-info" aria-hidden="true"></i>
                                    Detail
                                    </a>
                                    <a href="<?= base_url() ?>anggota/edit/<?= $row['id_anggota'] ?>"
                                        class="badge badge-pill badge-warning">
                                        <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                                        Edit
                                    </a>
                                    <a href="<?= base_url() ?>anggota/delete/<?= $row['id_anggota'] ?>"
                                        class="badge badge-pill badge-danger tombol-hapus">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        <?php $i++; endforeach ?>
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