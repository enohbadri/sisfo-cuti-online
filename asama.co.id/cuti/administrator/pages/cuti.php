	<?php
	date_default_timezone_set('Asia/Jakarta');
	$tgl=date('Y-m-d');
	?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Cuti Karyawan</h1>
				
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
	
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						Daftar Cuti
					</div>

				<div class="panel-body">
					<div class="dataTable_wrapper">
						<table class='table table-striped table-bordered table-paginate'>
							<thead>
								<tr>
									<th width='5%'><center>No</center></th>
									<th width='10%'><center>Kode Cuti</center></th>
									<th width='20%'><center>Nama</center></th>
									<th width='25%'><center>Keterangan Cuti</center></th>
									<th width='10%'><center>Tgl. Cuti</center></th>
									<th width='10%'><center>Batas Cuti</center></th>
									<th width='10%'><center>Status Cuti</center></th>
									<th width='10%'><center>Aksi</center></th>
								</tr>
							</thead>
							<?php
							$sql = mysql_query("SELECT
												a.nik, 
												a.nama,
												b.keterangan,
												b.tanggal1, 
												b.batascuti,
												b.kode,
												b.status,
												b.pegawai_id,
												b.id
												FROM 
												pegawai a, cuti b 
												WHERE 
												a.id=b.pegawai_id
												ORDER BY kode ASC");
							$no=1;
							while ($row = mysql_fetch_array($sql)) {
							?>
							<tbody>
							<tr>
								<td align='center'><?php echo $no; ?></td>
								<td align='center'><?php echo $row['kode']; ?></td>
								<td><?php echo $row['nama']; ?></td>
								<td><?php echo $row['keterangan']; ?></td>
								<td align='center'><?php echo date ("d-m-Y", strtotime ($row['tanggal1'])); ?></td>
								<td align='center'><?php echo date ("d-m-Y", strtotime ($row['batascuti'])); ?></td>
								<td align='center'>
								<?php if($row['status']=='A'){
									echo '<span class="label label-success">Diterima</span> <a class="btn btn-xs btn-default" href="dashboard.php?p=pdfcuti&kdct='.$row['kode'].'&pgid='.$row['pegawai_id'].'"><span title="Lihat data Pegawai" class="glyphicon glyphicon-print"></span></a>';
										} elseif ($row['status']=='T') {
											echo '<span class="label label-danger">Ditolak</span>';
											} elseif ($row['status']=='W') {
												echo '<span class="label label-warning">Menunggu</span>';		
												}?>
								</td>
								<td align='center'>
									<a href='dashboard.php?p=lihat&id=<?php echo $row['pegawai_id']; ?>'><span title='Lihat data Pegawai' class='glyphicon glyphicon-eye-open'></span></a>
									
									<a href='pages/aksi/admterimacuti.php?id=<?php echo $row['id']; ?>&date=<?php echo $tgl; ?>&ptgs=<?php echo ($_SESSION['id']); ?>&kct=<?php echo $row['kode']; ?>' onclick ="if (!confirm('Apakah Anda yakin menerima cuti ini?')) return false;"><span title='Terima Cuti' class='glyphicon glyphicon-ok'></span></a>
									
									<a href='pages/aksi/admtolakcuti.php?id=<?php echo $row['id']; ?>&date=<?php echo $tgl; ?>&ptgs=<?php echo ($_SESSION['id']); ?>&kct=<?php echo $row['kode']; ?>' onclick ="if (!confirm('Apakah Anda yakin menolak cuti ini?')) return false;"><span title='Tolak Cuti' class='glyphicon glyphicon-remove'></span></a>
									
									<a href='pages/aksi/admtunggucuti.php?id=<?php echo $row['id']; ?>&kct=<?php echo $row['kode']; ?>' onclick ="if (!confirm('Apakah Anda yakin merefresh data cuti ini? Status cuti akan berubah menjadi menunggu konfirmasi!')) return false;"><span title='Refresh Data Cuti' class='glyphicon glyphicon-refresh'></span></a>
								</td>
							</tr>
							</tbody>
							<?php $no++; } ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>