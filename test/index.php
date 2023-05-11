<?php

ini_set('display_errors', 1);
require_once 'application/bootstrap.php';


/*try {
    $db = new PDO('mysql:host=localhost;dbname=shop_db, root,root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Ошибка подключения к базе данных: ' . $e->getMessage());
}

$ModelLogin = new ModelLogin($db);
$Controller_Login = new Controller_Login($ModelLogin);*/


require_once 'Database.php';
require_once 'models/login.php';
require_once 'controllers/controller_login.php';

$db = new Database('localhost', 'root', '', 'shop_db');
$userModel = new UserModel($db);
$Controller_Login = new Controller_Login($userModel);

$Controller_Login->login();