<div class="container">
    <table style="width:40%">
        <tr class="font-weight-bold">
            <th>NIS</th>
            <th>: <?= $anggota['nis'] ?></th>
        </tr>
        <tr class="font-weight-bold">
            <td>Nama</td>
            <td>: <?= $anggota['nama_anggota'] ?></td>
        </tr>
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>: <?= $anggota['tp_lhr'] ?>, <?= date("d F Y", strtotime($anggota['tgl_lhr'])); ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: <?= $anggota['jenis_kelamin'] ?></td>
        </tr>
        <tr>
            <td>No. HP</td>
            <td>: <?= $anggota['telp_anggota'] ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>: <?= $anggota['kelas'] ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: <?= $anggota['alamat_anggota'] ?></td>
        </tr>
    </table> <br>
</div>