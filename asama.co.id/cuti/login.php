<?php
session_start();
 
if (!empty($_SESSION['nik'])) {
    header('location:dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'modul/head.php'; ?>
</head>
<body>
	<div class="container">
	<br /><br /><br />
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<div class="panel panel-info">
                    <div class="panel-heading">
						Login Area
                    </div>
					
					<div class="panel-body">
						<form action="config/otentikasi.php" method="post" accept-charset="utf-8" class="form-horizontal">
							<div class="form-group">
								<label for="nik" class="col-lg-3 control-label">NRK</label>
								<div class="col-lg-8">
									<input type="nik" class="form-control" placeholder="NRK ..." name="nik">
								</div>
							</div>
							
							<div class="form-group">
								<label  for="password" class="col-lg-3 control-label">Password</label>
								<div class="col-lg-8">
									<input type="password" class="form-control" placeholder="Password" name="password">
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-lg-4 col-lg-offset-3">
									<button type="submit" class="btn btn-primary">Masuk</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-lg-offset-3">
				<?php
					//kode php ini kita gunakan untuk menampilkan pesan eror
					if (!empty($_GET['error'])) {
						if ($_GET['error'] == 1) {
							echo '<div class="alert alert-dismissible alert-info">
							<button type="button" class="close" data-dismiss="alert">×</button>
							Username dan Pasword tidak cocok!
							</div>';
							} else if ($_GET['error'] == 2) {
								echo '<div class="alert alert-dismissible alert-info">
								<button type="button" class="close" data-dismiss="alert">×</button>
								Username dan Pasword tidak cocok!
								</div>';
								} else if ($_GET['error'] == 3) {
									echo '<div class="alert alert-dismissible alert-info">
										<button type="button" class="close" data-dismiss="alert">×</button>
										Password kosong!
										</div>';
											} else if ($_GET['error'] == 4) {
											echo '<div class="alert alert-dismissible alert-info">
											<button type="button" class="close" data-dismiss="alert">×</button>
											Username dan Pasword tidak cocok!
											</div>';
											}
						}
				?>
			</div>
		</div>
	</div>
</body>
<?php include 'modul/footer.php'; ?>
</html>