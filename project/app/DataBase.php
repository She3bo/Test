<?php

class DataBase
{
    private $con;
    public function __construct()
    {
        // $server = "mysql:host=mysql;dbname=test";
        // $user = "dev";
        // $pass = "dev";
        // $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
        // try{
        //     $con = new PDO($server, $user,$pass,$options);
        //     $this->con = $con;
        //     echo "successfully";
        //   }
        //   catch (PDOException $e){
        //     echo "There is some problem in connection: " . $e->getMessage();
        //   }
    }
    private function connection(){
        $server = "mysql:host=mysql;dbname=test";
        $user = "dev";
        $pass = "dev";
        $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
        try{
            $con = new PDO($server, $user,$pass,$options);
            $this->con = $con;
            echo "successfully";
          }
          catch (PDOException $e){
            echo "There is some problem in connection: " . $e->getMessage();
          }
    }

    public function  db_create($qury)
    {
        $this->connection();
        $this->con->query($qury);
    }

    public function db_insert($table_name,$data)
    {
        $columns = $this->getColumn($data);
        $values = $this->getValues($data);

        $qury = "INSERT INTO $table_name ($columns) VALUES ($values)";
        // var_dump($qury);
        $this->con->query($qury);

    }
    public function db_update($table_name,$row,$data)
    {
        $columns = $this->getColumn($data);
        $values = $this->getValues($data);

        $qury = "UPDATE $table_name SET  ($columns) VALUES ($values)";
        // var_dump($qury);
        return $this->con->exec($qury);
    }
    public function db_delete($table_name,$row_id)
    {
        $query = " DELETE FROM `$table_name` WHERE $row_id ";
        // var_dump($query);
        $this->con->query($query);
    }
    public function db_select($table_name,$row_id)
    {
        $qury = "SELECT FROM $table_name WHERE `$row_id`";
        $this->con->query($qury);
    }
    public function db_selectAll($table_name)
    {
        $qury = "SELECT * FROM $table_name";
        $this->con->query($qury);
    }
    
    private function getColumn($data)
    {
        $columns = implode(", ",array_keys($data));
        return $columns;
    }
    private function getValues($data)
    {
        $values  = "'".implode("',' ", array_values($data))."'";
        return $values;
    }
}