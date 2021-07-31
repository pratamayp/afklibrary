<div class="container">
    <div id="container" class="container shadow p-3 mb-4 mt-3 bg-white rounded">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <h2 class="text-center pt-4"><?= $title ?></h2>
                <div class="info-form"><br>

                    <?= form_open('peminjaman/tambahpeminjaman')?>

                    <div class="row">
                        <div class="col-6">
                            <?= form_label('Peminjam', 'id_anggota') ?>
                            <?php
                                foreach ($anggota as $row) {
                                    $options[$row['id_anggota']] = $row['nama_anggota'];
                                }
                                $newoptions = array(null => '') + $options;
                                echo form_dropdown('id_anggota', $newoptions, '', 'class="form-control " id="kelas"')
                            ?>
                            <small class="form-text text-danger">
                                <?= form_error('id_anggota') ?>
                            </small>
                        </div>
                    </div>

                    <br>

                    <?= form_label('Judul Buku', 'id_buku') ?>
                    <?php
                        foreach ($buku as $row) {
                            $options1[$row['id_buku']] = $row['judul_buku'];
                        }
                        $newoptions1 = array(null => '') + $options1;
                        echo form_dropdown('id_buku', $newoptions1, '', 'class="form-control " id="kelas"')?>
                    <small class="form-text text-danger">
                        <?= form_error('id_buku') ?>
                    </small>
                    <br>

                    <div class="row">
                        <div class="col-4">
                            <?= form_label('Tanggal Pinjam', 'tgl_pinjam') ?>
                            <?= form_input([
                                        'type' => 'date',
                                        'name' => 'tgl_pinjam',
                                        'id' => 'tgl_pinjam',
                                        'class' => 'form-control',
                                        'value' => set_value("tgl_pinjam")
                                    ]) ?>
                            <small class="form-text text-danger">
                                <?= form_error('tgl_pinjam') ?>
                            </small>
                        </div>

                        <div class="col-4">
                            <?= form_label('Tanggal Kembali', 'tgl_kembali') ?>
                            <?= form_input([
                                        'type' => 'date',
                                        'name' => 'tgl_kembali',
                                        'id' => 'tgl_kembali',
                                        'class' => 'form-control',
                                        'value' => set_value("tgl_kembali")
                                    ]) ?>
                            <small class="form-text text-danger">
                                <?= form_error('tgl_kembali') ?>
                            </small>
                        </div>
                        <div class="col-4">
                        <?= form_label('Jumlah Dipinjam', 'jml_dipinjam') ?>
                        <?= form_input([
                            'type' => 'number',
                            'name' => 'jml_dipinjam',
                            'id' => 'jml_dipinjam',
                            'class' => 'form-control',
                            'value' => set_value("jml_dipinjam")
                            ]) ?>
                        <small class="form-text text-danger">
                            <?= form_error('jml_dipinjam') ?>
                        </small>
                        </div>
                    </div>

                </div>
                <br>
                <?= form_submit('tombolSubmit', 'Tambah Peminjaman', 'class="btn btn-primary mb-3"') ?>

                <?= form_close() ?>

            </div>
            <br>
        </div>
    </div>
</div>
</div>