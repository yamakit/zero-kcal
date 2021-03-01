
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
$sql_list = array();

  //consoleにエラーを出さないために値を返す
  $sql = "SELECT * FROM `food_names`";
  $stmt = ($pdo->prepare($sql));
  $stmt->execute();

  $sql_list = $stmt->fetchAll();

  header('Content-type: application/json');
  echo json_encode($sql_list,JSON_UNESCAPED_UNICODE);
?>

<?php
            $sql = "SELECT * FROM `food_names`";
            $age_data = $pdo->query($sql);
            while( $data = $age_data->FETCH_ASSOC()){ ?>
                <option value="<?=$data['id']?>"><?=$data['food_name']?></option>
            <?php } ?>

            $.ajax({
        type: "GET",
        url: "pref.json",
        dataType: "json",
        cache: false,
        success: function(PrefData) {
            // select の内容削除
            $("#SelectPref").empty();
            var append = '<option value=""></option>&#10;';
            // JSON データを option に展開生成
            for(var i = 0; i < PrefData.length; i++) {
                append += '<option value="' + PrefData[i].id + '" >';
                append += PrefData[i].name;
                append += '</option>';
                append += '&#10;';
            }
/*          forループを以下の様にしてもOK
            $.each(PrefData, function(i) {
                append += '";
                append += PrefData[i].name;
                append += '';
                append += '&#10;";
            });
*/
            // select の内容に設定
            $("#SelectPref").append(append);
        }
    });
    return false;
}