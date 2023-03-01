	<script src="../asset/jquery/jquery.min.js"></script>
	<link href="../asset/select2/select2.css" rel="stylesheet">
	<link href="../asset/select2/select2-bootstrap.css" rel="stylesheet">
	<?php
	date_default_timezone_set('Asia/Jakarta');
	$tgl=date('Y-m-d');
	
	// Script membuat kide cuti bertambah otomatis
	$sql=mysql_query("SELECT kode from cuti order by kode DESC LIMIT 0,1");
	$data=mysql_fetch_array($sql);
	$kodeawal=substr($data['kode'],2,6)+1;
		if($kodeawal<10){
			$kode='CT00000'.$kodeawal;
			}
			elseif($kodeawal > 9 && $kodeawal <=99){
				$kode='CT0000'.$kodeawal;
			}else{
				$kode='CT0000'.$kodeawal;
			}
	?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Registrasi Cuti</h1>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<form class="form-horizontal" method="POST" onsubmit='return formValidation()'>
				<?php
					if (isset($_POST["simpan"])) {

						$query="INSERT INTO cuti (kode, pegawai_id, tglpengajuan, tanggal1, batascuti, keterangan, status) VALUES ('$_POST[kdcuti]', '$_POST[pegawai]', '$_POST[todaydate]', '$_POST[tglmulai]', '$_POST[tglselesai]', '$_POST[keterangan]', 'W')";
							$sql = mysql_query($query); 
							
								if ($sql){
									header('Location: dashboard.php?p=cuti&psn=1');
								}else{
									header('Location: dashboard.php?p=cutipsn=2');
								}			
					}
				?>
					
					<div class="form-group">
						<label for="tanggal" class="col-lg-2 control-label"><strong>Tanggal: </strong></label>
						<div class="col-lg-2">
							<input class="form-control" type='text' id='todaydate' name="todaydate" value="<?php echo $tgl;?>" readonly>
						</div>
					</div>
					
					<div class="form-group">
						<label for="kdcuti" class="col-lg-2 control-label">Kode Cuti : </label>
						<div class="col-lg-2">
							<input type="text" maxlength="8" class="form-control uneditable-input" id="kdcuti" name="kdcuti" value="<?php echo $kode;?>" readonly>
						</div>
					</div>
					
					<div class="form-group">
						<label for="pegawai" class="col-lg-2 control-label"><strong>Nama : </strong></label>
						<div class="select2-wrapper col-lg-4">
							<select class="form-control select2" id="pegawai" name="pegawai">
								<option value="">( Pilih data Karyawan )</option>
								<?php 
								$query = mysql_query("select * from pegawai");
								while($row = mysql_fetch_array($query)){
									echo '<option value="'.$row['id'].'">'.$row['nama'].'</option>';
								} ?>
							</select>
							<span id="pg" class="label label-primary">
						</div>
					</div>
					
					<div class="form-group">
						<label for="tglmulai" class="col-lg-2 control-label"><strong>Tanggal Mulai Cuti : </strong></label>
						<div class="col-lg-2">
							<input type="date" class="form-control" id="tglmulai" name="tglmulai" required>
						</div>
						
						<label for="tglselesai" class="col-lg-2 control-label"><strong>Sampai Tanggal : </strong></label>
						<div class="col-lg-2">
							<input type="date" class="form-control" id="tglselesai" name="tglselesai" required>
						</div>
					</div>

					<div class="form-group">
						<label for="blokir" class="col-lg-2 control-label">Jenis Cuti </label>
						<div class="col-lg-6">
							<select class="form-control" id="blokir" name="blokir">
								<option value="">( Pilih Jenis Cuti )</option>
								<option value="CT">Cuti Tahunan</option>
								<option value="CB">Cuti Besar</option>
							</select>
						</div>
						<span id="bl1" class="label label-success"></span><span id="bl2" class="label label-warning"></span>
					</div>

					<div class="form-group">
						<label for="keterangan" class="col-lg-2 control-label">Keterangan : </label>
						<div class="col-lg-6">
							<textarea  maxlength="300" rows="3" class="form-control" id="keterangan" name="keterangan" required></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<button class="btn btn-danger" type="reset" value="Reset" >Reset</button>
							<button class="btn btn-success" type="submit" value="Simpan" name="simpan">Ajukan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../asset/jquery/jquery-1.11.0.js"></script>
	<script src="../asset/select2/select2.js"></script>
	<script>
		$( ".select2" ).select2( { placeholder: "Select a State", maximumSelectionSize: 6 } );
		$( ":checkbox" ).on( "click", function() {
			$( this ).parent().nextAll( "select" ).select2( "enable", this.checked );
		});
		
		$( "#demonstrations" ).select2( { placeholder: "Select2 version", minimumResultsForSearch: -1 } ).on( "change", function() {
			document.location = $( this ).find( ":selected" ).val();
		} );

		$( "button[data-select2-open]" ).click( function() {
			$( "#" + $( this ).data( "select2-open" ) ).select2( "open" );
		});
	</script>
	<script type="text/javascript">
	// Script untuk validasi FORM
	function formValidation(){

		// Make quick references to our fields	
		var pegawai =  document.getElementById('pegawai');

		//  to check empty form fields.
		if(pegawai.value.length == 0){
			document.getElementById('pg').innerText = "Pilih nama pegawai!"; //this segment displays the validation rule for all fields
			pegawai.focus();
			return false;
		} 
		
	}
	</script>