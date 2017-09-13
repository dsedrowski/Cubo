<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/admin/config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/admin/scripts/MySQL.php');

class Blog {
	protected $sql;

	public function __construct(){
		$this->sql = new MySQL(SQL_LOGIN, SQL_PASS, SQL_HOST, SQL_DB);
	}

	public function Count(){
		$query = "SELECT * FROM `blog`";

		$this->sql->sql_query($query);

		return $this->sql->num_rows();
	}

	public function List_Blog(){
		$query = "SELECT * FROM `blog` ORDER BY `Date`";

		$this->sql->sql_query($query);

		return $this->sql->fetch_all_assoc();
	}

	public function Get($id){
		$query = "SELECT * FROM `blog` WHERE ID = {$id}";

		$this->sql->sql_query($query);

		return $this->sql->fetch_assoc();
	}

	public function Create($img_name, $title, $description){
		$query = "INSERT INTO `blog` (`Title`, `Description`, `Image`, `Date`) VALUES ('{$title}','{$description}','{$img_name}', CURDATE())";

		return $this->sql->sql_query($query);
	}

	public function Edit($id, $title, $description){
		$query = "UPDATE `blog` SET `Title` = '{$title}', `Description` = '{$description}' WHERE ID = {$id}";

		$this->sql->sql_query($query);

		return $query;
	}

	public function Delete($id){
		$query = "DELETE FROM `blog` WHERE ID = {$id}";

		return $this->sql->sql_query($query);
	}
}


?>