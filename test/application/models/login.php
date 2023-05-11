<?php

require_once __DIR__.'/../core/model.php';

class UserModel extends Model{
    public function __construct() {
        parent::__construct();
    }

    public function getUserByUsernameAndPassword() {
        $query = $this->db->query("SELECT * FROM users WHERE email = $email AND password = $password");
        return $quary->fetchall(PDO::FETCH_ASSOC);
    }
}

?>