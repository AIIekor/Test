<?php

require_once('DbConnection.php');

class ModelRegister extends Model{

    private $db;

    public function __construct() {
        $this->db = new DbConnection();
    }
    
    public function createUser($username, $email, $password, $cpassword, $usertype) {
        if($password === $cpassword){
            $sql = "INSERT INTO users (username, email, password, user_type) VALUES (?, ?, ?, ?)";
            $params = [$username, $email, $password, $usertype];
            $this->db->query($sql, $params);
        }else{
            return 'Пароли не совпадают';
        }
    } 
}

?>