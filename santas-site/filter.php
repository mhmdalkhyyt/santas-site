<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1> Filter Page </h1>
    
    <?php
        include 'functions.php';
        include 'connection.php';

        if(isset($_POST['Reindeer'])){
            getMatches($pdo);
        }

        dropDownFilter($pdo);
    ?>

    <a href="./index.php">Home</a>
    
</body>
</html>