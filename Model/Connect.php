<?php

abstract class Connect {
   // private $db = 'NULL';

    public function __construct() {
    }

    protected function connection() {
        $env = parse_ini_file('.env');
        $user = $env["ADMIN_USERNAME"];
        $host = $env["ADMIN_HOST"];
        $dbname = $env["ADMIN_DB"];
        //echo $user;
        $database = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, '');
        return $database;
    }
  }

?>