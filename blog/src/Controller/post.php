<?php
namespace App\Controller;

use App\Model\DataBase;
use App\Model\Post\Create;
use App\Model\Post\Post;

$db = DataBase::getInstance()->connection();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try {
        $post = new Post($subject, $message, $_SESSION['email']);
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

