<?php
$food_name = $_POST['SelectPref'];
include('function.php');
session_start();
$pdo = dbConnect();

$sql = "SELECT * FROM `food_names` WHERE id = $food_name";
$stmt = $pdo->query($sql); //挿入する値は空のまま、SQL実行の準備をする
$product = $stmt->fetch(PDO::FETCH_ASSOC);
$name = $product['food_name'];

$sql2 = "SELECT `food_description` FROM `food_descriptions` ORDER BY rand() LIMIT 1";
$stmt2 = $pdo->query($sql2); //挿入する値は空のまま、SQL実行の準備をする
$products = $stmt2->fetch(PDO::FETCH_ASSOC);
$reason = $products['food_description'];

$pdo = null;
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
    <h1>
        <?php echo $name?>は<br>
        <?php echo $reason?><br>
        カロリーがゼロです！
    </h1>
    <button type=“button” onclick="location.href='play.html'">もう一度プレイする</button>
    <button type=“button” onclick="location.href='index.html'">ホームに戻る</button>
</body>