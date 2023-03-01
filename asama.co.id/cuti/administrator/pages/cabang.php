<?php 
if (isset($_SESSION['level']))
{
 
   if ($_SESSION['level'] == "pimpinan")
   {
     header("Location: pages/404.php");
   }
}
?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Departemen</h1>
			</div>
		</div>
		
		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4">
			<h3 class="page-header">Tambah Depertemen</h3>
			<form method="POST" onsubmit='return formValidation()'>
				<?php
					if (isset($_POST["tambah"])) {
						$cekdata = "SELECT nama from departemen WHERE nama='$_POST[ncabang]'";
						$ada = mysql_query($cekdata) or die(mysql_error());
						
						if(mysql_num_rows($ada)>0){
							header("location: dashboard.php?p=cabang&psn=1");
						} else{
							$query="INSERT INTO departemen (nama) VALUES ('$_POST[ncabang]')"; 
							$sql = mysql_query($query); 
							
								if ($sql){
									header("location: dashboard.php?p=cabang&eror=2");
								}else{
									header("location: dashboard.php?p=cabang&eror=3");
								}
						}						
					}
				?>
					<div class="form-group">
						<label class="control-label" for="ncabang">Departemen</label>
						<input class="form-control" placeholder="Departemen ..." type="text" maxlength="50" name="ncabang" id="ncabang">
					</div>
					
					<div class="form-group">
						<button class="btn btn-success" type="submit" value="Tambah" name="tambah">Tambah</button>
						<button class="btn btn-danger" type="reset" value="Reset" >Reset</button>
					</div>
					<div>
						<span id="h1" class="label label-success"></span><span id="h2" class="label label-warning"></span>
					</div>
					<div>
						<span id="head" class="label label-success"></span>
					</div>
					<div>
					<?php
						//kode php ini kita gunakan untuk menampilkan pesan eror
						if (!empty($_GET['psn'])) {
							if ($_GET['psn'] == 1) {
								writeMsg('ncabang.gagal');
								} else if ($_GET['psn'] == 2) {
								writeMsg('update.sukses');
								} else if ($_GET['psn'] == 3) {
								writeMsg('update.gagal');
								}
							}
					?>
					</div>
				</form>
			</div>
		
			<div class="col-xs-8 col-sm-8 col-md-8">
				<h3 class="page-header">Daftar Departemen.</h3>
				<table class="table table-striped table-hover table-paginate">
					<thead>
						<tr>
							<th width="5%">#</th>
							<th>Nama Departemen</th>
							<th><center>Aksi</center></th>
						</tr>
					</thead>
					<tbody>
					<?php
						$sql = mysql_query("SELECT * FROM departemen ORDER BY nama ASC");
						$no=1; 
						while ($row = mysql_fetch_array($sql)) { 
					?>
						<tr>
							<td align="center"><?php echo $no; ?></td>
							<td><?php echo $row['nama'] ?></td>					
							<td align="center">
								<a class="btn btn-xs btn-success" href="dashboard.php?p=edit_cabang&id=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-edit"> Edit</span></a>    
								<a class="btn btn-xs btn-danger" href="pages/aksi/cabanghapus-proses.php?id=<?php echo $row['id']; ?>" onclick ="if (!confirm('Apakah Anda yakin akan menghapus data ini?')) return false;"> <span class="glyphicon glyphicon-trash"> Hapus</span></a>
							</td>						
						</tr>
						<?php $no++; } ?>	
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script language="JavaScript" type="text/javascript">
	function formValidation(){

		var ncabang =  document.getElementById('ncabang');

		//  to check empty form fields.

		if(ncabang.value.length == 0){
			document.getElementById('head').innerText = "Form harus diisi!"; //this segment displays the validation rule for all fields
			ncabang.focus();
			return false;
		} 
		
		// Check each input in the order that it appears in the form!
		if(textNumericha(ncabang, " Isi form dengan huruf tanpa angka dan karakter khusus! ")){
			
			if(lengthDefine(ncabang, 3, 50)){
				
			return true;
			}
		}
		
		
		return false;
		
	}
	
	// Harga
	// function that checks whether input text is numeric or not.
	function textNumericha(inputtext, alertMsg){
		var numericExpression = /^[a-zA-Z ]+$/;
		if(inputtext.value.match(numericExpression)){
			return true;
		}else{
			document.getElementById('h1').innerText = alertMsg;  //this segment displays the validation rule for zip
			inputtext.focus();
			return false;
		}
	}
	
	// Function that checks whether the input characters are restricted according to defined by user.
	function lengthDefine(inputtext, min, max){
		var uInput = inputtext.value;
		if(uInput.length >= min && uInput.length <= max){
			return true;
		}else{
			
			document.getElementById('h2').innerText = "* Masukkan " +min+ " sampai " +max+ " karakter *"; //this segment displays the validation rule for username
			inputtext.focus();
			return false;
		}
	}
	</script>