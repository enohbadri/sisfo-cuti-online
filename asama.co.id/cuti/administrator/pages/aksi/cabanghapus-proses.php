<?php
include "../../config/serverconfig.php";

mysql_query("DELETE FROM departemen WHERE id='$_GET[id]'");

header("location: ../../dashboard.php?p=cabang");
?>