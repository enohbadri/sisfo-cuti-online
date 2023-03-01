<?php
if (isset($_SESSION['level']))
{
 
   if ($_SESSION['level'] == "pimpinan") {
	header("Location: pages/404.php");
   }
}
?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="jumbotron">
				<h1>Selamat datang!</h1>
				<hr>
				<p>Hai <b><?php echo ($_SESSION['nama'])  ;?></b>, anda login sebagai <b><?php echo ($_SESSION['level'])  ;?></b>. Selamat datang di <i>'Sistem Pengajuan Cuti Karyawan PT. Asama Indonesia MFG '</i>. Anda dapat mengolah data melalui menu panel pada bagian atas.</p>
				</div>
			</div>
		</div>
	</div>