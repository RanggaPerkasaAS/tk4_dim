<?php 
	class Pembelian {
		private $IdPembelian;
		private $JumlahPembelian;
		private $HargaBeli;
        private $IdPengguna;
        private $IdBarang;
        private $IdSupplier;

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

		function setIdPengguna($IdPengguna) {
			$this->IdPengguna = $IdPengguna;
		}

        
		function setIdBarang($IdBarang) {
			$this->IdBarang = $IdBarang;
		}

		function setIdSupplier($IdSupplier) {
			$this->IdSupplier = $IdSupplier;
		}
		
		
		// function getIdPembelian() {
		// 	return $IdPembelian;
		// }

		// function getJumlahPembelian() {
		// 	return $JumlahPembelian;
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

		function totalHargaBeli() {
			try {
				$conn = mysqli_connect("localhost", "root", "", "tk4");
				$query = "SELECT SUM(harga_beli * jumlah_pembelian) as total_harga_beli FROM pembelian";
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);

				return $row['total_harga_beli'];

				mysqli_close($conn);

			} catch (Exception $e) {
				throw $e;
			}
					
		  }

	}
?>