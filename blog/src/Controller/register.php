<?php

namespace App\Controller;

use App\Model\DataBase;
use App\Model\User\Register;
use App\Model\User\User;
use LogicException;

$db = DataBase::getInstance()->connection();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordVerify = $_POST['passwordVerify'];
    $username = $_POST['username'];

    try {
        $user = new User($email, $password);
        $register = new Register($db);
        if($register->register($user, $username, $passwordVerify)) {
            echo "<span>Correct register - Now Log In</span>";
            require __DIR__ . '/../Resources/homepage.php';
            return;
        } else {
            echo "Username not valid or passwords not matching or your profile already exists";
            require_once __DIR__ . '/../View/register.php';
            return;
        }
    }catch (LogicException $logicException) {
        echo "Credeneciales incorrectos:  " . $logicException->getMessage();
        require_once __DIR__ . '/../View/register.php';
        return;
    }
}
require_once __DIR__ . '/../View/register.php';

