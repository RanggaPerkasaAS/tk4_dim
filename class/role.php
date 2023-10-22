<?php 

 class Roles {

 // Membuat object

 private $IdRole;

 private $NamaRole;

 private $DescRole;



 private $conn;



 // Daftar Function untuk memanggil koneksi database dan tablenya

 public function __construct(\PDO $database) {

 $this->conn = $database;

 }



 function setIdRole($IdRole) {

 $this->IdRole = $IdRole;

 }



 function setNamaRole($NamaRole) {

 $this->NamaRole = $NamaRole;

 }



 function setDescRole($DescRole) {

 $this->DescRole = $DescRole;

 }



 function getIdRole() {

 return $IdRole;

 }



 function getNamaRole() {

 return $NamaRole;

 }



 function getDescRole() {

 return $DescRole;

 }



 function getNoTelp() {

 return $NoTelp;

 }



 // Function Create Role baru

 function CreateRole() {

 try {

 $query = "INSERT INTO roles(`IdRole`, `NamaRole`, `DescRole`) VALUES (?, ?, ?)";

 $prepareDB = $this->conn->prepare($query);

 $sqlCreateRole = $prepareDB->execute([$this->IdRole, $this->NamaRole, $this->DescRole]);

 

 return $sqlCreateRole;

 } catch (Exception $e) {

 throw $e;

 }

 }



 // Function Menampilkan Role

 function DaftarRole() {

 try {

 $query = "SELECT * FROM roles ORDER BY IdRole ASC";

 $prepareDB = $this->conn->prepare($query);

 $prepareDB->execute();

 $DaftarRole = $prepareDB->fetchAll();

 

 return $DaftarRole;

 } catch (Exception $e) {

 throw $e;

 }

 }



 // Function Cari Role

 function CariRole($id) {

 try {

 $query = "SELECT * FROM roles WHERE IdRole = ?";

 $prepareDB = $this->conn->prepare($query);

 $prepareDB->execute([$id]);

 $CariRole = $prepareDB->fetchAll();

 

 return $CariRole[0];

 } catch (Exception $e) {

 throw $e;

 }

 }



 // Function Update Role

 function UpdateRole() {

 try {

 $query = "UPDATE roles SET NamaRole = ?, DescRole = ? WHERE IdRole = ?";

 $prepareDB = $this->conn->prepare($query);

 $sqlUpdateRole = $prepareDB->execute([$this->NamaRole, $this->DescRole, $this->IdRole]);

 

 return $sqlUpdateRole;

 } catch (Exception $e) {

 throw $e;

 }

 }





 // Function Delete Role

 function DeleteRole($id) {

 try {

 $query = "DELETE FROM roles WHERE IdRole = ?";

 $prepareDB = $this->conn->prepare($query);

 $sqlDeleteRole = $prepareDB->execute([$id]);

 

 return $sqlDeleteRole;

 } catch (Exception $e) {

 throw $e;

 }

 } 

 



 }

?>
