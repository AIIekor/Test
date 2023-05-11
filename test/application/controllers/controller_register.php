 md5(<?php

require_once('D:/OSPanel/domains/test/application/models/register.php');

class Controller_Register extends Controller
{
	private $ModelRegister;

    public function __construct() {
        $this->ModelRegister = new ModelRegister();
    }

	public function action_index()
	{
		if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Получаем данные из $_POST

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password =  md5($_POST['password']);
            $cpassword =  md5($_POST['cpassword']);
            $usertype = $_POST['user_type'];

            // Вызываем метод модели для создания нового пользователя
            $user = $this->userModel->createUser($username, $email, $password, $cpassword, $usertype);

            if($user){
                $this->view->generate('login.php', 'template.php');
            } else{
                $this->view->generate('register.php', 'template.php');
            }
        } else {
        	$this->view->generate('register.php', 'template.php');
            // Отображение формы создания пользователя
            // например: include '../views/user/create.php'
        }
	}
}
