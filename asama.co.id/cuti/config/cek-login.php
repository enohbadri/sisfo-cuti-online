<?php
session_start();

//jika session nik belum dibuat, atau session nik kosong
if (!isset($_SESSION['nik']) || empty($_SESSION['nik'])) {
    //redirect ke halaman login
    header('location: login.php');
}
?>