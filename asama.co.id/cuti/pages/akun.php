<?php
$sql = mysql_query("SELECT a.id AS idkcb, a.nama AS nmkcb, b.cabang_id, b.id FROM departemen a, pegawai b WHERE b.cabang_id=a.id AND b.id='".$_SESSION['id']."'");
$ro = mysql_fetch_array($sql);

$sql2 = mysql_query("SELECT * FROM pegawai WHERE id='".$_SESSION['id']."'");
$row = mysql_fetch_array($sql2);
?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 toppad" >
				<div class="panel panel-info">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-3 col-lg-3" align="center">
								<img alt="User Pic" src="./img/<?php echo $row['gbrpgw']; ?>" class="img-circle img-responsive">
							<br />
								<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
									<table class="table" >
										<tr>
											<td class="col-md-8" align="center"><input type="file" accept="image/*" name="gambar"></td>
										</tr>
										<tr>
											<td class="col-md-8" align="center"><button class="btn btn-success" type="submit" value="Upload" name="upload">Upload</button></td>
										</tr>
										<?php
											if (isset($_POST['upload'])) {
												$nama_gambar=$_FILES['gambar'] ['name']; // Mendapatkan nama gambar
												$lokasi=$_FILES['gambar'] ['tmp_name']; 
											 
												// Menyiapkan tempat nemapung gambar yang diupload
												$lokasitujuan="./img";
												// Menguplaod gambar kedalam folder ./image
												$upload=move_uploaded_file($lokasi,$lokasitujuan."/".$nama_gambar);
											 
												mysql_query("UPDATE pegawai SET gbrpgw = '".$nama_gambar."' WHERE id='".$_SESSION['id']."'");
												echo "Gambar berhasil diuplaod";
													// Merefresh halaman
													echo "<meta http-equiv='refresh' content=3;url='dashboard.php?p=akun'>";
												}
										?>
									</table>
								</form>
							</div>
							
							<form class="form-horizontal" method="POST" onsubmit='return formValidation()'>			
								<div class=" col-md-9 col-lg-9 "> 
									<table class="table table-user-information">
										<tbody>
											<tr>
												<td class="col-md-2">Nama </td>
												<td class="col-md-1">:</td>
												<td class="col-md-6"><?php echo $row['nama'];?></td>
											</tr>
											<tr>
												<td class="col-md-2">NRK </td>
												<td class="col-md-1">:</td>
												<td class="col-md-6"><?php echo $row['nik'];?></td>
											</tr>
											<tr>
												<td class="col-md-2">No. KTP </td>
												<td class="col-md-1">:</td>
												<td class="col-md-6"><?php echo $row['noktp'];?></td>
											</tr>
											<tr>
												<td class="col-md-2">NPWP </td>
												<td class="col-md-1">:</td>
												<td class="col-md-6"><input type="text" maxlength="21" class="form-control" id="npwp" name="npwp" value="<?php echo $row['npwp'];?>"></td>
											</tr>
											<tr>
												<td class="col-md-2">Telepon </td>
												<td class="col-md-1">:</td>
												<td class="col-md-6"><input type="text" maxlength="21" class="form-control" id="notlp" name="notlp" value="<?php echo $row['no_tlp'];?>"></td>
											</tr>
											<tr>
												<td class="col-md-2">Jenis Kelamin </td>
												<td class="col-md-1">:</td>
												<td class="col-md-6"><?php echo $row['jkelamin'];?></td>
											</tr>
											<tr>
												<td class="col-md-2">Agama </td>
												<td class="col-md-1">:</td>
												<td class="col-md-6"><?php echo $row['agama'];?></td>
											</tr>
											<tr>
												<td class="col-md-2">Status </td>
												<td class="col-md-1">:</td>
												<td class="col-md-6"><?php echo $row['statuspernikahan'];?></td>
											</tr>
											<tr>
												<td class="col-md-2">Departemen </td>
												<td class="col-md-1">:</td>
												<td class="col-md-6"><?php echo $ro['nmkcb'];?></td>
											</tr>
											<tr>
												<td class="col-md-2">Alamat </td>
												<td class="col-md-1">:</td>
												<td class="col-md-6"><textarea  maxlength="300" rows="2" class="form-control" id="alamat" name="alamat" required><?php echo $row['alamat'];?></textarea></td>
											</tr>
										</tbody>
									</table>
									<a href="dashboard.php?p=ubah_password" class="btn btn-danger">Ubah Password</a>
									<button class="btn btn-success" type="submit" value="Update" name="update">Update Info</button>
									<span id="np" class="label label-success"></span>
									<span id="npw1" class="label label-success"></span><span id="npw2" class="label label-warning"></span>
									<span id="nt1" class="label label-success"></span><span id="nt2" class="label label-warning"></span>
									<?php
										if (isset($_POST['update'])) {
											mysql_query("UPDATE pegawai SET npwp = '".$_POST['npwp']."', no_tlp = '".$_POST['notlp']."', alamat = '".$_POST['alamat']."'  WHERE id = '".$_SESSION['id']."'");

											//Re-Load Data from DB
											$sql = mysql_query("SELECT npwp, no_tlp, alamat FROM pegawai WHERE id = '".$_SESSION['id']."'");
											$row = mysql_fetch_array($sql);
											
											header('Location: dashboard.php?p=akun');
										}
									?>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<script type="text/javascript">
	// Script untuk validasi FORM
	function formValidation(){

		// Make quick references to our fields	
		var npwp =  document.getElementById('npwp');
		var notlp =  document.getElementById('notlp');

		//  to check empty form fields.

		if(npwp.value.length == 0){
			document.getElementById('np').innerText = "Semua form harus diisi!"; //this segment displays the validation rule for all fields
			npwp.focus();
			return false;
		} 
		
		if(textAlphanumericnpwp(npwp, "Isi form dengan huruf atau angka!")){
									
			if(lengthDefinenpwp(npwp, 16, 21)){
										
				if(textNumericst(notlp, "Isi form dengan angka!")){
																
					if(lengthDefinent(notlp, 7, 12)){
					
					return true;
					}
				}
			}
		}
		
		return false;
		
	}
	

	//NPWP
	function textAlphanumericnpwp(inputtext, alertMsg){
		var alphaExp = /^[0-9a-zA-Z .-]+$/;
		if(inputtext.value.match(alphaExp)){
			return true;
		}else{
			document.getElementById('npw1').innerText = alertMsg;
			inputtext.focus();
			return false;
		}
	}
	function lengthDefinenpwp(inputtext, min, max){
		var uInput = inputtext.value;
		if(uInput.length >= min && uInput.length <= max){
			return true;
		}else{
			
			document.getElementById('npw2').innerText = "* Masukkan " +min+ " sampai " +max+ " karakter *"; 
			inputtext.focus();
			return false;
		}
	}	
	
	//No. Tlp
	function textNumericst(inputtext, alertMsg){
		var numericExpression = /^[0-9]+$/;
		if(inputtext.value.match(numericExpression)){
			return true;
		}else{
			document.getElementById('nt1').innerText = alertMsg;  //this segment displays the validation rule for zip
			inputtext.focus();
			return false;
		}
	}
	// Nomor Telepon
	function lengthDefinent(inputtext, min, max){
		var uInput = inputtext.value;
		if(uInput.length >= min && uInput.length <= max){
			return true;
		}else{
			
			document.getElementById('nt2').innerText = "* Masukkan " +min+ " sampai " +max+ " karakter *"; 
			inputtext.focus();
			return false;
		}
	}
	</script>