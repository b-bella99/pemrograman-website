<div class="container">
    <!-- mt-3 artinya margin top 3-->
    <div class="mt-3">
        <h2 align="center"><br><br><br>Tambah Data Peminjaman </h2><br><br>
    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <?php echo form_open_multipart('peminjaman/create'); ?>
                <table class="table table-bordered table-light" align="center">
                    <tbody>
                        <tr>
                            <th>ID Anggota</th>
                            <td width="70%"><?php echo form_input('id_peminjam'); ?></td>
                        </tr>
                        <tr>
                            <th>ID Buku</th>
                            <td><?php echo form_input('id_buku'); ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Pinjam</th>
                            <td><?php echo form_input('tgl_pinjam'); ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Kembali</th>
                            <td><?php echo form_input('tgl_kembali'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <?php echo form_submit('submit', 'Simpan'); ?>
                                <?php echo anchor('peminjaman', 'Kembali'); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?php echo form_close(); ?>
        </div>
        <div class="col-sm-3"></div>
    </div>
    
    
</div>