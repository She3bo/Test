<?php
// include_once 'DataBase.php';

class Message extends DataBase
{
    private $table = 'messages';

    public function __construct()
    {
        $query = "CREATE TABLE IF NOT EXISTS `messages`(`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,`text` text NOT NULL,`user_id` INT UNSIGNED NOT NULL, `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,PRIMARY KEY(`id`),CONSTRAINT FK_UserMessage FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE )"; 
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