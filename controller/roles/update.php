<?php
    $BASE_URL = realpath(dirname(__DIR__).'\..');
	include($BASE_URL.'/connect.php');
	include($BASE_URL.'/class/Role.php');
    
    if(isset($_POST['update']));
    {
        $Role = new Role($conn);
        $Role->setIdRole($_POST['IdRole']);
        $Role->setNamaRole($_POST['NamaRole']);
        $Role->setDescRole($_POST['Keterangan']);
        $Role->updateRole();
        header ("location:/tk4/view/roles/index.php");
    }
?>