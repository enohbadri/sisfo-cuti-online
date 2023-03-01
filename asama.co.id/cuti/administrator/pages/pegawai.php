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
				<h1 class="page-header">Daftar Karyawan</h1>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-6">
				<a href="dashboard.php?p=tambah_pegawai"><button class="btn btn-success"> + Tambah Karyawan </button></a>
			</div>
			<div class="col-lg-6">
			<?php
				//kode php ini kita gunakan untuk menampilkan pesan eror
				if (!empty($_GET['psn'])) {
					if ($_GET['psn'] == 1) {
						writeMsg('nik.gagal');
						}else if ($_GET['psn'] == 2) {
							writeMsg('save.sukses');
							} else if ($_GET['psn'] == 3) {
								writeMsg('tambahpegawai.gagal');
								} else if ($_GET['psn'] == 4) {
									writeMsg('update.sukses');
									} else if ($_GET['psn'] == 5) {
										writeMsg('update.gagal');
									} 
					}
			?>
			</div>
		</div>
		
		<br />
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Daftar Karyawan
                    </div>

                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-paginate" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th><center>No.</center></th>
										<th>NRK</th>
										<th>Nama Lengkap</th>
										<th><center>Jenis Kelamin</center></th>
										<th>Alamat</th>
										<th><center>No. Telepon</center></th>
										<th>Departemen</th>
										<th><center>Status</center></th>
										<th><center>Aksi</center></th>
									</tr>
								</thead>
								<tbody>
								<?php
									$sql = mysql_query("SELECT 
															a.id,
															a.nik,
															a.nama,
															a.jkelamin,
															a.alamat,
															a.no_tlp,
															b.nama AS cabang_id,
															a.status
															FROM
															pegawai a, departemen b
															WHERE
															a.cabang_id=b.id
															ORDER BY nik ASC");
									$no=1; 
									while ($row = mysql_fetch_array($sql)) { 
								?>
									<tr>
										<td align="center"><?php echo $no; ?></td>
										<td align="center"><?php echo $row['nik'] ?></td>
										<td><?php echo $row['nama'] ?></td>
										<td align="center"><?php echo $row['jkelamin'] ?></td>
										<td><?php echo $row['alamat'] ?></td>
										<td align="center"><?php echo $row['no_tlp'] ?></td>
										<td><?php echo $row['cabang_id'] ?></td>
										<td align="center">
											<?php if($row['status']=='Aktif'){
											echo '<span class="label  label-success">Aktif</span>';
												} elseif ($row['status']=='Tidak Aktif') {
													echo '<span class="label  label-warning">Tidak Aktif</span>';
											}?>
										</td>
										<td align="center">
											<a class="btn btn-xs btn-warning" href='dashboard.php?p=lihat&id=<?php echo $row['id']; ?>'><span title='Lihat data Pegawai' class='glyphicon glyphicon-eye-open'></span></a>  											
											<a class="btn btn-xs btn-success" href="dashboard.php?p=edit_pegawai&id=<?php echo $row['id']; ?>"><span title='Edit data Pegawai' class="glyphicon glyphicon-edit"></span></a>
										</td>						
									</tr>
									<?php $no++; } ?>	
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>