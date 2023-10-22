<?php	
	$BASE_URL = realpath(dirname(__DIR__).'\..');
	include($BASE_URL.'/connect.php');
	include($BASE_URL.'/class/penjualan.php');
	include($BASE_URL.'/class/pembelian.php');
	include($BASE_URL.'/class/labarugi.php');
	include($BASE_URL.'/class/barang.php');

	$penjualan = new Penjualan($conn);
    $totalHargaJual = $penjualan->totalHargaJual();

    $pembelian = new Pembelian($conn);
    $totalHargaBeli = $pembelian->totalHargaBeli();

    $labarugi = new LabaRugi($conn);
    $totalLabaRugi = $labarugi->totalLabaRugi();

    $barang = new Barang($conn);
	$barangList = $barang->barangList();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="/tk4/index.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <?php include($BASE_URL.'/sidenav.php') ?>

    <div class="container my-5 mr-5">
        <div class="d-flex justify-content-between">
        <div class="card pt-3 bg-info" style="width: 18rem;">
            <div class="card-body text-light">
                <h6 class="card-subtitle mb-2">Total Harga Jual</h6>
                <h5 class="card-title">Rp <?php echo $totalHargaJual ?></h5>
            </div>
        </div>
        <div class="card pt-3 bg-warning" style="width: 18rem;">
            <div class="card-body text-light">
                <h6 class="card-subtitle mb-2">Total Harga Beli</h6>
                <h5 class="card-title">Rp <?php echo $totalHargaBeli ?></h5>
            </div>
        </div>
        <div class="card pt-3 bg-danger" style="width: 18rem;">
            <div class="card-body text-light">
                <h6 class="card-subtitle mb-2">Laba Rugi</h6>
                <h5 class="card-title">Rp <?php echo $totalLabaRugi ?></h5>
            </div>
        </div>
        </div>
        <h3>List Barang</h3>
        <table class="table mt-3" align="center">
				<tr style="">
					<th>ID Barang</th>
					<th>Nama Barang</th>
					<th>Keterangan</th>
				</tr>
				<?php
					if (!is_null($barangList) && count($barangList) > 0) {
						foreach($barangList as $index => $item) {            
							?>
							<tr>
								<td>
									<?php echo $item["id_barang"]; ?>
								</td>
								<td>
									<?php echo $item["nama_barang"]; ?>
								</td>
								<td>
									<?php echo $item["keterangan"]; ?>
								</td>
							</tr>
				<?php
						}
					}else{
						?>
							<tr>
								<td colspan="6">Data Kosong.</td>
							</tr>
				<?php
					}
					
					?>
			</table>
        
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/f65023b3df.js" crossorigin="anonymous"></script>
</body>
</html>