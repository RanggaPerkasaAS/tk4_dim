<?php
    $BASE_URL = realpath(dirname(__DIR__).'\..');
	include($BASE_URL.'/connect.php');
	include($BASE_URL.'/class/Pelanggan.php');
    
    if(isset($_POST['update']));
    {
        $pelanggan = new Pelanggan($conn);
        $pelanggan->setIdPelanggan($_POST['IdPelanggan']);
        $pelanggan->setNamaPelanggan($_POST['NamaPelanggan']);
        $pelanggan->setAlamat($_POST['Alamat']);
        $pelanggan->updatePelanggan();
        header ("location:/tk4/view/pelanggan/index.php");
    }
?>