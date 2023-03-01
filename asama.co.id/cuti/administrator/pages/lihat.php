<?php
$idpeg = $_GET['id'];

$sql = mysql_query("SELECT 
						a.nik,
						a.gbrpgw,
						a.noktp,
						a.npwp,
						a.nama,
						a.jkelamin,
						a.alamat,
						a.no_tlp,
						a.jkelamin,
						a.agama,
						a.statuspernikahan,
						b.nama AS cabang_id,
						a.status
						FROM
						pegawai a, departemen b
						WHERE
						a.cabang_id=b.id
						ORDER BY nik ASC");
$row = mysql_fetch_array($sql);
?>	
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 toppad" >
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Data User</h3>
					</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-3 col-lg-3" align="center"> <img alt="User Pic" src="../img/<?php echo $row['gbrpgw']  ;?>" class="img-circle img-responsive"> </div>
						
						<div class=" col-md-9 col-lg-9 "> 
							<table class="table table-user-information">
								<tbody>
									<tr>
										<td class="col-md-2">Nama </td>
										<td class="col-md-1">:</td>
										<td class="col-md-6"><?php echo $row['nama']  ;?></td>
									</tr>
									<tr>
										<td class="col-md-2">NIK </td>
										<td class="col-md-1">:</td>
										<td class="col-md-6"><?php echo $row['nik']  ;?></td>
									</tr>
									<tr>
										<td class="col-md-2">No. KTP </td>
										<td class="col-md-1">:</td>
										<td class="col-md-6"><?php echo $row['noktp']  ;?></td>
									</tr>
									<tr>
										<td class="col-md-2">NPWP </td>
										<td class="col-md-1">:</td>
										<td class="col-md-6"><?php echo $row['npwp']  ;?></td>
									</tr>
									<tr>
										<td class="col-md-2">Telepon </td>
										<td class="col-md-1">:</td>
										<td class="col-md-6"><?php echo $row['no_tlp']  ;?></td>
									</tr>
									<tr>
										<td class="col-md-2">Jenis Kelamin </td>
										<td class="col-md-1">:</td>
										<td class="col-md-6"><?php echo $row['jkelamin']  ;?></td>
									</tr>
									<tr>
										<td class="col-md-2">Agama </td>
										<td class="col-md-1">:</td>
										<td class="col-md-6"><?php echo $row['agama']  ;?></td>
									</tr>
									<tr>
										<td class="col-md-2">Status </td>
										<td class="col-md-1">:</td>
										<td class="col-md-6"><?php echo $row['statuspernikahan']  ;?></td>
									</tr>
									<tr>
										<td class="col-md-2">Kantor Cabang </td>
										<td class="col-md-1">:</td>
										<td class="col-md-6"><?php echo $row['cabang_id']  ;?></td>
									</tr>
									<tr>
										<td class="col-md-2">Alamat </td>
										<td class="col-md-1">:</td>
										<td class="col-md-6"><?php echo $row['alamat']  ;?></td>
									</tr>
								</tbody>
							</table>
						</div>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Histori Registrasi Cuti Karyawan</h1>
			</div>
		</div>
		
		<table class='table table-bordered table-hover'>
			<thead>
				<tr>
					<th width='5%'><center>No.</center></th>
					<th width='10%'><center>Kode Cuti</center></th>
					<th width='10%'><center>Tgl Pengajuan</center></th>
					<th width='10%'><center>Mulai Cuti</center></th>
					<th width='10%'><center>Batas Cuti</center></th>
					<th width='20%'><center>Keterangan Cuti</center></th>
					<th width='10%'><center>Status</center></th>
				</tr>
			</thead>
			<?php
				$no=1;
				$sql2 = mysql_query("SELECT * FROM cuti WHERE pegawai_id='$idpeg' ORDER BY kode ASC");
				
				while ($r = mysql_fetch_array($sql2)) {
			?>
			<tbody>
				<tr>
					<td align='center'><?php echo $no; ?>.</td>
					<td align='center'><?php echo $r['kode']; ?></td>
					<td align='center'><?php echo date ('d-m-Y', strtotime ($r['tglpengajuan'])); ?></td>
					<td align='center'><?php echo date ('d-m-Y', strtotime ($r['tanggal1'])); ?></td>
					<td align='center'><?php echo date ('d-m-Y', strtotime ($r['batascuti'])); ?></td>
					<td><?php echo $r['keterangan']; ?></td>
					<td align='center'>
					<?php if($r['status']=='A'){
						echo '<span class="label  label-success">Diterima</span>';
							} else if ($r['status']=='T') {
								echo '<span class="label  label-danger">Ditolak</span>';
								} else if ($r['status']=='W') {
									echo '<span class="label  label-warning">Menunggu</span>';		
									}?>
					</td>
				</tr>
					<?php $no++; } ?>
			</tbody>
		</table>
	</div>