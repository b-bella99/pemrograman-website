<div class="container">
    <!-- mt-3 artinya margin top 3-->
    <div class="mt-3">
        <h2 align="center"><br><br><br>Ubah Data Buku 
        <p class="text-primary"><?php echo $databuku[0]->judul_buku; ?></p></h2><br>
    </div>

    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <?php echo form_open_multipart('buku/edit'); ?>
            <?php echo form_hidden('id_buku',$databuku[0]->id_buku); ?>
                <table class="table table-bordered table-light" align="center">
                    <tr>
                        <td>ID Buku</td>
                        <td><?php echo form_input('buku',$databuku[0]->id_buku,"disabled"); ?></td>
                    </tr>
                    <tr>
                        <td>Judul Buku</td>
                        <td><?php echo form_input('judul_buku',$databuku[0]->judul_buku); ?></td>
                    </tr>
                    <tr>
                        <td>Penerbit</td>
                        <td><?php echo form_input('penerbit',$databuku[0]->penerbit); ?></td>
                    </tr>
                    <tr>
                        <td>Pengarang</td>
                        <td><?php echo form_input('pengarang',$databuku[0]->pengarang); ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Buku</td>
                        <td><?php echo form_input('jumlah',$databuku[0]->jumlah); ?></td>
                    </tr>
                    <tr>
                        <td>Tahun Terbit Buku</td>
                        <td><?php echo form_input('tahun_terbit',$databuku[0]->tahun_terbit); ?></td>
                    </tr>
                    <tr>
                        <td>Rak Buku</td>
                        <td><?php echo form_input('rak',$databuku[0]->rak); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php echo form_submit('submit', 'Simpan'); ?>
                            <?php echo anchor('buku', 'Kembali'); ?>
                        </td>
                    </tr>
                </table>
            <?php echo form_close(); ?>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>