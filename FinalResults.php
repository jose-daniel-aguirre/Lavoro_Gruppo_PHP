<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> RESULTS!!! </h1><br><br>
    <div class="playerlist">
    <h2> GIOCATORE 1: </h2><br><br>
    <h2> GIOCATORE 2: </h2><br><br>
    <h2> GIOCATORE 3: </h2><br><br>
    <h2> GIOCATORE 4: </h2><br><br></div>
    <?php
    $punti1 = $_SESSION["Punti"][0];
    $punti2 = $_SESSION["Punti"][1];
    $punti3 = $_SESSION["Punti"][2];
    $punti4 = $_SESSION["Punti"][3];
    echo "<h2> $punti1 </h2>", "<h2> $punti2 </h2>", "<h2> $punti3 </h2>", "<h2> $punti4 </h2>";
    ?>
</body>
</html>