<?php
require 'connect.php';

$one = "SELECT title
FROM arcticles
WHERE id_a = 1;";
$r_one = $Link->query($one);
$row_one = $r_one->fetch_assoc();

$two = "SELECT title
FROM arcticles
WHERE id_a = 2;";
$r_two = $Link->query($two);
$row_two = $r_two->fetch_assoc();

$three = "SELECT title
FROM arcticles
WHERE id_a = 3;";
$r_three = $Link->query($three);
$row_three = $r_three->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class="header">
        <nav>
            <ul>
                <li><a href="index.php">Главная</a></li>
                <li><a href="index.php">Сборки</a></li>
                <li><a href="index.php">Лор</a></li>
                <li><a href="index.php">Форум</a></li>
            </ul>
        </nav>

        <div class="ava">
            <a href="lk.php">
                <img src="images.jpg" alt="Личный кабинет" title="Личный кабинет" />
            </a>
        </div>
    </div>

    <div class="content">
        <img class="b_pic" src="im.png" alt="Красивые картинки" />

        <div class="latest_ch">
            <a href=".php">
                <img src="ava.jpeg" />
            </a>
            <a href=".php">
                <img src="ava.jpeg" />
            </a>
            <a href=.php">
                <img src="ava.jpeg" />
            </a>
        </div>


        <div class="articles">
            <a href=""> <?php echo $row_one['title']; ?> </a><br>
            <a href=""> <?php echo $row_two['title']; ?> </a><br>
            <a href=""> <?php echo $row_three['title']; ?> </a>

        </div>
    </div>
    <div class="forum">

    </div>

</body>

</html>