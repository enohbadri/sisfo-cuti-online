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
				<h1 class="page-header">Daftar User</h1>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-6">
				<a href="dashboard.php?p=tambah_user"><button class="btn btn-success"> + Tambah user </button></a>
			</div>
			<div class="col-lg-6">
			<?php
				//kode php ini kita gunakan untuk menampilkan pesan eror
				if (!empty($_GET['psn'])) {
					if ($_GET['psn'] == 1) {
						writeMsg('username.gagal');
						}else if ($_GET['psn'] == 2) {
							writeMsg('save.sukses');
							} else if ($_GET['psn'] == 3) {
								writeMsg('tambahuser.gagal');
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
                        Daftar User
                    </div>

                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-paginate" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th><center>No.</center></th>
										<th>NRK</th>
										<th>Nama Lengkap</th>
										<th><center>Level</center></th>
										<th>Email</th>
										<th><center>Aksi</center></th>
									</tr>
								</thead>
								<tbody>
								<?php
									$sql = mysql_query("SELECT * FROM user ORDER BY nip ASC");
									$no=1; 
									while ($row = mysql_fetch_array($sql)) { 
								?>
									<tr>
										<td align="center"><?php echo $no; ?></td>
										<td><?php echo $row['nip'] ?></td>
										<td><?php echo $row['nama'] ?></td>
										<td align="center"><?php echo $row['level'] ?></td>
										<td><?php echo $row['email'] ?></td>
										<td align="center">											
											<a class="btn btn-xs btn-primary" href="dashboard.php?p=edit_user&id=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-edit"> Edit</span></a>
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