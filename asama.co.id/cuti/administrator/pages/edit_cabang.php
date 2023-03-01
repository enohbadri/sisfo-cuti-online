<?php
if (isset($_SESSION['level']))
{
 
   if ($_SESSION['level'] == "pimpinan")
   {
     header("Location: pages/404.php");
   }
}

$sql = mysql_query("SELECT * from departemen where id='$_GET[id]'");
$row = mysql_fetch_array($sql);
?>	


	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Departemen</h1>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-2">
				<a href="dashboard.php?p=cabang"><button class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left">  Kembali </button></a>
			</div>
			<div class="col-lg-4">
				<span id="head" class="label label-info"></span>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<form class="form-horizontal" method="POST" onsubmit='return formValidation()'>
					<div class="form-group">
						<label class="col-lg-2 control-label">Departemen</label>
						<div class="col-lg-4">
							<input class="form-control" type="text" maxlength="50" name="ncabang" id="ncabang" value="<?php echo $row['nama']  ;?>" >
						</div>
						<span id="h1" class="label label-success"></span><span id="h2" class="label label-warning"></span>
					</div>
					
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<button class="btn btn-success" type="submit" value="Update" name="update">Update</button>
							<button class="btn btn-danger" type="reset" value="Reset" >Reset</button>
						</div>
					</div>
				<?php
					if (isset($_POST["update"])) {
						$cekdata = "SELECT nama from departemen WHERE nama='$_POST[ncabang]'";
						$ada = mysql_query($cekdata) or die(mysql_error());
						
						if(mysql_num_rows($ada)>0){
							header("location: dashboard.php?p=cabang&psn=1");
						} else{
							$query = "UPDATE departemen SET nama = '$_POST[ncabang]' WHERE id = '$_GET[id]'"; 
							$sql = mysql_query($query); 
							
								if ($sql){
									header("location: dashboard.php?p=cabang&psn=2");
								}else{
									header("location: dashboard.php?p=cabang&psn=3");
								}
						}						
					}
				?>
										
				</form>
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