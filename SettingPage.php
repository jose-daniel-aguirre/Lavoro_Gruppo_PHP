<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styling.css">
    <title>Document</title>
</head>
<body>
    <?php
    $Round = 1;
    $Player = 2;
    $filename = "Settings.txt";
    $handler = fopen($filename,"r+") or die("unable to open file!");
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $Round = $_POST["quantity"];
        $Player = $_POST["player"];
        fwrite($handler,$Round."\n");
        fwrite($handler,$Player);
    }
    fclose($handler);
    ?>
    <h1>SETTINGS!!!</h1><br><br>
    <form action="SettingPage.php" method="post">
    <label for="quantity">Round Quantity: </label>
    <input type="number" id="quantity" name="quantity" min="1"><br><br>
    <label for="player">Player Numbers: </label>
    <input type="number" id="player" name="player" min="2" max="4"><br><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>