<?php
session_start();
include "serverconfig.php";

$nik = mysql_real_escape_string($_POST['nik']);
$password = mysql_real_escape_string($_POST['password']);
$password = md5($password);

//cek data yang dikirim, apakah kosong atau tidak
if (empty($nik) && empty($password)) {
    //kalau nik dan password kosong
    header('location:../login.php?error=1');
    break;
} else if (empty($nik)) {
    //kalau nik saja yang kosong
    header('location:../login.php?error=2');
    break;
} else if (empty($password)) {
    //kalau password saja yang kosong
    //redirect ke halaman index
    header('location:../login.php?error=3');
    break;
}

// query untuk mendapatkan record dari nik
$query = "SELECT * FROM pegawai WHERE nik = '$nik'";
$hasil = mysql_query($query);
$data = mysql_fetch_array($hasil);

// cek kesesuaian password
if ($password == $data['password'])
{
    // menyimpan nik dan level ke dalam session
	$_SESSION['id'] = $data['id'];
	$_SESSION['gbrpgw'] = $data['gbrpgw'];
	$_SESSION['nik'] = $data['nik'];
	$_SESSION['noktp'] = $data['noktp'];
	$_SESSION['npwp'] = $data['npwp'];
	$_SESSION['nama'] = $data['nama'];
	$_SESSION['jkelamin'] = $data['jkelamin'];
	$_SESSION['alamat'] = $data['alamat'];
	$_SESSION['agama'] = $data['agama'];
	$_SESSION['statuspernikahan'] = $data['statuspernikahan'];
	$_SESSION['no_tlp'] = $data['no_tlp'];
    $_SESSION['cabang_id'] = $data['cabang_id'];
    $_SESSION['status'] = $data['status'];
	
    //Penggunaan Meta Header HTTP
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../dashboard.php">';    
	exit;
}
else
	//kalau nik ataupun password tidak terdaftar di database
    header('location:../login.php?error=4');
?>