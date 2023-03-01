<?php
include "../../config/serverconfig.php";

$id = $_GET['id'];
$kodecuti = $_GET['kct'];

mysql_query("UPDATE cuti SET status='W' WHERE id='$id'");

mysql_query("DELETE FROM cutiproses WHERE kodecuti='$kodecuti'");

header('Location: ../../dashboard.php?p=cuti&psn=1');
?>