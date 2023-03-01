<?php
session_start();
include "serverconfig.php";

$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);
$password = md5($password);

//cek data yang dikirim, apakah kosong atau tidak
if (empty($username) && empty($password)) {
    //kalau username dan password kosong
    header('location:../login.php?error=1');
    break;
} else if (empty($username)) {
    //kalau username saja yang kosong
    header('location:../login.php?error=2');
    break;
} else if (empty($password)) {
    //kalau password saja yang kosong
    //redirect ke halaman index
    header('location:../login.php?error=3');
    break;
}

// query untuk mendapatkan record dari username
$query = "SELECT * FROM user WHERE username = '$username' AND blokir='N'";
$hasil = mysql_query($query);
$data = mysql_fetch_array($hasil);

// cek kesesuaian password
if ($password == $data['password'])
{
    // menyimpan username dan level ke dalam session
	$_SESSION['id'] = $data['id'];
	$_SESSION['nip'] = $data['nip'];
	$_SESSION['nama'] = $data['nama'];
	$_SESSION['alamat'] = $data['alamat'];
	$_SESSION['email'] = $data['email'];
	$_SESSION['no_tlp'] = $data['no_tlp'];
    $_SESSION['level'] = $data['level'];
    $_SESSION['username'] = $data['username'];
	$_SESSION['blokir'] = $data['blokir'];
	
    //Penggunaan Meta Header HTTP
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../dashboard.php">';    
	exit;
}
else
	//kalau username ataupun password tidak terdaftar di database
    header('location:../login.php?error=4');
?>