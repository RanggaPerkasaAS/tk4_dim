<?php	
	$BASE_URL = realpath(dirname(__DIR__).'\..');
	include($BASE_URL.'/connect.php');
	include($BASE_URL.'/class/Pelanggan.php');

    $id = $_GET['id'];
	$pelanggan = new Pelanggan($conn);
	$pelangganDetail = $pelanggan->findPelangganById($id);
    
?>


<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="/tk4/index.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<?php include($BASE_URL.'/sidenav.php') ?>

		<div class="p-5">		
            <form action="/tk4/controller/pelanggan/update.php" method="post" enctype="multipart/form-data">
                <div class="container">
                    <h5 class="mb-4">Form Edit Pelanggan</h5>
                    <input name="IdPelanggan" id="IdPelanggan" class="form-control" value="<?= $pelangganDetail["id_pelanggan"]?>" type="hidden" required />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Pelanggan</label>
                                <input name="NamaPelanggan" id="NamaPelanggan" class="form-control" placeholder="Masukan Nama Pelanggan..." value="<?= $pelangganDetail["nama_pelanggan"]?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="Alamat" id="Alamat" class="form-control" placeholder="Masukan Alamat..." required rows="10"><?= $pelangganDetail["alamat_pelanggan"]?></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4" name="update" value="Update">Update</button>
                    <a href="/tk4/view/pelanggan" class="btn btn-danger mt-4" role="button" aria-disabled="true">Batal</a>
                </div>
            </form>

        </div>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/f65023b3df.js" crossorigin="anonymous"></script>
	</body>
</html>