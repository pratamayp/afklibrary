<div class="container">
    <div id="container" class="container shadow p-3 mb-4 mt-3 bg-white rounded">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <h2 class="text-center pt-4"><?= $title ?></h2>
                <div class="info-form"><br>

                    <?= form_open('buku/tambah')?>

                    <?= form_label('Judul Buku', 'judul_buku') ?>
                    <?= form_input([
                        'type' => 'text',
                        'name' => 'judul_buku',
                        'id' => 'judul_buku',
                        'class' => 'form-control',
                        'value' => set_value("judul_buku") 
                        ]) ?>
                    <small class="form-text text-danger">
                        <?= form_error('judul_buku') ?>
                    </small>

                    <br>

                    <div class="row">
                        <div class="col-6">
                        <?= form_label('Penulis', 'penulis') ?>
                        <?= form_input([
                            'type' => 'text',
                            'name' => 'penulis',
                            'id' => 'penulis',
                            'class' => 'form-control',
                            'value' => set_value("penulis")
                            ]) ?>
                        <small class="form-text text-danger">
                            <?= form_error('penulis') ?>
                        </small>
                        </div>
                        <div class="col-4">
                        <?= form_label('Penerbit', 'penerbit') ?>
                            <?= form_input([
                                'type' => 'text',
                                'name' => 'penerbit',
                                'id' => 'penerbit',
                                'class' => 'form-control',
                                'value' => set_value("penerbit")
                                ]) ?>
                            <small class="form-text text-danger">
                                <?= form_error('penerbit') ?>
                            </small>
                        </div>
                        <div class="col-2">
                            <?= form_label('Tahun Terbit', 'tahun_terbit') ?>
                            <?= form_input([
                                'type' => 'text',
                                'name' => 'tahun_terbit',
                                'id' => 'tahun_terbit',
                                'class' => 'form-control',
                                'value' => set_value("tahun_terbit")
                                ]) ?>
                            <small class="form-text text-danger">
                                <?= form_error('tahun_terbit') ?>
                            </small>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-4">
                            <?= form_label('Kategori', 'kategori') ?>
                            <?php 
                            $kategori = [
                                'atlas' => 'Atlas',
                                'antologi' => 'Antologi',
                                'cerpen' => 'Cerpen',
                                'ensiklopedi' => 'Ensiklopedi',
                                'kamus' => 'Kamus',
                                'majalah' => 'Majalah',
                                'novel' => 'Novel',
                                'pendidikan' => 'Pendidikan'
                            ];

                            echo form_dropdown('kategori', $kategori, '', 'class="form-control"');
                            ?>
                        </div>
                        <div class="col-2">
                            <?= form_label('Jumlah Buku', 'jumlah_buku') ?>
                            <?= form_input([
                                'type' => 'number',
                                'name' => 'jumlah_buku',
                                'id' => 'jumlah_buku',
                                'class' => 'form-control',
                                'value' => set_value("jumlah_buku")
                                ]) ?>
                            <small class="form-text text-danger">
                                <?= form_error('jumlah_buku') ?>
                            </small>
                            <br>
                        </div>
                        <div class="col-6">
                            <?= form_label('Lokasi Buku', 'lokasi_buku') ?>
                            <?= form_input([
                                'type' => 'text',
                                'name' => 'lokasi_buku',
                                'id' => 'lokasi_buku',
                                'class' => 'form-control',
                                'value' => set_value("lokasi_buku")
                                ]) ?>
                            <small class="form-text text-danger">
                                <?= form_error('lokasi_buku') ?>
                            </small>
                        </div>
                    </div>

                    <?= form_submit('tombolSubmit', 'Tambah Data', 'class="btn btn-primary"') ?>

                    <?= form_close() ?>

                </div>
                <br>
            </div>
        </div>
    </div>
</div>