<!doctype html>
<html lang="en">
<head>
    <?php include_once __DIR__ . '/partials/head.php'?>
</head>
<body>
<header>
<?php include_once __DIR__ . '/partials/nav.php' ?>
</header>
<div class="row">
   <?php foreach ($posts as $post): ?>
    <div class="card">
        <div class="card-body">
            <h6 class="card-subtitle"><?php echo $post['userEmail']?></h6>
            <h5 class="card-title"><?php echo $post['subject'] ?></h5>
            <p class="card-text"><?php echo $post['message'] ?></p>
        </div>
    </div>
    <?php endforeach;?>

</div>



</body>
</html>