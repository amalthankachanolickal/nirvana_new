<?php

class Database {

    private $host;
    private $user;
    private $pass;
    private $db;
    private $dbname;

    function __construct($host='localhost', $user='innovzzy_Ncoln', $pass='Adminadmin!@123456', $dbname='innovzzy__NCoIn') {
        $this->host = $host;
        $this->pass = $pass;
        $this->user = $user;
        $this->dbname = $dbname;
    }

    function connect() {
        $this->db = mysqli_connect($this->host, $this->user, $this->pass);
        if ($this->db) {
            if (mysqli_select_db($this->db, $this->dbname)) {
                return $this->db;
            } else {
                throw new ErrorException("Database can not be connected !");
            }
        } else {
            throw new ErrorException("Can not connect to server");
        }
    }
    
}

?>