                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
                    <br>
                    <table class="table col-sm-10 offset-1">

                        <tbody>
                            <tr>
                                <td>ID Peminjaman</td>
                                <td><?= $transaksi[0]->id_peminjaman ?></td>
                            </tr>
                            <tr>
                                <td>Nama Peminjam</td>
                                <td><?= $transaksi[0]->nama_anggota ?></td>
                            </tr>
                            <tr>
                                <td>Judul Buku Dipinjam</td>
                                <td><?= $transaksi[0]->judul_buku ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah Buku Dipinjam</td>
                                <td><?= $transaksi[0]->jml_dipinjam ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Peminjaman</td>
                                <td><?= date('d F Y', strtotime($transaksi[0]->tgl_pinjam))?></td>
                            </tr>
                            <tr>
                                <td>Rencana Tanggal Pengembalian</td>
                                <td><?= date('d F Y', strtotime($transaksi[0]->tgl_kembali))?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Dikembalikan</td>
                                <td><?= date('d F Y', strtotime($transaksi[0]->tgl_dikembalikan))?></td>
                            </tr>
                            <tr>
                                <?php 
                            
                                $denda = 5000;

                                $kembali = strtotime($transaksi[0]->tgl_kembali);
                                $dikembalikan = strtotime($transaksi[0]->tgl_dikembalikan);

                                $terlambat = (($dikembalikan - $kembali)/(60 * 60 * 24)*$denda*$transaksi[0]->jml_dipinjam);

                                echo '<td>Denda</td>
                                    <td class="text-danger font-weight-bold">Rp '.number_format($terlambat,0,',','.').'
                                    ,-</td>';
                            ?>
                            </tr>

                        </tbody>
                    </table>
                    <?= form_open('')?>

                    <?= form_hidden('id_peminjaman', $transaksi[0]->id_peminjaman) ?>
                    <?= form_hidden('denda', $terlambat) ?>

                    <?= form_submit('tombolSubmit', 'Selesai', 'class="btn btn-primary mb-3 pl-4 pr-4 tombol-add"') ?>

                    <?= form_close() ?>
                </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->