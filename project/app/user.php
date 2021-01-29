<?php
include_once 'DataBase.php';
class user extends DataBase
{
    private $table = 'users';

    public function __construct()
    {
        $query = "CREATE TABLE IF NOT EXISTS `users` ( `id` INT UNSIGNED NOT NULL AUTO_INCREMENT , `name` VARCHAR(40) NOT NULL , `email` VARCHAR(40)NOT NULL ,`password` VARCHAR(40)NOT NULL,`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) "; 
        $this->db_create($query);
    }
    public function show($data)
    {
        $this->db_select($this->table,$data);
    }
    public function create($data)
    {
        $this->db_insert($this->table,$data);
    }
    public function update($data)
    {
        $this->db_update($this->table,$data);
    }
    public function delete($data)
    {
        $this->db_delete($this->table,$data);
    }
    
}