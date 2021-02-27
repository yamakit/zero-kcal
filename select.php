
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

  //consoleにエラーを出さないために値を返す
  $sql = "SELECT `food_name` FROM `food_names`";
  $stmt = ($pdo->prepare($sql));
  $stmt->execute();

  $sql_list = $stmt->fetchAll();

  header('Content-type: application/json');
  echo json_encode($sql_list,JSON_UNESCAPED_UNICODE);
?>

