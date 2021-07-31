                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
                    <br>
                    <h2 class="text-center"><?= $title ?></h2><br>
                    <table class="table col-sm-10 offset-1">
                        <a href="<?= base_url() ?>peminjaman/tambahpeminjaman" class="btn btn-primary mb-3 tombol-add">
                            Peminjaman Baru</a>
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Peminjam</th>
                                <th scope="col">Buku</th>
                                <th scope="col">Tanggal Pinjam</th>
                                <th scope="col">Tanggal Kembali</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <?php $i = 1; foreach($transaksi as $row) : ?>
                        <tbody>
                            <tr>
                                <td scope="row"><?= $i ?></td>
                                <td><?= $row['nama_anggota'] ?></td>

                                <td><?= $row['judul_buku'] ?></td>

                                <td><?= date('d F Y', strtotime($row['tgl_pinjam'])) ?></td>

                                <td><?= date('d F Y', strtotime($row['tgl_kembali'])) ?></td>

                                <td>
                                <a href="#">
                                <?php
                                    if(($row['status']) == 1){
                                        echo "<a href='".base_url()."peminjaman/kembali/".$row['id_peminjaman']."' class='badge badge-primary'>Belum Dikembalikan</a>";
                                    } else {
                                        echo "<a href='".base_url()."peminjaman/detail/".$row['id_peminjaman']."' class='badge badge-success'>Selesai</a>";
                                    }
                                    $row['status'] 
                                ?>
                                </a>
                                </td>

                                <td style="text-align : right">
                                <?php 
                                    if(($row['status']) == 1){
                                        echo ' <a href="'.base_url().'peminjaman/kembali/'.$row['id_peminjaman'].'"><i class="fas fa-chevron-right"></i></a>';
                                    } else {
                                        echo ' <a href="'.base_url().'peminjaman/detail/'.$row['id_peminjaman'].'"><i class="fas fa-chevron-right"></i></a>';
                                    }
                                ?>
                                   
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