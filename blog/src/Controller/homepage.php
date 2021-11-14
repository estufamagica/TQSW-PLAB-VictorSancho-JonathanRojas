<?php

namespace App\Controller;

use App\Model\DataBase;
use App\Model\Post\Select;

$db = DataBase::getInstance()->connection();
$selectPosts = new Select($db);
$posts = $selectPosts->getPosts();
