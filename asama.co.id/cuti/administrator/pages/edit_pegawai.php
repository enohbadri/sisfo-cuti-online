<?php
if (isset($_SESSION['level']))
{
 
   if ($_SESSION['level'] == "pimpinan") {
	header("Location: pages/404.php");
   }
}
$sql1 = mysql_query("SELECT a.id AS idkcb, a.nama AS nmkcb, b.cabang_id, b.id FROM departemen a, pegawai b WHERE b.cabang_id=a.id AND b.id='$_GET[id]'");
$ro = mysql_fetch_array($sql1);

$sql = mysql_query("SELECT * FROM pegawai WHERE id='$_GET[id]'");
$row = mysql_fetch_array($sql);
?>	

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Data Pegawai</h1>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-4">
				<a href="dashboard.php?p=pegawai"><button class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"> Kembali</span></button></a>
			</div>
			<div class="col-lg-4">
				<span id="head" class="label label-success"></span>
			</div>
		</div>
		
				<br />
		
		<div class="row">
			<div class="col-lg-12">
				<form class="form-horizontal" method="POST" onsubmit='return formValidation()'>					
					<div class="form-group">
						<label for="nik" class="col-lg-2 control-label">NIK :</label>
						<div class="col-lg-2">
							<input type="text" maxlength="8" class="form-control" id="nik" name="nik" value="<?php echo $row['nik']  ;?>" class="uneditable-input" readonly="true">
						</div>
						<div class="col-lg-6">
							<span class="hasil-nik"></span>
							<span id="ni1" class="label label-success"></span><span id="ni2" class="label label-warning"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="nmpeg" class="col-lg-2 control-label">Nama Pegawai :</label>
						<div class="col-lg-6">
							<input type="text" maxlength="50" class="form-control" id="nmpeg" name="nmpeg" value="<?php echo $row['nama']  ;?>">
						</div>
						<span id="nm1" class="label label-success"></span><span id="nm2" class="label label-warning"></span>
					</div>
					
					<div class="form-group">
						<label for="noktp" class="col-lg-2 control-label">No. KTP :</label>
						<div class="col-lg-4">
							<input type="text" maxlength="16" class="form-control" id="noktp" name="noktp" value="<?php echo $row['noktp']  ;?>">
						</div>
						<span id="nktp1" class="label label-success"></span><span id="nktp2" class="label label-warning"></span>
					</div>
					
					<div class="form-group">
						<label for="npwp" class="col-lg-2 control-label">NPWP :</label>
						<div class="col-lg-4">
							<input type="text" maxlength="21" class="form-control" id="npwp" name="npwp" value="<?php echo $row['npwp']  ;?>">
						</div>
						<span id="npw1" class="label label-success"></span><span id="npw2" class="label label-warning"></span>
					</div>
					
					<div class="form-group">
						<label for="jkelamin" class="col-lg-2 control-label">Jenis Kelamin :</label>
						<div class="col-lg-6">
							<select class="form-control" id="jkelamin" name="jkelamin">
								<option value="<?php echo $row['jkelamin']  ;?>" class="form-control" selected="selected"><?php echo $row['jkelamin']  ;?></option>
								<option value="Laki-laki">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
						<span id="jk1" class="label label-success"></span><span id="jk2" class="label label-warning"></span>
					</div>
					
					<div class="form-group">
						<label for="alamat" class="col-lg-2 control-label">Alamat :</label>
						<div class="col-lg-6">
							<textarea  maxlength="300" rows="2" class="form-control" id="alamat" name="alamat" required><?php echo $row['alamat']  ;?></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label for="no_tlp" class="col-lg-2 control-label">No. Telepon :</label>
						<div class="col-lg-6">
							<input type="text" maxlength="12" class="form-control" id="no_tlp" name="no_tlp" value="<?php echo $row['no_tlp']  ;?>"> <br />
						</div>
						<span id="nt1" class="label label-success"></span><span id="nt2" class="label label-warning"></span>
					</div>
					
					<div class="form-group">
						<label for="agama" class="col-lg-2 control-label">Agama :</label>
						<div class="col-lg-6">
							<select class="form-control" id="agama" name="agama">
								<option value="<?php echo $row['agama']  ;?>" selected><?php echo $row['agama']  ;?></option>
								<option value="Islam">Islam</option>
								<option value="Katolik">Katolik</option>
								<option value="Protestan">Protestan</option>
								<option value="Hindu">Hindu</option>
								<option value="Budha">Budha</option>
								<option value="Konghuchu">Konghuchu</option>
							</select>
						</div>
						<span id="agm" class="label label-success"></span>
					</div>
					
					<div class="form-group">
						<label for="snikah" class="col-lg-2 control-label">Status Pernikahan :</label>
						<div class="col-lg-6">
							<select class="form-control" id="snikah" name="snikah">
								<option value="<?php echo $row['statuspernikahan']  ;?>" selected><?php echo $row['statuspernikahan']  ;?></option>
								<option value="Menikah">Menikah</option>
								<option value="Lajang">Lajang</option>
								<option value="Duda">Duda</option>
								<option value="Janda">Janda</option>
							</select>
						</div>
						<span id="snkh" class="label label-success"></span>
					</div>
					
					<div class="form-group">
						<label for="status" class="col-lg-2 control-label">Status :</label>
						<div class="col-lg-6">
							<select class="form-control" id="status" name="status">
								<option value="<?php echo $row['status']  ;?>" selected><?php echo $row['status']  ;?></option>
								<option value="Aktif">Aktif</option>
								<option value="Tidak Aktif">Tidak Aktif</option>
							</select>
						</div>
						<span id="st1" class="label label-success"></span>
					</div>
					
					<div class="form-group">
						<label for="departemen" class="col-lg-2 control-label">Departemen : </label>
						<div class="col-lg-6">
							<select class="form-control" id="departemen" name="departemen">
								<option value="<?php echo $ro['idkcb']; ?>" selected="selected"><?php echo $ro['nmkcb']; ?></option>

								<?php 
								$query2 = mysql_query("SELECT * FROM departemen ORDER by nama ASC");
								while($r = mysql_fetch_array($query2)){
									echo '<option value="'.$r['id'].'">'.$r['nama'].'</option>';
								} ?>
							</select>
						</div>
						<span id="kc1" class="label label-success"></span>
					</div>
					
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<button class="btn btn-danger" type="reset" value="Reset" >Reset</button>
							<button class="btn btn-success" type="submit" value="Update" name="update">Update</button>
						</div>
					</div>
					
					<?php
					if (isset($_POST["update"])) {
						mysql_query("UPDATE pegawai SET nik = '".$_POST['nik']."', noktp = '".$_POST['noktp']."', npwp = '".$_POST['npwp']."', nama = '".$_POST['nmpeg']."', jkelamin = '".$_POST['jkelamin']."', alamat = '".$_POST['alamat']."', no_tlp = '".$_POST['no_tlp']."', agama = '".$_POST['agama']."',  statuspernikahan = '".$_POST['snikah']."', cabang_id = '".$_POST['departemen']."', status = '".$_POST['status']."' WHERE id = '$_GET[id]'");
						
						header('Location: dashboard.php?p=pegawai&psn=4');
					}
					?>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	// Script untuk validasi FORM
	function formValidation(){

		// Make quick references to our fields	
		var nik =  document.getElementById('nik');
		var nmpeg =  document.getElementById('nmpeg');
		var jkelamin =  document.getElementById('jkelamin');
		var no_tlp =  document.getElementById('no_tlp');
		var kcabang =  document.getElementById('departemen');
		var status =  document.getElementById('status');
		var noktp =  document.getElementById('noktp');
		var npwp =  document.getElementById('npwp');
		var agama =  document.getElementById('agama');
		var snikah =  document.getElementById('snikah');

		//  to check empty form fields.

		if(nik.value.length == 0){
			document.getElementById('head').innerText = "Semua form harus diisi!"; //this segment displays the validation rule for all fields
			nik.focus();
			return false;
		} 
		
		if(textAlphanumericni(nik, "Isi form dengan huruf atau angka!")){
							
			if(lengthDefineni(nik, 8, 8)){
				
				if(textAlphanumericspace(nmpeg, "Isi form tanpa karakter spesial!")){
									
					if(lengthDefinenm(nmpeg, 5, 50)){
				
						if(textAlphanumericktp(noktp, "Isi Form dengan Angka!")){
							
							if(lengthDefinektp(noktp, 16, 16)){
								
								if(textAlphanumericnpwp(npwp, "Isi form dengan huruf atau angka!")){
									
									if(lengthDefinenpwp(npwp, 16, 21)){
										
										if(trueSelectionjk(jkelamin, "Pilih salah satu!")){
								
											if(textNumericst(no_tlp, "Isi form dengan angka!")){
																
												if(lengthDefinent(no_tlp, 7, 12)){
													
													if(trueSelectionag(agama, "Pilih salah satu!")){
														
														if(trueSelectionsnkh(snikah, "Pilih salah satu!")){
																
															if(trueSelectionkc(kcabang, "Pilih salah satu!")){
																	
																if(trueSelectionst(status, "Pilih salah satu!")){
									
																	return true;
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
		
		return false;
		
	}
	

	//NIP
	function textAlphanumericni(inputtext, alertMsg){
		var alphaExp = /^[0-9a-zA-Z]+$/;
		if(inputtext.value.match(alphaExp)){
			return true;
		}else{
			document.getElementById('ni1').innerText = alertMsg; //this segment displays the validation rule for address
			inputtext.focus();
			return false;
		}
	}
	function lengthDefineni(inputtext, min, max){
		var uInput = inputtext.value;
		if(uInput.length >= min && uInput.length <= max){
			return true;
		}else{
			
			document.getElementById('ni2').innerText = "* Masukkan " +min+ " sampai " +max+ " karakter *"; 
			inputtext.focus();
			return false;
		}
	}
	
	//Nama
	//function that checks whether input text includes alphabetic and numeric characters.
	function textAlphanumericspace(inputtext, alertMsg){
		var alphaExp = /^[0-9a-zA-Z .()]+$/;
		if(inputtext.value.match(alphaExp)){
			return true;
		}else{
			document.getElementById('nm1').innerText = alertMsg; //this segment displays the validation rule for address
			inputtext.focus();
			return false;
		}
	}
	function lengthDefinenm(inputtext, min, max){
		var uInput = inputtext.value;
		if(uInput.length >= min && uInput.length <= max){
			return true;
		}else{
			
			document.getElementById('nm2').innerText = "* Masukkan " +min+ " sampai " +max+ " karakter *"; 
			inputtext.focus();
			return false;
		}
	}

	//KTP
	function textAlphanumericktp(inputtext, alertMsg){
		var alphaExp = /^[0-9]+$/;
		if(inputtext.value.match(alphaExp)){
			return true;
		}else{
			document.getElementById('nktp1').innerText = alertMsg; //this segment displays the validation rule for address
			inputtext.focus();
			return false;
		}
	}
	function lengthDefinektp(inputtext, min, max){
		var uInput = inputtext.value;
		if(uInput.length >= min && uInput.length <= max){
			return true;
		}else{
			
			document.getElementById('nktp2').innerText = "* Masukkan " +min+ " sampai " +max+ " karakter *"; 
			inputtext.focus();
			return false;
		}
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
	
	// Jenis Kelamin
	function trueSelectionjk(inputtext, alertMsg){
		if(inputtext.value == ""){
			document.getElementById('jk1').innerText = alertMsg; //this segment displays the validation rule for selection
			inputtext.focus();
			return false;
		}else{
			return true;
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
	
	// Kantor Cabang
	function trueSelectionag(inputtext, alertMsg){
		if(inputtext.value == ""){
			document.getElementById('agm').innerText = alertMsg; 
			inputtext.focus();
			return false;
		}else{
			return true;
		}
	}

	// Status Pernikahan
	function trueSelectionsnkh(inputtext, alertMsg){
		if(inputtext.value == ""){
			document.getElementById('snkh').innerText = alertMsg;
			inputtext.focus();
			return false;
		}else{
			return true;
		}
	}
	
	// Kantor Cabang
	function trueSelectionkc(inputtext, alertMsg){
		if(inputtext.value == ""){
			document.getElementById('kc1').innerText = alertMsg; //this segment displays the validation rule for selection
			inputtext.focus();
			return false;
		}else{
			return true;
		}
	}
	
	// Status
	function trueSelectionst(inputtext, alertMsg){
		if(inputtext.value == ""){
			document.getElementById('st1').innerText = alertMsg; //this segment displays the validation rule for selection
			inputtext.focus();
			return false;
		}else{
			return true;
		}
	}
	</script>