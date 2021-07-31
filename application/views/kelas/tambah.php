<div class="container">
    <div id="container" class="container shadow p-3 mb-4 mt-3 bg-white rounded">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <h2 class="text-center pt-4"><?= $title ?></h2>
                <div class="info-form"><br>

                    <?= form_open('kelas/tambah')?>

                    <?= form_label('ID Kelas', 'id_kelas') ?>
                    <?= form_input([
                        'type' => 'text',
                        'name' => 'id_kelas',
                        'id' => 'id_kelas',
                        'class' => 'form-control',
                        'value' => set_value("id_kelas") 
                        ]) ?>
                    <small class="form-text text-danger">
                        <?= form_error('id_kelas') ?>
                    </small>
                        <br>
                    <?= form_label('Nama Kelas', 'nama_kelas') ?>
                    <?= form_input([
                        'type' => 'text',
                        'name' => 'nama_kelas',
                        'id' => 'nama_kelas',
                        'class' => 'form-control',
                        'value' => set_value("nama_kelas") 
                        ]) ?>
                    <small class="form-text text-danger">
                        <?= form_error('nama_kelas') ?>
                    </small>

                    <br>

                    <?= form_submit('tombolSubmit', 'Tambah Data', 'class="btn btn-primary"') ?>

                    <?= form_close() ?>

                </div>
                <br>
            </div>
        </div>
    </div>
</div>