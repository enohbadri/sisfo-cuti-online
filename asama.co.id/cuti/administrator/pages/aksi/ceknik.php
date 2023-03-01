<?php
include "../../config/serverconfig.php";
 
if(isset($_POST["nik"]))
{
    // Cek apakah ada permintaan Ajax
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }
     
    $hasil = mysql_query("SELECT nik FROM pegawai WHERE nik='$_POST[nik]'");
    $nik = mysql_num_rows($hasil);
    
    // Jika datanya diatas 0 (ada)
    if($nik > 0) {
        echo '<font style=color:#F00>NIK Pegawai sudah terdaftar</font>'; // Tampilkan pesan
    }else{ // Jika belum ada
        echo '<font style=color:#06F>NIK Pegawai tersedia</font>'; // Tampilkan pula pesan
    }
}
?>