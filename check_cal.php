<?php 
session_start();
$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$_SESSION['name'] = $name;
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
    <form action="result_cal.php" method="post">
        <h1>入力内容：<?php echo $name?></h1>
        <input id ="send" type="submit" value = "登録">
    </form>
       
</body>

</html>