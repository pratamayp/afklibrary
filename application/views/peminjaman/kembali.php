                <!-- Begin Page Content -->
                <div class="container-fluid">

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
                        </tbody>
                    </table>
                    <div class="col-sm-10 offset-sm-1">
                        <?= form_open('')?>

                        <?= form_hidden('id_peminjaman', $transaksi[0]->id_peminjaman) ?>

                        <div class="row">
                            <div class="col-6">
                                <?= form_label('Tanggal Dikembalikan', 'tgl_dikembalikan') ?>
                            </div>
                            <div class="col-2">
                            <?= form_input([
                                    'type' => 'date',
                                    'name' => 'tgl_dikembalikan',
                                    'id' => 'tgl_dikembalikan',
                                    'class' => 'form-control',
                                    'value' => set_value("tgl_dikembalikan")
                                    ]) ?>
                            <small class="form-text text-danger">
                                <?= form_error('tgl_dikembalikan') ?>
                            </small>
                        </div>
                        </div>
                    </div><br>
                    <?= form_submit('tombolSubmit', 'Submit Pengembalian Buku', 'class="btn btn-primary mb-3 tombol-add"') ?>

                    <?= form_close() ?>
                </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->