<?php
if (!isset($_SESSION['username']))
{
   header("location:dashboard.php");
}

$sql="SELECT * from user WHERE username='".$_SESSION['username']."'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ubah Password</h1>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<a href="dashboard.php"><button class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"> Kembali</span></button></a>
			</div>
		</div>
		
				<br />
		
		<div class="row">			
			<div class="col-lg-12">
				<form class="form-horizontal" method="POST">
					<div class="form-group">
						<label for="passwordbaru1" class="col-lg-2 control-label">Password Baru </label>
						<div class="col-lg-6">
							<input type="password" maxlength="100" class="form-control" id="passwordbaru1" name="passwordbaru1" placeholder="Password baru ..." required>
						</div>
					</div>
					
					<div class="form-group">
						<label for="passwordbaru2" class="col-lg-2 control-label">Konfirmasi Password Baru </label>
						<div class="col-lg-6">
							<input type="password" maxlength="100" class="form-control" id="passwordbaru2" name="passwordbaru2" placeholder="Konfirmasi password baru ..." required>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<button class="btn btn-success" type="submit" value="Updatepassword" name="updatepassword">Update</button>
						</div>
					</div>
					
					<div>
						<div class="col-lg-10 col-lg-offset-2">
						<?php
						if (isset($_POST["updatepassword"])) {
							$passwordbaru1 = md5($_POST['passwordbaru1']);
							$passwordbaru2= md5($_POST['passwordbaru2']);
														
							if($passwordbaru1 != $passwordbaru2){
								writeMsg('pass.tdkcocok');
							} else{
								$query = "UPDATE user SET password = '$passwordbaru1' WHERE id='".$_SESSION['id']."'"; 
								$sql = mysql_query($query); 
								
									if ($sql){
										writeMsg('password.sukses');;
									}else{
										writeMsg('update.gagal');
									}
							}
						}
						?>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>