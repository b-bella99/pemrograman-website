<div class="container">
    <!-- mt-3 artinya margin top 3-->
    <div class="mt-3">
        <h2 align="center"><br><br><br>Data Anggota Perpustakaan Suka Cita</h2><br>
    </div>

    <div class="col-sm-14">
        <a href="<?= base_url();?>peminjam/create">
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
                        <th scope="col">Alamat Anggota</th>
                        <th scope="col">No. Telp</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table-bordered">
                    <?php foreach($datapeminjam as $pmj):
                        echo "<tr>
                            <td>$pmj->nama_peminjam</td>
                            <td>$pmj->alamat_peminjam</td>
                            <td>$pmj->no_telp</td>
                            <td>$pmj->jenis_kelamin</td>
                            <td>".anchor('peminjam/edit/'.$pmj->id_peminjam,'Ubah')." |
                                ".anchor('peminjam/delete/'.$pmj->id_peminjam,'Hapus')."
                            </td>
                        <tr>";
                    endforeach; ?>
                </tbody>
            </table>
    </div>
</div>