<?php 
	class Pelanggan {
		private $IdPelanggan;
		private $NamaPelanggan;
		private $Alamat;

		private $conn;

		public function __construct(\PDO $database) {
			$this->conn = $database;
		}

		function setIdPelanggan($IdPelanggan) {
			$this->IdPelanggan = $IdPelanggan;
		}

		function setNamaPelanggan($NamaPelanggan) {
			$this->NamaPelanggan = $NamaPelanggan;
		}

		function setAlamat($Alamat) {
			$this->Alamat = $Alamat;
		}

		// function getIdPelanggan() {
		// 	return $IdPelanggan;
		// }

		// function getNamaPelanggan() {
		// 	return $NamaPelanggan;
		// }

		// function getAlamat() {
		// 	return $Alamat;
		// }

		// function getNoTelp() {
		// 	return $NoTelp;
		// }

		function addPelanggan() {
			try {
				$query = "INSERT INTO Pelanggan(`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`) VALUES (?, ?, ?)";
				$prepareDB = $this->conn->prepare($query);
				$sqlAddPelanggan = $prepareDB->execute([$this->IdPelanggan, $this->NamaPelanggan, $this->Alamat]);
	
				return $sqlAddPelanggan;
			} catch (Exception $e) {
				throw $e;
			}
		}

		function pelangganList() {
			try {
				$query = "SELECT * FROM pelanggan ORDER BY id_pelanggan ASC";
				$prepareDB = $this->conn->prepare($query);
				$prepareDB->execute();
				$pelangganList = $prepareDB->fetchAll();
	
				return $pelangganList;
			} catch (Exception $e) {
				throw $e;
			}
		}

		function findPelangganById($id) {
			try {
				$query = "SELECT * FROM pelanggan WHERE id_pelanggan = ?";
				$prepareDB = $this->conn->prepare($query);
				$prepareDB->execute([$id]);
				$findPelangganById = $prepareDB->fetchAll();
	
				return $findPelangganById[0];
			} catch (Exception $e) {
				throw $e;
			}
		}

		function updatePelanggan() {
			try {
				$query = "UPDATE pelanggan SET nama_pelanggan = ?, alamat_pelanggan = ? WHERE id_pelanggan = ?";
				$prepareDB = $this->conn->prepare($query);
				$sqlUpdatePelanggan = $prepareDB->execute([$this->NamaPelanggan, $this->Alamat, $this->IdPelanggan]);
	
				return $sqlUpdatePelanggan;
			} catch (Exception $e) {
				throw $e;
			}
		}

		function deletePelanggan($id) {
			try {
				$query = "DELETE FROM pelanggan WHERE id_pelanggan = ?";
				$prepareDB = $this->conn->prepare($query);
				$sqlDeletePelanggan = $prepareDB->execute([$id]);
	
				return $sqlDeletePelanggan;
			} catch (Exception $e) {
				throw $e;
			}
		}	
        

	}
?>