                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
    
                    <br>
                    <h2 class="text-center"><?= $title ?></h2><br>
                    <table class="table col-sm-10 offset-1">
                    <?php 
                        if($this->session->userdata['role'] == 1){
                            echo '
                            <a href="'.base_url().'petugas/tambah" class="btn btn-primary mb-3 tombol-add admin">
                            Tambah Petugas</a>';
                        } 
                    ?>
                        
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Petugas</th>
                                <th scope="col">Username</th>
                                <th scope="col">Role</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <?php $i = 1; foreach($petugas as $row) : ?>
                        <tbody>
                            <tr>
                                <td scope="row"><?= $i ?></td>
                                <td><?= $row['nama_petugas'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td>
                                    <?php
                                        if($row['role'] == 1){
                                            echo "Admin";
                                        } else {
                                            echo "Petugas";
                                        }
                                    ?>
                                </td>

                                <td style="text-align : right">
                                <?php if($this->session->userdata['role'] == 1) : ?>
                                    <a href="<?= base_url() ?>petugas/edit/<?= $row['id_petugas'] ?>"
                                        class="badge badge-pill badge-warning">
                                        <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                                        Edit
                                    </a>
                                    <a href="<?= base_url() ?>petugas/delete/<?= $row['id_petugas'] ?>"
                                        class="badge badge-pill badge-danger tombol-hapus">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                        Delete
                                    </a>
                                <?php endif; ?>
                                </td>
                            </tr>
                        </tbody>
                        <?php $i++; endforeach ?>
                    </table>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->