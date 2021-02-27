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
  $age_data = $pdo->query($sql);
    // // ②テーブルのデータをoptionタグに整形
    // foreach($age_data as $age_data_val){
    //     $age_data .= "<option value='". $age_data_val['age_val'];
    //     $age_data .= "'>". $age_data_val['age_data']. "</option>";
    // }
//   $sql_list = $stmt->fetchAll();

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
    <button type=“button” onclick="location.href='result.html'">これにする</button>
    <form method='POST' action="/result.php">
        <select name="food_name" id="food_name">
            <?php
            echo $age_data;
            ?>
        </select>
        <input type="submit" value='送信' />
    </form>

    <!-- タイトルをかく -->
    <!-- プルダウンを作る -->
</body>

</html>