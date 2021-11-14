<?php

namespace App\Controller;

use App\Model\DataBase;
use App\Model\User\Login;
use App\Model\User\User;
use LogicException;

$db = DataBase::getInstance()->connection();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $user = new User($email, $password);
        $login = new Login($db);
        if($login->login($user)) {
            $_SESSION['email'] = $user->getEmail();
            echo("<script>location.href = '/index.php?=';</script>");
        } else {
            echo "Not logged";
            require_once __DIR__ . '/../View/login.php';
        }

    }catch (LogicException $logicException) {
        echo "Credeneciales incorrectos:  " . $logicException->getMessage();
        require_once __DIR__ . '/../View/login.php';

    }
    return;
}
require_once __DIR__ . '/../View/login.php';
