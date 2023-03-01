<?php
function writeMsg($tipe){
	if ($tipe=='save.sukses') {
		$MsgClass = "alert-success";
		$Msg = "<strong>Sukses!</strong> Data berhasil disimpan.";	
	} else 
	if ($tipe == 'save.gagal') {
		$MsgClass = "alert-danger";
		$Msg = "<strong>Oops!</strong> Data gagal disimpan!";
	}
	else 
	if ($tipe == 'update.sukses') {
		$MsgClass = "alert-dismissible alert-success";
		$Msg = "<strong>Sukses!</strong> Data berhasil diupdate.";
	}
	else 
	if ($tipe == 'update.gagal') {
		$MsgClass = "alert-danger";
		$Msg = "<strong>Oops!</strong> Data gagal diupdate!";
	}
	else 
	if ($tipe == 'username.gagal') {
		$MsgClass = "alert-info";
		$Msg = "<strong>Oops!</strong> Username telah terdaftar!";
	}
	else 
	if ($tipe == 'tambahuser.gagal') {
		$MsgClass = "alert-info";
		$Msg = "<strong>Oops!</strong> Data 'user' gagal di simpan!";
	}
	else 
	if ($tipe == 'pass.tdkcocok') {
		$MsgClass = "alert-info";
		$Msg = "<strong>Oops!</strong> Password baru tidak sama!";
	}
	else 
	if ($tipe == 'passlama.tdkcocok') {
		$MsgClass = "alert-info";
		$Msg = "<strong>Oops!</strong> Password lama tidak cocok!";
	}
	else 
	if ($tipe == 'password.sukses') {
		$MsgClass = "alert-dismissible alert-success";
		$Msg = "<strong>Sukses!</strong> Password berhasil diganti.";
	}
	else
	if ($tipe == 'ncabang.gagal') {
		$MsgClass = "alert-info";
		$Msg = "<strong>Oops!</strong> Data 'Kantor Cabang' sudah ada!";
	}
	else
	if ($tipe == 'nik.gagal') {
		$MsgClass = "alert-info";
		$Msg = "<strong>Oops!</strong> Data 'NIK Pegawai' sudah ada!";
	}
	else
	if ($tipe == 'tambahpegawai.gagal') {
		$MsgClass = "alert-info";
		$Msg = "<strong>Oops!</strong> Data 'pegawai' gagal di simpan!";
	}
	else 
	if ($tipe == 'proses.sukses') {
		$MsgClass = "alert-dismissible alert-success";
		$Msg = "<strong>Sukses!</strong> Proses sukses dilakukan.";
	}
	else 
	if ($tipe == 'proses.gagal') {
		$MsgClass = "alert-dismissible alert-danger";
		$Msg = "<strong>Gagal!</strong> Proses gagal dilakukan. Hubungi Administrator!";
	}
	echo "<div class=\"alert alert-dismissible ".$MsgClass."\">
  	  <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
  	  ".$Msg."
	  </div>";		  
}
?>