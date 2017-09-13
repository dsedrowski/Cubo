<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/admin/config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/admin/scripts/MySQL.php');

class User {
	protected $sql;

	public function __construct(){
		$this->sql = new MySQL(SQL_LOGIN, SQL_PASS, SQL_HOST, SQL_DB);
	}

    public function Login($login, $password){
        $query = "SELECT ID FROM uzytkownicy WHERE `Login` = '{$login}' AND `Haslo` = '{$password}' LIMIT 1";

        $this->sql->sql_query($query);

        $result = $this->sql->fetch_all_assoc();

        if (empty($result[0]['ID'])) return false;
        else return $result[0]['ID'];
    }

    public function CheckPassword($id, $password){
        $query = "SELECT ID FROM uzytkownicy WHERE `ID` = '{$id}' AND `Haslo` = '{$password}' LIMIT 1";

        $this->sql->sql_query($query);

        $result = $this->sql->fetch_all_assoc();

        if (empty($result[0]['ID'])) return false;
        else return true;
    }

    public function ChangePassword($id, $password){
        $query = "UPDATE uzytkownicy SET `Haslo` = '{$password}' WHERE `ID` = '{$id}'";

        $this->sql->sql_query($query);

        return $query;
    }
}
?>