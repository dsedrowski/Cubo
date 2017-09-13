<?php

class MySQL {
	protected $user;
	protected $pass;
	protected $host;
	protected $dbname;
	protected $dbh;
	protected $result;

	public $error;
	public $queries;

	public function __construct($user, $pass, $host, $dbname){
		$this->user = $user;
		$this->pass = $pass;
		$this->host = $host;
		$this->dbname = $dbname;
	}

	protected function connect(){
		$this->dbh = mysql_connect($this->host, $this->user, $this->pass);
        //$this->dbh = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        //if ($this->dbh->connect_errno) {
        //    printf("B³¹d po³¹czenia: %s\n", $this->dbh->connect_error);
        //    exit();
        //}

		mysql_query('SET CHARACTER SET utf8;', $this->dbh);
		mysql_query('SET NAMES utf8;', $this->dbh);

        if (!is_resource($this->dbh)){
            //obs³uga b³êdów
        }

        if (!mysql_select_db($this->dbname, $this->dbh)){
            //obs³uga b³êdów
        }

		$this->queries = 0;
	}

	public function sql_query($query){
		if (!$this->dbh) {
			$this->connect();
		}

		$ret = mysql_query($query, $this->dbh);

        //$ret = $this->dbh->query($query);

		$this->queries++;

		if (!$ret) return FALSE;
		else if (is_resource($ret)) {
			$this->result = $ret;
			return $ret;
		}
		else return FALSE;
	}

	public function last_id(){
        return mysql_insert_id();
        //return $this->dbh->insert_id;
	}

	public function fetch_row(){
		return mysql_fetch_row($this->result);
        //return $this->result->fetch_row();
	}

	public function num_rows(){
		return mysql_num_rows($this->result);
        //return $this->result->num_rows;
	}

	public function fetch_all_row(){
		$retval = array();

		while ($row = $this->fetch_assoc()){
			$retval[] = $row;
		}

		return $retval;
	}

	public function fetch_assoc(){
		return mysql_fetch_assoc($this->result);
        //return $this->result->fetch_assoc();
	}

	public function affected_rows(){
		return mysql_affected_rows($this->result);
        //return $this->dbh->affected_rows;
	}

	public function fetch_all_assoc(){
		$retval = array();

		while ($row = $this->fetch_assoc()){
			$retval[] = $row;
		}

		return $retval;
	}
}

?>