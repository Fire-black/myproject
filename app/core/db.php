<?php

class db
{
    private $credinternals = [
        'dbhost' => 'localhost',
        'dbname' => 'myproject',
        'dbuser' => 'root',
        'dbpass' => ''
    ];

    public  $conn;

    public function __construct(){


        $this->conn = mysqli_connect(
            $this->credinternals['dbhost'],
            $this->credinternals['dbuser'],
            $this->credinternals['dbpass'],
            $this->credinternals['dbname']
        );

        if(!$this->conn) die('DB connect error!');

    }

    public function query($q){
        $data = mysqli_query($this->conn, $q);
        if(!$data) {
            die('Ошибка базы данных: ' . mysqli_error($this->conn));
        }


        if(is_bool($data)) {
            return $data;
        } else {
            $ret = [];
            while($d = $data->fetch_assoc()){
                $ret[] = $d;
            }
            return $ret;
        }

    }

    public function escape($str){
        return "'" . mysqli_real_escape_string($this->conn, $str) . "'";
    }

}