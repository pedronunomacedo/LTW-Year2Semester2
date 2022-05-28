<?php
    $num1 = $_GET ['num1'];
    $num2 = $_GET ['num2'];
    $result = $num1 + $num2;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sum of two numbers in PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <p><?=$num1?> + <?=$num2?> = <?=$result?></p>
</body>
</html>