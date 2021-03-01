<?php
include('function.php');
session_start();
$pdo = dbConnect();

$sql = "SELECT * FROM `food_names`";
$age_data = $pdo->query($sql); //挿入する値は空のまま、SQL実行の準備をする

$age_data = "";

foreach($age_data as $age_data_val){
    $age_data .= "<option value='". $age_data_val['id'];
    $age_data .= "'>". $age_data_val['food_name']. "</option>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>

<body>
<script>
    window.onload = function (){
        drawChart()
    }
        drawChart();
         function drawChart() {
            $.ajax({
                url: './play2.php',
                type: 'POST',
                data: { y: 100 }
                success: function(PrefData) {
                console.log(PrefData);
                // select の内容削除
                $("#SelectPref").empty();
                var append = '<option value=""></option>&#10;';
                // JSON データを option に展開生成
                for(var i = 0; i < PrefData.length; i++) {
                    append += '<option value="' + PrefData[i].id + '" >';
                    append += PrefData[i].food_name;
                    append += '</option>';
                    append += '&#10;';
                }
                // select の内容に設定
                $("#SelectPref").append(append);
            }
        });
        }
    </script>
    <!-- <button type=“button” onclick="location.href='result.html'">これにする</button> -->
    <form method='POST' action="/result.php">
        <select name="SelectRpef" id ="food_name">
            <option value=""></option>      
        </select>
    </form>

   
    <!-- <label for="aaa">プルダウン A : </label>
           <input type="submit" value="これにする"/>
    <select name="a" id ="aaa">
        <option selected disabled>未選択</option> -->
    <!-- <form method='POST' action="/result.php">
        <select name="food_name" id="food_name" class="test">
            <option selected disabled>未選択</option>
            //ここにplay2.phpからphpをいれる
        </select>
        <input type="submit" value='これにする'/>
    </form> -->

    <!-- タイトルをかく -->
    <!-- プルダウンを作る -->
</body>

</html>