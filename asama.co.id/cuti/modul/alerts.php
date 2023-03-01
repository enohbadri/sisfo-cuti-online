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
	if ($tipe=='registrasi.sukses') {
		$MsgClass = "alert-success";
		$Msg = "<strong>Sukses!</strong> Registrasi berhasil diajkukan. Silahkan tunggu konfirmasi dari pimpinan dan cek secara berkala.";	
	}
	else 
	if ($tipe == 'registrasi.gagal') {
		$MsgClass = "alert-info";
		$Msg = "<strong>Oops!</strong> Registrasi gagal dikirim! Cek lagi data anda atau hubungi Administrator";
	}
	echo "<div class=\"alert alert-dismissible ".$MsgClass."\">
  	  <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
  	  ".$Msg."
	  </div>";		  
}
?>