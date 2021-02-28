<?php
$food_name = $_POST['food_name'];
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style.css">
    <title>
        カロリーゼロ！
    </title>
</head>

<body>
    <!-- phpを使ってdbから値を取得する -->
    <h1>
        <?php echo $food_name?>は
        {reason}なので
        カロリーがゼロです
    </h1>
    <button type=“button” onclick="location.href='play.html'">もう一度プレイする</button>
    <button type=“button” onclick="location.href='index.html'">ホームに戻る</button>
</body>