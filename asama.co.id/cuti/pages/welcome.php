	<div class="container">
		<div class="jumbotron">
			<h1>Selamat datang!</h1>
			<hr>
			<p>Hai <b><?php echo ($_SESSION['nama'])  ;?></b>. Selamat datang di <i>'Sistem Pengajuan Cuti [ SIPECUT ] Online PT. Asama Indonesia Manufacturing'</i>, Anda dapat menggunakan fitur sistem melalui menu di panel bagian atas.</p>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<?php
					//kode php ini kita gunakan untuk menampilkan pesan eror
					if (!empty($_GET['psn'])) {
						if ($_GET['psn'] == 1) {
							writeMsg('registrasi.sukses');
							}else if ($_GET['psn'] == 2) {
								writeMsg('registrasi.gagal');
								}
						}
				?>
			</div>
		</div>
	</div>