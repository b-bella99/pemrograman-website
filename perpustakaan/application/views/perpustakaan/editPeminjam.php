<div class="container">
    <!-- mt-3 artinya margin top 3-->
    <div class="mt-3">
        <h2 align="center"><br><br><br>Ubah Data
        <p class="text-primary"><?php echo $datapeminjam[0]->nama_peminjam; ?></p></h2><br>
    </div>

    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <?php echo form_open_multipart('peminjam/edit'); ?>
            <?php echo form_hidden('id_peminjam',$datapeminjam[0]->id_peminjam); ?>
                <table class="table table-bordered table-light" align="center">
                    <tr>
                        <td>ID Anggota</td>
                        <td><?php echo form_input('id_peminjam',$datapeminjam[0]->id_peminjam,"disabled"); ?></td>
                    </tr>
                    <tr>
                        <td>Nama Anggota</td>
                        <td><?php echo form_input('nama_peminjam',$datapeminjam[0]->nama_peminjam); ?></td>
                    </tr>
                    <tr>
                        <td>Alamat Anggota</td>
                        <td><?php echo form_input('alamat_peminjam',$datapeminjam[0]->alamat_peminjam); ?></td>
                    </tr>
                    <tr>
                        <td>No. Telp</td>
                        <td><?php echo form_input('no_telp',$datapeminjam[0]->no_telp); ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>
                        <?php foreach($jeniskelamin as $jk): ?>
                                <?php if($jk == $datapeminjam[0]->jenis_kelamin): ?>
                                    <input type="radio" id="jenis_kelamin" name="jenis_kelamin"  value="<?= $jk ?>"checked><?= $jk ?>
                                <?php else :?>
                                    <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="<?= $jk ?>"><?= $jk ?>
                                <?php endif; ?>
                            <?php endforeach;?>
                        <!--<?php echo form_input('jenis_kelamin',$datapeminjam[0]->jenis_kelamin); ?>-->
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php echo form_submit('submit', 'Simpan'); ?>
                            <?php echo anchor('peminjam', 'Kembali'); ?>
                        </td>
                    </tr>
                </table>
            <?php echo form_close(); ?>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>