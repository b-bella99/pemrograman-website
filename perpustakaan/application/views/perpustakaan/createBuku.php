<div class="container">
    <!-- mt-3 artinya margin top 3-->
    <div class="mt-3">
        <h2 align="center"><br><br><br>Tambah Data Buku </h2><br><br>
    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <?php echo form_open_multipart('buku/create'); ?>
                <table class="table table-bordered table-light" align="center">
                    <tbody>
                        <tr>
                            <th>Judul Buku</th>
                            <td width="70%"><?php echo form_input('judul_buku'); ?></td>
                        </tr>
                        <tr>
                            <th>Penerbit</th>
                            <td><?php echo form_input('penerbit'); ?></td>
                        </tr>
                        <tr>
                            <th>Pengarang</th>
                            <td><?php echo form_input('pengarang'); ?></td>
                        </tr>
                        <tr>
                            <th>Jumlah Buku</th>
                            <td><?php echo form_input('jumlah'); ?></td>
                        </tr>
                        <tr>
                            <th>Tahun Terbit Buku</th>
                            <td><?php echo form_input('tahun_terbit'); ?></td>
                        </tr>
                        <tr>
                            <th>Rak Buku</th>
                            <td><?php echo form_input('rak'); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <?php echo form_submit('submit', 'Simpan'); ?>
                                <?php echo anchor('buku', 'Kembali'); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?php echo form_close(); ?>
        </div>
        <div class="col-sm-3"></div>
    </div>
    
    
</div>