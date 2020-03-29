<div class="container">
    <!-- mt-3 artinya margin top 3-->
    <div class="mt-3">
        <h2 align="center"><br><br><br>Data Peminjaman Buku Perpustakaan Suka Cita</h2><br>
    </div>

    <div class="col-sm-14">
        <a href="<?= base_url();?>peminjaman/create">
            <button class = "btn btn-primary">Tambah Data Baru</button>
        </a>
        <br><br>
        <?php if ($this->session->flashdata('hasil')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('hasil'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

            <table border="0" class="table-light table-hover table">
                <thead class="thead-dark table-bordered" align="center">
                    <tr>
                        <th scope="col">Nama Anggota</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Kembali</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table-bordered">
                    <?php foreach($datapeminjaman as $pmj):
                        echo "<tr>
                            <td>$pmj->nama_peminjam</td>
                            <td>$pmj->judul_buku</td>
                            <td>$pmj->tgl_pinjam</td>
                            <td>$pmj->tgl_kembali</td>
                            <td>".anchor('peminjaman/edit/'.$pmj->id_transaksi,'Ubah')." |
                                ".anchor('peminjaman/delete/'.$pmj->id_transaksi,'Hapus')."
                            </td>
                        <tr>";
                    endforeach; ?>
                </tbody>
            </table>
    </div>
</div>