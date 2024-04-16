<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> RESULTS </h1><br><br>
    <div class="playerlist">
    <?php
    session_start();
    echo "<h2> GIOCATORE 1: " . $_SESSION["Punti"][0] . "</h2>" . "<h2> GIOCATORE 2: " . $_SESSION["Punti"][1] . "</h2>" . "<h2> GIOCATORE 3: " . $_SESSION["Punti"][2]  ."</h2>". "<h2>GIOCATORE 4: ". $_SESSION["Punti"][3] . "</h2>";
    ?>
    </div>
</body>
</html>