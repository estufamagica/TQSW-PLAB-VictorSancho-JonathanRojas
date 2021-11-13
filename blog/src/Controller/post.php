<?php
namespace App\Controller;

use App\Model\DataBase;
use App\Model\Post\Create;
use App\Model\Post\Select;
use App\Model\Post\Post;
use LogicException;

$db = DataBase::getInstance()->connection();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try {

        $post = new Post($subject, $message, $_SESSION['email']);
        $create = new Create($db);
        if($create->create($post)) {
            require __DIR__ . '/../Resources/homepage.php';
        } else {
            echo "Not created this post, verify your inputs";
            require_once __DIR__ . '/../View/post.php';
        }
        return;
    }catch (LogicException $logicException) {
        echo "Credeneciales incorrectos:  " . $logicException->getMessage();
        require_once __DIR__ . '/../View/post.php';
        return;
    }
}
require_once __DIR__ . '/../View/post.php';

