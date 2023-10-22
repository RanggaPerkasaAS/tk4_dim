<?php
    class Barang {
        private $id_barang;
		private $nama_barang;
		private $keterangan;

		private $conn;

        public function __construct(\PDO $database) {
			$this->conn = $database;
		}

		function setIdBarang($id_barang) {
			$this->id_barang = $id_barang;
		}

		function setNamaBarang($nama_barang) {
			$this->nama_barang = $nama_barang;
		}

		function setKeterangan($keterangan) {
			$this->keterangan = $keterangan;
		}

		// function getIdBarang() {
		// 	return $id_barang;
		// }

		// function getNamaBarang() {
		// 	return $nama_barang;
		// }

		// function getKeterangan() {
		// 	return $keterangan;
		// }

        function barangList() {
			try {
				$query = "SELECT * FROM barang ORDER BY id_barang ASC";
				$prepareDB = $this->conn->prepare($query);
				$prepareDB->execute();
				$barangList = $prepareDB->fetchAll();
	
				return $barangList;
			} catch (Exception $e) {
				throw $e;
			}
		}

    }


?>