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
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>

<body>
    <button type=“button” onclick="location.href='result.html'">これにする</button>
    <script>
        function view(){
            console.log(<?php echo $age_data?>)
        }
        setInterval('view()', 3000);
    </script>
    <form method='POST' action="/result.php">
        <select name="food_name" id="food_name" class="test">
            <option selected disabled>未選択</option>
            <?php
            $sql = "SELECT * FROM `food_names`";
            $age_data = $pdo->query($sql);
            while( $data = $age_data->FETCH_ASSOC()){ ?>
                <option value="<?=$data['id']?>"><?=$data['food_name']?></option>
            <?php } ?>
        </select>
        <input type="submit" value='これにする'/>
    </form>

    <!-- タイトルをかく -->
    <!-- プルダウンを作る -->
</body>

</html>