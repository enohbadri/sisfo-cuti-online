<?php ob_start(); ?>
<?php
include 'config/cek-login.php';
include 'config/serverconfig.php';
include 'modul/alerts.php';
?>	

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'modul/head.php'; ?>
</head>
<body>
	<!-- Fixed navbar -->
	<?php include 'modul/navbar.php'; ?>

	<!-- Begin page content -->
    <?php include 'modul/konten.php'; ?>
	
	<!-- Begin footer -->
	<?php include 'modul/footer.php'; ?>
	
	<!-- Panggil Fungsi -->
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
		$('.table-paginate').dataTable();
	 } );
	</script>
</body>
</html>
<?php ob_flush(); ?>