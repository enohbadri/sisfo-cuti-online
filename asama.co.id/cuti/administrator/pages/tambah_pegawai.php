<?php
if (isset($_SESSION['level']))
{
 
   if ($_SESSION['level'] == "pimpinan") {
	header("Location: pages/404.php");
   }
}
?>	
	<script src="../asset/jquery/jquery.min.js"></script>
	<script>
	// Script untuk cek ketersediaan NIK
	$(document).ready(function() {
		$('#nik').change(function() {  // Jika terjadi perubahan pada id NIK
			var nik = $(this).val(); // Ciptakan variabel NIK untuk menampung alamat NIK yang diinputkan
			$.ajax({ // Lakukan pengiriman data dengan Ajax
				type: 'POST', // dengan tipe pengiriman POST
				url: 'pages/aksi/ceknik.php', // dan kirimkan prosesnya ke file ceknik.php
				data: 'nik=' + nik,  // datanya ialah data nik
				 
				success: function(response) { // Jika berhasil
					$('.hasil-nik').html(response); // Tampilkan pesan ke class hasil-nik
				}
			});
		});
	});
	</script>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah Karyawan</h1>
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
				<?php
					if (isset($_POST["simpan"])) {
						$cekdata = "SELECT nik FROM pegawai WHERE nik='$_POST[nik]'";
						$ada = mysql_query($cekdata) or die(mysql_error());
						
						$password = md5("123456");
						
						if(mysql_num_rows($ada)>0){
							header('Location: dashboard.php?p=pegawai&psn=1');
						} else{
							$query="INSERT INTO pegawai (nik, nama, jkelamin, alamat, no_tlp, cabang_id, password, status) VALUES ('$_POST[nik]', '$_POST[nama]', '$_POST[jkelamin]', '$_POST[alamat]', '$_POST[no_tlp]', '$_POST[departemen]', '$password', '$_POST[status]')";
							$sql = mysql_query($query); 
							
								if ($sql){
									header('Location: dashboard.php?p=pegawai&psn=2');
								}else{
									header('Location: dashboard.php?p=pegawai&psn=3');
								}
						}						
					}
				?>
					
					<div class="form-group">
						<label for="nik" class="col-lg-2 control-label">NIK</label>
						<div class="col-lg-2">
							<input type="text" maxlength="8" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK ...">
						</div>
						<div class="col-lg-6">
							<span class="hasil-nik"></span>
							<span id="ni1" class="label label-success"></span><span id="ni2" class="label label-warning"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="nama" class="col-lg-2 control-label">Nama Karyawan </label>
						<div class="col-lg-6">
							<input type="text" maxlength="50" class="form-control" id="nama" name="nama" placeholder="Nama pegawai ...">
						</div>
						<span id="nm1" class="label label-success"></span><span id="nm2" class="label label-warning"></span>
					</div>

					<div class="form-group">
						<label for="jkelamin" class="col-lg-2 control-label">Jenis Kelamin </label>
						<div class="col-lg-6">
							<select class="form-control" id="jkelamin" name="jkelamin">
								<option value="">( Pilih Jenis Kelamin )</option>
								<option value="Laki-laki">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
						<span id="jk1" class="label label-success"></span><span id="jk2" class="label label-warning"></span>
					</div>
					
					<div class="form-group">
						<label for="alamat" class="col-lg-2 control-label">Alamat </label>
						<div class="col-lg-6">
							<textarea  maxlength="255" class="form-control" id="alamat" name="alamat" required></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label for="no_tlp" class="col-lg-2 control-label">No. Telepon </label>
						<div class="col-lg-6">
							<input type="text" maxlength="12" class="form-control" id="no_tlp" name="no_tlp" placeholder="Nomor telepon ..."> <br />
						</div>
						<span id="nt1" class="label label-success"></span><span id="nt2" class="label label-warning"></span>
					</div>
					
					<div class="form-group">
						<label for="kcabang" class="col-lg-2 control-label">Departemen : </label>
						<div class="col-lg-6">
							<select class="form-control" id="kcabang" name="kcabang">
								<option value="">( Pilih Departemen )</option>
								<?php 
								$query = mysql_query("SELECT * FROM kcabang ORDER by nama ASC");
								while($row = mysql_fetch_array($query)){
									echo '<option value="'.$row['id'].'">'.$row['nama'].'</option>';
								} ?>
							</select>
						</div>
						<span id="kc1" class="label label-success"></span>
					</div>
					
					<div class="form-group">
						<label for="status" class="col-lg-2 control-label">Status </label>
						<div class="col-lg-6">
							<select class="form-control" id="status" name="status">
								<option value="">( Pilih Status Karyawan )</option>
								<option value="Tetap">Tetap</option>
								<option value="Kontrak">Kontrak</option>
							</select>
						</div>
						<span id="st1" class="label label-success"></span><span id="st2" class="label label-warning"></span>
					</div>
					
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<button class="btn btn-danger" type="reset" value="Reset" >Reset</button>
							<button class="btn btn-success" type="submit" value="Simpan" name="simpan">Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	// Script untuk validasi FORM
	function formValidation(){

		// Make quick references to our fields	
		var nik =  document.getElementById('nik');
		var nama =  document.getElementById('nama');
		var jkelamin =  document.getElementById('jkelamin');
		var no_tlp =  document.getElementById('no_tlp');
		var kcabang =  document.getElementById('kcabang');
		var status =  document.getElementById('status');

		//  to check empty form fields.

		if(nik.value.length == 0){
			document.getElementById('head').innerText = "Semua form harus diisi!"; //this segment displays the validation rule for all fields
			nik.focus();
			return false;
		} 
		
		if(textAlphanumericni(nik, "Isi form dengan huruf atau angka!")){
							
			if(lengthDefineni(nik, 8, 8)){
				
				if(textAlphanumericspace(nama, "Isi form tanpa karakter spesial!")){
									
					if(lengthDefinenm(nama, 5, 50)){
				
						if(trueSelectionjk(jkelamin, "Pilih salah satu!")){
				
							if(textNumericst(no_tlp, "Isi form dengan angka!")){
												
								if(lengthDefinent(no_tlp, 7, 12)){
												
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