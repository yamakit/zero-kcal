<?php
include('function.php');
session_start();
$pdo = dbConnect();

$sql = "SELECT `food_name` FROM `food_names`";
if ($age_data = $pdo->query($sql)) {
 
    // ②テーブルのデータをoptionタグに整形
    foreach($age_data as $age_data_val){
        $age_data .= "<option value='". $age_data_val['age_val'];
        $age_data .= "'>". $age_data_val['age_data']. "</option>";
    }
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
    <button type=“button” onclick="location.href='result.html'">これにする</button>
    <form method='POST' action="/result.php">
        <select name="food_name" id="food_name">
            <?php
            echo $age_data;
            ?>
        </select>
        <input type="submit" value='これにする'/>
    </form>

    <!-- タイトルをかく -->
    <!-- プルダウンを作る -->
</body>

</html>