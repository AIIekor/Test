<?php

class Controller_Login extends Controller {
    private $UserModel;

    public function __construct() {
        parent::__construct();
        $this->userModel = new userModel();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $user = $this->userModel->getUserByUsernameAndPassword($email, $password);

            if ($user) {
                // Вход выполнен успешно
                // Перенаправление на другую страницу или выполнение дополнительных действий
                // ...
                echo "Вход выполнен успешно!";
            } else {
                // Неверные данные пользователя
                // Вывод ошибки или перенаправление на страницу входа
                // ...
                echo "Неверные данные пользователя!";
            }
        }
    }
}

?>