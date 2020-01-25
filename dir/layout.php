<!doctype html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="style.css?v=1">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
</head>
<body>
<header><?php include 'header.php'; ?></header>
<main>
    <h2><?= $articleTitle ?></h2>
    <?php
     echo $article;
    ?>
</main>
<footer><?php include 'footer.php'; ?></footer>
</body>
</html>