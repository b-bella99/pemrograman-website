<div class="container">
    <!-- mt-3 artinya margin top 3-->
    <div class="mt-3">
        <h2 align="center"><br><br><br>Tambah Data Peminjam </h2><br><br>
    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <?php echo form_open_multipart('peminjam/create'); ?>
                <table class="table table-bordered table-light" align="center">
                    <tbody>
                        <tr>
                            <th>Nama Anggota</th>
                            <td width="70%"><?php echo form_input('nama_peminjam'); ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><?php echo form_input('alamat_peminjam'); ?></td>
                        </tr>
                        <tr>
                            <th>No. Telp</th>
                            <td><?php echo form_input('no_telp'); ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>
                            <?php foreach($jeniskelamin as $jk): ?>
                            <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="<?= $jk ?>"><?= $jk ?><br>
                            <?php endforeach; ?>
                            <!--<?php echo form_input('jenis_kelamin'); ?>-->
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <?php echo form_submit('submit', 'Simpan'); ?>
                                <?php echo anchor('peminjam', 'Kembali'); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?php echo form_close(); ?>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>