<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/admin/config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/admin/scripts/MySQL.php');

class Oferta {
	protected $sql;

	public function __construct(){
		$this->sql = new MySQL(SQL_LOGIN, SQL_PASS, SQL_HOST, SQL_DB);
	}
	#region Oferta Kategorie

	public function Count_Cat(){
		$query = "SELECT * FROM `oferta_kategorie`";

		$this->sql->sql_query($query);

		return $this->sql->num_rows();
	}

	public function List_Cat(){
		$query = "SELECT * FROM `oferta_kategorie` ORDER BY `OrderNo`";

		$this->sql->sql_query($query);

		return $this->sql->fetch_all_assoc();
	}

	public function Get_Cat($id){
		$query = "SELECT * FROM `oferta_kategorie` WHERE ID = {$id}";

		$this->sql->sql_query($query);

		return $this->sql->fetch_assoc();
	}

	public function Create_Cat($img_name, $title, $description, $short_description, $order){
        $short_description = strip_tags($short_description);

		$query = "INSERT INTO `oferta_kategorie` (`Title`, `Description`, `ShortDescription`, `Image`, `OrderNo`) VALUES ('{$title}','{$description}','{$short_description}','{$img_name}',{$order})";

		return $this->sql->sql_query($query);
	}

	public function Edit_Cat($id, $title, $description, $short_description, $order){
		$query = "UPDATE `oferta_kategorie` SET `Title` = '{$title}', `Description` = '{$description}', `ShortDescription` = '{$short_description}', `OrderNo` = {$order} WHERE ID = {$id}";

		$this->sql->sql_query($query);

		return $query;
	}

	public function Delete_Cat($id){
		$query = "DELETE FROM `oferta_kategorie` WHERE ID = {$id}";

		return $this->sql->sql_query($query);
	}

	#endregion

	#region Oferta Zdjêcia

	public function Count_Photo(){
		$query = "SELECT * FROM `oferta_zdjecia`";

		$this->sql->sql_query($query);

		return $this->sql->num_rows();
	}

	public function Count_Photo_For_Cat($id){
		$query = "SELECT * FROM `oferta_zdjecia` WHERE `KategoriaID` = {$id}";

		$this->sql->sql_query($query);

		return $this->sql->num_rows();
	}

	public function List_Photo($id){
		$query = "SELECT * FROM `oferta_zdjecia` WHERE `KategoriaID` = {$id} ORDER BY `OrderNo`";

		$this->sql->sql_query($query);

		return $this->sql->fetch_all_assoc();
	}

	public function Get_Photo($id){
		$query = "SELECT * FROM `oferta_zdjecia` WHERE ID = {$id}";

		$this->sql->sql_query($query);

		return $this->sql->fetch_assoc();
	}

	public function Create_Photo($category_id, $img_name, $order){
		$query = "INSERT INTO `oferta_zdjecia` (`KategoriaID`, `Image`, `OrderNo`) VALUES ('{$category_id}', '{$img_name}', {$order})";

		return $this->sql->sql_query($query);
	}

	public function Edit_Photo($id, $order){
		$query = "UPDATE `oferta_zdjecia` SET `OrderNo` = {$order} WHERE ID = {$id}";

		$this->sql->sql_query($query);

		return $query;
	}

	public function Delete_Photo($id){
		$query = "DELETE FROM `oferta_zdjecia` WHERE `ID` = {$id}";

		return $this->sql->sql_query($query);
	}

	public function Delete_Photos_For_Cat($id){
		$query = "DELETE FROM `oferta_zdjecia` WHERE `KategoriaID` = {$id}";

		return $this->sql->sql_query($query);
	}
	#endregion
}


?>