<?php 
	class LabaRugi {
		private $IdPenjualan;
		private $JumlahPenjualan;
		private $HargaJual;
		private $IdPembelian;
		private $JumlahPembelian;
		private $HargaBeli;
        private $IdPengguna;
        private $IdBarang;
        private $IdSupplier;
        private $IdPelanggan;

		private $conn;

		public function __construct(\PDO $database) {
			$this->conn = $database;
		}

        function setIdPembelian($IdPembelian) {
			$this->IdPembelian = $IdPembelian;
		}

        
		function setJumlahPembelian($JumlahPembelian) {
			$this->JumlahPembelian = $JumlahPembelian;
		}

        
		function setHargaBeli($HargaBeli) {
			$this->HargaBeli = $HargaBeli;
		}

        function setIdPenjualan($IdPenjualan) {
			$this->IdPenjualan = $IdPenjualan;
		}

        
		function setJumlahPenjualan($JumlahPenjualan) {
			$this->JumlahPenjualan = $JumlahPenjualan;
		}

        
		function setHargaJual($HargaJual) {
			$this->HargaJual = $HargaJual;
		}

		function setIdPengguna($IdPengguna) {
			$this->IdPengguna = $IdPengguna;
		}

        
		function setIdBarang($IdBarang) {
			$this->IdBarang = $IdBarang;
		}

		function setIdSupplier($IdSupplier) {
			$this->IdSupplier = $IdSupplier;
		}

        function setIdPelanggan($IdPelanggan) {
			$this->IdPelanggan = $IdPelanggan;
		}
				
		// function getIdPembelian() {
		// 	return $IdPembelian;
		// }

		// function getJumlahPembelian() {
		// 	return $JumlahPembelian;
		// }

        // function getIdPenjualan() {
		// 	return $IdPenjualan;
		// }

		// function getJumlahPenjualan() {
		// 	return $JumlahPenjualan;
		// }

		// function getHargaJual() {
		// 	return $HargaJual;
		// }

		// function getHargaBeli() {
		// 	return $HargaBeli;
		// }

        // function getIdPengguna() {
		// 	return $IdPengguna;
		// }

        // function getIdBarang() {
		// 	return $IdBarang;
		// }

        // function getIdSupplier() {
		// 	return $IdSupplier;
		// }

        // function getIdPelanggan() {
		// 	return $IdPelanggan;
		// }

		function totalHargaBeli() {
			try {
				$conn = mysqli_connect("localhost", "root", "", "tk4");
				$query = "SELECT SUM(HargaBeli * JumlahPembelian) as total_harga_beli FROM pembelian";
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);

				return $row['total_harga_beli'];

				mysqli_close($conn);

			} catch (Exception $e) {
				throw $e;
			}
					
		  }

          function totalHargaJual() {
			try {
				$conn = mysqli_connect("localhost", "root", "", "tk4");
				$query = "SELECT SUM(HargaJual * JumlahPenjualan) as total_harga_jual FROM penjualan";
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);

				return $row['total_harga_jual'];

				mysqli_close($conn);

			} catch (Exception $e) {
				throw $e;
			}
					
		  }

          function totalLabaRugi() {
            try {
				$conn = mysqli_connect("localhost", "root", "", "tk4");
				$query = "SELECT (SUM(penjualan.harga_jual * penjualan.jumlah_penjualan) - SUM(pembelian.harga_beli * pembelian.jumlah_pembelian)) AS laba_rugi
                FROM penjualan, pembelian;";
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);

				return $row['laba_rugi'];

				mysqli_close($conn);

			} catch (Exception $e) {
				throw $e;
			}
          }

	}
?>