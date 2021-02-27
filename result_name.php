<?php 
session_start();
$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$_SESSION['name'] = $name;

$db = parse_url($_SERVER['CLEARDB_DATABASE_URL']);
$db['dbname'] = ltrim($db['path'], '/');
$dsn = "mysql:host={$db['host']};dbname={$db['dbname']};charset=utf8";

try {
    $db = new PDO($dsn, $db['user'], $db['pass']);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM `food_names`';
    $prepare = $db->prepare($sql);
    $prepare->execute();

    $prepare->execute();
    $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
    print_r(h($result));
} catch (PDOException $e) {
    echo 'Error: ' . h($e->getMessage());
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>

<body>
    <h1>登録が完了しました</h1>
    <button type=“button” onclick="location.href='insert.html'">もう一度入力する</button>
    <button type=“button” onclick="location.href='index.html'">ホームに戻る</button>
</body>

</html>