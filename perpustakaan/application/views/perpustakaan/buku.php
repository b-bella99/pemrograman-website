<div class="container">
    <!-- mt-3 artinya margin top 3-->
    <div class="mt-3">
        <h2 align="center"><br><br><br>Data Buku Perpustakaan Suka Cita</h2><br>
    </div>

    <div class="col-sm-14">
        <a href="<?= base_url();?>buku/create">
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
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Jumlah Buku</th>
                        <th scope="col">Tahun Terbit Buku</th>
                        <th scope="col">Rak Buku</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class=" table-bordered">
                    <?php foreach($databuku as $buku):
                        echo "<tr>
                            <td>$buku->judul_buku</td>
                            <td>$buku->penerbit</td>
                            <td>$buku->pengarang</td>
                            <td>$buku->jumlah</td>
                            <td>$buku->tahun_terbit</td>
                            <td>$buku->rak</td>
                            <td>".anchor('buku/edit/'.$buku->id_buku,'Ubah')." |
                                ".anchor('buku/delete/'.$buku->id_buku,'Hapus')."
                            </td>
                        <tr>";
                    endforeach; ?>
                </tbody>
            </table>
    </div>
</div>