<?php
    $BASE_URL = realpath(dirname(__DIR__).'\..');
	include($BASE_URL.'/connect.php');
	include($BASE_URL.'/class/Role.php');
    
    if(isset($_POST['add']));
    {
        $Role = new Role($conn);
        $Role->setIdRole($_POST['IdRole']);
        $Role->setNamaRole($_POST['NamaRole']);
        $Role->setDescRole($_POST['Keterangan']);
        
        try {
            $Role->addRole();
            header ("location:/tk4/view/roles/index.php");
        } catch (Exception $e) {
            echo "<p>Error: </p>";
            echo $e;
            header ("Refresh: 3; URL=/tk4/view/roles/index.php");
        }
    }
?>