<div class="container">
    <div id="container" class="container shadow p-3 mb-4 mt-3 bg-white rounded">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <h2 class="text-center pt-4"><?= $title ?></h2>
                <div class="info-form"><br>

                    <?= form_open('')?>

                    <?= form_hidden('id_petugas', $petugas['id_petugas']) ?>

                    <?= form_label('Nama Petugas', 'nama_petugas') ?>
                    <?= form_input([
                        'type' => 'text',
                        'name' => 'nama_petugas',
                        'id' => 'nama_petugas',
                        'class' => 'form-control',
                        'value' => $petugas['nama_petugas'] 
                    ]) ?>
                    <small class="form-text text-danger">
                        <?= form_error('nama_petugas') ?>
                    </small>

                    <br>

                    <div class="row">
                        <div class="col-6">
                        <?= form_label('Username', 'username') ?>
                        <?= form_input([
                            'type' => 'text',
                            'name' => 'username',
                            'id' => 'username',
                            'class' => 'form-control',
                            'value' => $petugas['username']
                            ]) ?>
                        <small class="form-text text-danger">
                            <?= form_error('username') ?>
                        </small>
                        </div>

                        <div class="col-6">
                        <?= form_label('No. Telp', 'telp_petugas') ?>
                        <?= form_input([
                            'type' => 'number',
                            'name' => 'telp_petugas',
                            'id' => 'telp_petugas',
                            'class' => 'form-control',
                            'value' => $petugas['telp_petugas']
                            ]) ?>
                        <small class="form-text text-danger">
                            <?= form_error('telp_petugas') ?>
                        </small>
                        </div>
                    </div>
                    
                    <br>

                    <div class="row">
                        <div class="col-6">
                            <?= form_label('Password', 'password') ?>
                            <?= form_input([
                                        'type' => 'password',
                                        'name' => 'password',
                                        'id' => 'password',
                                        'class' => 'form-control'
                                    ]) ?>
                            <small class="form-text text-danger">
                                <?= form_error('password') ?>
                            </small>
                        </div>

                        <div class="col-6">
                            <?= form_label('Konfirmasi Password', 'password_conf') ?>
                            <?= form_input([
                                        'type' => 'password',
                                        'name' => 'password_conf',
                                        'id' => 'password_conf',
                                        'class' => 'form-control'
                                    ]) ?>
                            <small class="form-text text-danger">
                                <?= form_error('password_conf') ?>
                            </small>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-4">
                        <?= form_label('Role', 'role') ?>
                            <?php 
                            $role = [
                                1 => 'Admin',
                                2 => 'Petugas'
                            ];
                            echo form_dropdown('role', $role, $petugas['role'], 'class="form-control"');
                        ?>      
                        </div>
                    </div>

                    <br>

                    <?= form_submit('tombolSubmit', 'Simpan Data', 'class="btn btn-primary"') ?>

                    <?= form_close() ?>

                </div>
                <br>
            </div>
        </div>
    </div>
</div>