<div class="container">
    <div id="container" class="container shadow p-3 mb-4 mt-3 bg-white rounded">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <h2 class="text-center pt-4"><?= $title ?></h2>
                <div class="info-form"><br>
                    <?= form_open('')?>

                    <?= form_hidden('id_anggota', $anggota[0]->id_anggota) ?>

                    <div class="row">
                        <div class="col-4">
                            <?= form_label('NIS', 'nis') ?>
                            <?= form_input([
                                'type' => 'number',
                                'name' => 'nis',
                                'id' => 'nis',
                                'class' => 'form-control',
                                'value' => $anggota[0]->nis 
                            ]) ?>
                            <small class="form-text text-danger">
                                <?= form_error('nis') ?>
                            </small>
                        </div>
                    </div>

                    <br>

                    <?= form_label('Nama', 'nama_anggota') ?>
                    <?= form_input([
                            'type' => 'text',
                            'name' => 'nama_anggota',
                            'id' => 'nama_anggota',
                            'class' => 'form-control',
                            'value' => $anggota[0]->nama_anggota
                            ]) ?>
                    <small class="form-text text-danger">
                        <?= form_error('nama_anggota') ?>
                    </small>
                    <br>

                    <div class="row">
                        <div class="col-4">
                            <?= form_label('Tempat Lahir', 'tp_lhr') ?>
                            <?= form_input([
                                'type' => 'text',
                                'name' => 'tp_lhr',
                                'id' => 'tp_lhr',
                                'class' => 'form-control',
                                'value' => $anggota[0]->tp_lhr
                            ]) ?>
                            <small class="form-text text-danger">
                                <?= form_error('tp_lhr') ?>
                            </small>
                        </div>

                        <div class="col-4">
                            <?= form_label('Tanggal Lahir', 'tgl_lhr') ?>
                            <?= form_input([
                                'type' => 'date',
                                'name' => 'tgl_lhr',
                                'id' => 'tgl_lhr',
                                'class' => 'form-control',
                                'value' => $anggota[0]->tgl_lhr
                            ]) ?>
                            <small class="form-text text-danger">
                                <?= form_error('tgl_lhr') ?>
                            </small>
                        </div>

                        <div class="col-4">
                            <?= form_label('Jenis Kelamin', 'jenis_kelamin') ?> <br>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="jenis_kelamin" id="L" value="Laki-Laki"
                                    class="form-check-input"
                                    <?php echo  set_radio('jenis_kelamin', 'Laki-Laki', ($anggota[0]->jenis_kelamin =='Laki-Laki')?TRUE:''); ?> />
                                <label for="L" class="form-check-label">Laki-Laki</label> <br>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="jenis_kelamin" id="P" value="Perempuan"
                                    class="form-check-input"
                                    <?php echo  set_radio('jenis_kelamin', 'Perempuan', ($anggota[0]->jenis_kelamin =='Perempuan')?TRUE:''); ?> />
                                <label for="P" class="form-check-label">Perempuan</label>
                            </div>
                            <small class="form-text text-danger">
                                <?= form_error('jenis_kelamin') ?>
                            </small>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-6">
                            <?= form_label('No. Telp', 'telp_anggota') ?>
                            <?= form_input([
                                'type' => 'number',
                                'name' => 'telp_anggota',
                                'id' => 'telp_anggota',
                                'class' => 'form-control',
                                'value' => $anggota[0]->telp_anggota
                                ]) ?>
                            <small class="form-text text-danger">
                                <?= form_error('telp_anggota') ?>
                            </small>
                        </div>
                        <div class="col-6">
                            <?= form_label('Kelas', 'kelas') ?>
                            <?php 
                                foreach ($kelas as $row) {
                                    $options[$row['id_kelas']] = $row['nama_kelas'];
                                }

                                echo form_dropdown('kelas', $options, $anggota[0]->id_kelas, 'class="form-control " id="kelas"');
                            
                                ?>
                            <small class="form-text text-danger">
                                <?= form_error('kelas') ?>
                            </small>
                        </div>
                    </div>

                    <br>

                    <?= form_label('Alamat', 'alamat_anggota') ?>
                    <?= form_textarea([
                            'name' => 'alamat_anggota',
                            'id' => 'alamat_anggota',
                            'class' => 'form-control',
                            'rows' => '2',
                            'cols' => '30',
                            'value' => $anggota[0]->alamat_anggota
                        ], '', [
                            'style' => 'resize:none'
                        ]) ?>
                    <small class="form-text text-danger">
                        <?= form_error('alamat_anggota') ?>
                    </small>

                    <br>

                    <?= form_submit('tombolSubmit', 'Simpan Data', 'class="btn btn-primary"') ?>

                    <?= form_close() ?>

                </div>
                <br>
            </div>
        </div>
    </div>
</div>