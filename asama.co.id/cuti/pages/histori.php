
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Histori Cuti</h1>
			</div>
		</div>
		
		<table class='table table-bordered table-hover'>
			<thead>
				<tr>
					<th width='5%'><center>No.</center></th>
					<th width='15%'><center>Kode Cuti</center></th>
					<th width='10%'><center>Tgl Pengajuan</center></th>
					<th width='10%'><center>Mulai Cuti</center></th>
					<th width='10%'><center>Batas Cuti</center></th>
					<th width='35%'><center>Keterangan Cuti</center></th>
					<th width='15%'><center>Status</center></th>
				</tr>
			</thead>
			<?php
				$no=1;
				$sql = mysql_query("SELECT * FROM cuti WHERE pegawai_id='".$_SESSION['id']."' ORDER BY kode ASC");
				while ($row = mysql_fetch_array($sql)) {
			?>
			<tbody>
				<tr>
					<td align='center'><?php echo $no; ?>.</td>
					<td align='center'><?php echo $row['kode']; ?></td>
					<td align='center'><?php echo date ('d-m-Y', strtotime ($row['tglpengajuan'])); ?></td>
					<td align='center'><?php echo date ('d-m-Y', strtotime ($row['tanggal1'])); ?></td>
					<td align='center'><?php echo date ('d-m-Y', strtotime ($row['batascuti'])); ?></td>
					<td><?php echo $row['keterangan']; ?></td>
					<td align='center'>
					<?php if($row['status']=='A'){
						echo '<span class="label  label-success">Diterima</span> <a class="btn btn-xs btn-default" href="dashboard.php?p=pdfcuti&kdct='.$row['kode'].'&pgid='.$row['pegawai_id'].'"><span title="Lihat data Pegawai" class="glyphicon glyphicon-print"></span></a>';
							} elseif ($row['status']=='T') {
								echo '<span class="label  label-danger">Ditolak</span>';
								} elseif ($row['status']=='W') {
									echo '<span class="label  label-warning">Menunggu</span>';		
									}?>
					</td>
				</tr>
					<?php $no++; } ?>
			</tbody>
		</table>
	</div>