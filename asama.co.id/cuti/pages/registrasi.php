	<script src="../asset/jquery/jquery.min.js"></script>
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
			<div class="col-lg-2">
				<a href="dashboard.php"><button class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"> Kembali</span></button></a>
			</div>
			<div class="col-lg-6">
				<span id="tm" class="label label-primary"></span><span id="ts" class="label label-primary"></span>
			</div>
		</div>
		
		<br />

		<div class="row">
			<div class="col-lg-12">
				<form class="form-horizontal" method="POST" onsubmit='return formValidation()'>
				<?php
					if (isset($_POST["simpan"])) {

						$query="INSERT INTO cuti (kode, pegawai_id, tglpengajuan, tanggal1, batascuti, keterangan, status) VALUES ('$_POST[kdcuti]', '$_POST[idpeg]', '$_POST[todaydate]', '$_POST[tglmulai]', '$_POST[tglselesai]', '$_POST[keterangan]', 'W')";
							$sql = mysql_query($query); 
							
								if ($sql){
									header('Location: dashboard.php?psn=1');
								}else{
									header('Location: dashboard.php?psn=2');
								}			
					}
				?>
					
					<div class="form-group">
						<label for="kdcuti" class="col-lg-2 control-label">Kode Cuti : </label>
						<div class="col-lg-2">
							<input type="text" maxlength="8" class="form-control uneditable-input" id="kdcuti" name="kdcuti" value="<?php echo $kode;?>" readonly>
						</div>
					</div>
					
					<div class="form-group">
						<label for="tglmulai" class="col-lg-2 control-label"><strong>Tanggal Mulai Cuti : </strong></label>
						<div class="col-lg-2">
							<input type="date" class="form-control" id="tglmulai" name="tglmulai">
						</div>
						
						<label for="tglselesai" class="col-lg-2 control-label"><strong>Sampai Tanggal : </strong></label>
						<div class="col-lg-2">
							<input type="date" class="form-control" id="tglselesai" name="tglselesai">
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

					<input type="hidden" name="idpeg" value="<?php echo ($_SESSION['id']);?>" readonly>
					<input type="hidden" name="todaydate" value="<?php echo $tgl;?>" readonly>
					
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
	<script type="text/javascript">
	// Script untuk validasi FORM
	function formValidation(){

		// Make quick references to our fields	
		var tglmulai =  document.getElementById('tglmulai');
		var tglselesai =  document.getElementById('tglselesai');

		//  to check empty form fields.

		if(tglmulai.value.length == 0){
			document.getElementById('tm').innerText = "Tanggal Mulai Cuti harus diisi!"; //this segment displays the validation rule for all fields
			tglmulai.focus();
			return false;
		} 
		
		if(tglselesai.value.length == 0){
			document.getElementById('ts').innerText = "Tanggal Selesai Cuti harus diisi!"; //this segment displays the validation rule for all fields
			tglselesai.focus();
			return false;
		}
		
		
	}
	</script>