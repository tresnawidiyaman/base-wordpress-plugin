<?php

echo'<h1>Tambah Member Baru</h1>';

if (isset($_POST) && $_POST['nama'] !='' && $_POST['kelas'] !=''){
    $wpdb->query("INSERT INTO `sekolah_pg` (`sekolah_nama`,`sekolah_kelas`,`sekolah_alamat`) 
    VALUES (
        '".$_POST['nama']."',
        '".$_POST['kelas']."',
        '".$_POST['alamat']."'
        )");
    echo 'Data berhasil di tambahkan';
} else {
    echo 'Silahkan lengkapi data anda';
}
?>
    
<form action="" method="post">
    <table border=0>
    <tr>
        <td>Nama Lengkap  : </td>
        <td><input type="text" name="nama"/></td>
    </tr><tr>
        <td>Kelas   : </td>
        <td><input type="text" name="kelas"/></td>
    </tr><tr>
        <td>Alamat            : </td>
        <td><input type="text" name="alamat"/></td>
    </tr><tr>
        <td><input type="submit" value="Update"/></td>
        <td></td>
    </tr>
    </table>
    </form>
