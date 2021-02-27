<?php
 $db = parse_url($_SERVER['CLEARDB_DATABASE_URL']);
 $db['dbname'] = ltrim($db['path'], '/');
 $dsn = "mysql:host={$db['host']};dbname={$db['dbname']};charset=utf8";
 $user = $db['user'];
 $password = $db['pass'];
 $options = array(
   PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
   PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
   PDO::MYSQL_ATTR_USE_BUFFERED_QUERY =>true,
 );
 $pdo = new PDO($dsn,$user,$password,$options);
  //1.POSTデータの取得
  $name = $_POST['y'];
  //2.DB接続 
  //3.データ登録SQLの作成
  $sql = "INSERT INTO `y_coordinate`(`datetime`, `y_coordinate`) VALUES (NOW(), $name)";
  $sql = "INSERT INTO `food_descriptions`(`food_description`) VALUES ('穴が空いているのでカロリーがゼロです！')";

  $stmt = $pdo->query($sql);

  //consoleにエラーを出さないために値を返す
  $sql2 = "SELECT `id`, `datetime`, `y_coordinate` FROM `y_coordinate` WHERE 1";
  $stmt2 = ($db->prepare($sql2));
  $stmt2->execute(array($id));

  $sql_list = array();

  while($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
    $sql_list[] = array(
        'id' => $row['id'],
        'datetime' => $row['datetime'],
        'y_coordinate' => $row['y_coordinate']
    );
  }

  header('Content-type: application/json');
  echo json_encode($sql_list,JSON_UNESCAPED_UNICODE);
  
  $mysqli->close();
  

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
    <!-- タイトルをつけてボタンを見た目整える -->
    <input type=button onclick="location.href='result_name.html'" value=Upload>
    
</body>

</html>