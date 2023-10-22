<?php
    $BASE_URL = realpath(dirname(__DIR__).'\..');
	include($BASE_URL.'/connect.php');
	include($BASE_URL.'/class/Pelanggan.php');
    
    if(isset($_POST['add']));
    {
        $pelanggan = new Pelanggan($conn);
        $pelanggan->setIdPelanggan($_POST['IdPelanggan']);
        $pelanggan->setNamaPelanggan($_POST['NamaPelanggan']);
        $pelanggan->setAlamat($_POST['Alamat']);
        
        try {
            $pelanggan->addPelanggan();
            header ("location:/tk4/view/pelanggan/index.php");
        } catch (Exception $e) {
            echo "<p>Error: </p>";
            echo $e;
            header ("Refresh: 3; URL=/tk4/view/pelanggan/index.php");
        }
    }
?>