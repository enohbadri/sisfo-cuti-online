<?php
include "../../config/serverconfig.php";
 
if(isset($_POST["username"]))
{
    // Cek apakah ada permintaan Ajax
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }
     
    $hasil = mysql_query("SELECT username FROM user WHERE username='$_POST[username]'");
    $username = mysql_num_rows($hasil);
    
    // Jika datanya diatas 0 (ada)
    if($username > 0) {
        echo '<font style=color:#F00>Username sudah terdaftar</font>'; // Tampilkan pesan
    }else{ // Jika belum ada
        echo '<font style=color:#06F>Username tersedia</font>'; // Tampilkan pula pesan
    }
}
?>