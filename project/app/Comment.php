<?php
// include_once 'DataBase.php';

class Comment extends DataBase
{
    private $table = 'comments';

    public function __construct()
    {
        $query = "CREATE TABLE IF NOT EXISTS `comments`( `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, `text` text NOT NULL, `user_id` INT UNSIGNED NOT NULL, `message_id` INT UNSIGNED NOT NULL, `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, PRIMARY KEY(`id`), CONSTRAINT FK_UserComment FOREIGN KEY (user_id) REFERENCES users(id), CONSTRAINT FK_MessageComment FOREIGN KEY (message_id) REFERENCES messages(id) ON DELETE CASCADE )"; 
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