<div class="container">
    <!-- mt-3 artinya margin top 3-->
    <div class="mt-3">
        <h2 align="center"><br><br><br>Ubah Data
        <p class="text-primary"><?php echo $datapeminjaman[0]->id_transaksi; ?></p></h2><br>
    </div>

    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <?php echo form_open_multipart('peminjaman/edit'); ?>
            <?php echo form_hidden('id_transaksi',$datapeminjaman[0]->id_transaksi); ?>
                <table class="table table-bordered table-light" align="center">
                    <tr>
                        <td>ID Peminjaman</td>
                        <td><?php echo form_input('id_transaksi',$datapeminjaman[0]->id_transaksi,"disabled"); ?></td>
                    </tr>
                    <tr>
                        <td>ID Anggota</td>
                        <td><?php echo form_input('id_peminjam',$datapeminjaman[0]->id_peminjam,"disabled"); ?></td>
                    </tr>
                    <tr>
                        <td>ID Buku</td>
                        <td><?php echo form_input('id_buku',$datapeminjaman[0]->id_buku); ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pinjam</td>
                        <td><?php echo form_input('tgl_pinjam',$datapeminjaman[0]->tgl_pinjam); ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Kembali</td>
                        <td><?php echo form_input('tgl_kembali',$datapeminjaman[0]->tgl_kembali); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php echo form_submit('submit', 'Simpan'); ?>
                            <?php echo anchor('peminjaman', 'Kembali'); ?>
                        </td>
                    </tr>
                </table>
            <?php echo form_close(); ?>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>