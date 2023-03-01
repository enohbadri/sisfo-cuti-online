<?php
include "../../config/serverconfig.php";

$id = $_GET['id'];
$tanggal = $_GET['date'];
$aprpve = $_GET['ptgs'];
$kodecuti = $_GET['kct'];

mysql_query("UPDATE cuti SET status='T' WHERE id='$_GET[id]'");

$query = "INSERT INTO cutiproses (kodecuti,tglapprove,approvement) VALUES ('$kodecuti','$tanggal','$aprpve')";
$sql = mysql_query($query); 
	if ($sql){
		header('Location: ../../dashboard.php?&psn=1');
		}else{
			header('Location: ../../dashboard.php?&psn=2');
			}
?>