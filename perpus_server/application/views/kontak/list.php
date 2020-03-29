<font color="orange">
<?php echo $this->session->flashdata('hasil'); ?>
</font>
<table border="1">
    <tr>
    <th>ID</th>
    <th>NAMA</th>
    <th>NOMOR</th>
    <th></th>
    </tr>
    <?php
    if(!empty($datakontak)){
        // var_dump($datakontak);
        //     die();
        // foreach ($datakontak as $kontak){
        //     // var_dump($kontak);
        //     // die();
        //     echo '<tr>';
        //     echo '<td>'.$kontak->id.'</td>';
        //     echo '<td>'.$kontak->nama.'</td>';
        //     echo'<td>'.$kontak->nomor.'</td>';
        //     echo'<td>'.anchor('kontak/edit/'.$kontak->id,'Edit');
        //     echo'<td>'.anchor('kontak/delete/'.$kontak->id,'Delete').'</td>';
        //     echo'</tr>';
        foreach ($datakontak as $kontak){
            echo "<tr>
                  <td>$kontak->id</td>
                  <td>$kontak->nama</td>
                  <td>$kontak->nomor</td>
                  <td>".anchor('kontak/edit/'.$kontak->id,'Edit')."
                      ".anchor('kontak/delete/'.$kontak->id,'Delete')."</td>
                  </tr>";
        }
    }
    ?>
</table>
<a href="http://localhost/12.codeIgniter/Belajar-rest/ci-restserver-master/index.php/kontak/create">+ Tambah data<a>