<?php 
session_start();
$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$_SESSION['name'] = $name;

// $db = parse_url($_SERVER['CLEARDB_DATABASE_URL']);
//  $db['dbname'] = ltrim($db['path'], '/');
//  $dsn = "mysql:host={$db['host']};dbname={$db['dbname']};charset=utf8";
//  $user = $db['user'];
//  $password = $db['pass'];
//  $options = array(
//    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//    PDO::MYSQL_ATTR_USE_BUFFERED_QUERY =>true,
//  );
//  $pdo = new PDO($dsn,$user,$password,$options);

//   //3.データ登録SQLの作成
//   $sql = "INSERT INTO `food_names`(`food_name`) VALUES ('チーズ')";
//   $stmt = $pdo->query($sql);
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>入力確認ページ</title>
</head>

<body>
    <form action="result_name.php" method="post">
        <h1>入力内容：<?php echo $name?></h1>
        <input id ="send" type="submit" value = "登録">
    </form>   
    <button type=“button” onclick="location.href='insert_name.php'">ホームに戻る</button>

</body>

</html>