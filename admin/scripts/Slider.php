<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/admin/config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/admin/scripts/MySQL.php');

class Slider {
	protected $sql;

	public function __construct(){
		$this->sql = new MySQL(SQL_LOGIN, SQL_PASS, SQL_HOST, SQL_DB);
	}

	public function Count(){
		$query = "SELECT * FROM `sliders`";

		$this->sql->sql_query($query);

		return $this->sql->num_rows();
	}

	public function FList(){
		$query = "SELECT * FROM `sliders` ORDER BY `OrderNo`";

		$this->sql->sql_query($query);

		return $this->sql->fetch_all_assoc();
	}

	public function GetSlide($id){
		$query = "SELECT * FROM `sliders` WHERE ID = {$id}";

		$this->sql->sql_query($query);

		return $this->sql->fetch_assoc();
	}

	public function Create($img_name, $title, $url, $order){
		$query = "INSERT INTO `sliders` (`Title`, `URL`, `Image`, `OrderNo`) VALUES ('{$title}','{$url}','{$img_name}', {$order})";

		return $this->sql->sql_query($query);
	}

	public function Edit($id, $title, $url, $order){
		$query = "UPDATE `sliders` SET `Title` = '{$title}', `URL` = '{$url}', `OrderNo` = {$order} WHERE ID = {$id}";

		$this->sql->sql_query($query);

		return $query;
	}

	public function Delete($id){
		$query = "DELETE FROM `sliders` WHERE ID = {$id}";

		return $this->sql->sql_query($query);
	}

}


?>