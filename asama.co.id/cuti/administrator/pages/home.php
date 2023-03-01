	<?php
	date_default_timezone_set('Asia/Jakarta');
	$tgl=date('Y-m-d');
	?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="jumbotron">
				<p>Hai <b><?php echo ($_SESSION['nama'])  ;?></b>, Selamat datang di <i>'Sistem Pengajuan Cuti Karyawan PT. Asama Indonesia MFG'</i>. Di bawah ini adalah data cuti karyawan yang menunggu persetujuan anda.</p>
				</div>
				<?php
					//kode php ini kita gunakan untuk menampilkan pesan eror
					if (!empty($_GET['psn'])) {
						if ($_GET['psn'] == 1) {
							writeMsg('proses.sukses');
							}else if ($_GET['psn'] == 2) {
								writeMsg('proses.gagal');
								}
						}
				?>
			</div>
		</div>
		
		<table class='table table-bordered table-hover'>
			<thead>
				<tr>
					<th><center>No</center></th>
					<th><center>Kode Cuti</center></th>
					<th><center>NIK</center></th>
					<th><center>Nama</center></th>
					<th><center>Departemen</center></th>
					<th><center>Keterangan Cuti</center></th>
					<th><center>Tgl. Cuti</center></th>
					<th><center>Batas Cuti</center></th>
					<th width='100'><center>Aksi</center></th>
				</tr>
			</thead>
			<?php
			$sql = mysql_query("SELECT
								a.nik,
								a.nama,
								b.nama AS cabang_id,
								c.keterangan,
								c.tanggal1, 
								c.batascuti,
								c.status,
								c.pegawai_id,
								c.id,
								c.kode
								FROM 
								pegawai a, departemen b, cuti c 
								WHERE 
								a.cabang_id=b.id 
								AND a.id=c.pegawai_id
								AND c.status='W'
								ORDER BY nik ASC");
			$no=1;
			while ($row = mysql_fetch_array($sql)) {
			?>
			<tbody>
			<tr>
				<td align='center'><?php echo $no; ?></td>
				<td align='center'><?php echo $row['kode']; ?></td>
				<td align='center'><?php echo $row['nik']; ?></td>
				<td><?php echo $row['nama']; ?></td>
				<td><?php echo $row['cabang_id']; ?></td>
				<td><?php echo $row['keterangan']; ?></td>
				<td align='center'><?php echo date ("d-m-Y", strtotime ($row['tanggal1'])); ?></td>
				<td align='center'><?php echo date ("d-m-Y", strtotime ($row['batascuti'])); ?></td>
				<td align='center'>
				<a href='dashboard.php?p=lihat&id=<?php echo $row['pegawai_id']; ?>'><span title='Lihat data Pegawai' class='glyphicon glyphicon-eye-open'></span></a>
				
				<a href='pages/aksi/terimacuti.php?id=<?php echo $row['id']; ?>&date=<?php echo $tgl; ?>&ptgs=<?php echo ($_SESSION['id']); ?>&kct=<?php echo $row['kode']; ?>' onclick ="if (!confirm('Apakah Anda yakin menerima cuti ini?')) return false;"><span title='Terima Cuti' class='glyphicon glyphicon-ok'></span></a>
				
				<a href='pages/aksi/tolakcuti.php?id=<?php echo $row['id']; ?>&date=<?php echo $tgl; ?>&ptgs=<?php echo ($_SESSION['id']); ?>&kct=<?php echo $row['kode']; ?>' onclick ="if (!confirm('Apakah Anda yakin menolak cuti ini?')) return false;"><span title='Tolak Cuti' class='glyphicon glyphicon-remove'></span></a>
				</td>
			</tr>
			</tbody>
			<?php $no++; } ?>
		</table>
		<?php
					if (isset($_POST["update"])) {
						$cekdata = "SELECT merek from merek_produk WHERE merek='$_POST[merek]'";
						$ada = mysql_query($cekdata) or die(mysql_error());
						
						if(mysql_num_rows($ada)>0){
							header("location: dashboard.php?p=merek_produk&psn=1");
						} else{
							$query = "UPDATE merek_produk SET merek = '$_POST[merek]' WHERE id = '$_GET[id]'"; 
							$sql = mysql_query($query); 
							
								if ($sql){
									header("location: dashboard.php?p=merek_produk&psn=2");
								}else{
									header("location: dashboard.php?p=merek_produk&psn=3");
								}
						}						
					}
		?>
	</div>