<?php
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $sum = $num1 + $num2;
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <title>Sum Result</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <p><?=$num1?> + <?=$num2?> = <?=$sum?></p>
        <a href="form2.html">Do another sum</a>
    </body>
</html>