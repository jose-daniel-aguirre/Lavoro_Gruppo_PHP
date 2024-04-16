<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styling.css">
    <title>Document</title>
</head>
<body class="game">
<?php
session_start();
$_SESSION["incorso"] = false;
$_SESSION["Immagine"] = 2;
$_SESSION["round"] = 1;
$_SESSION["TurnoG"] = 1;
$_SESSION["giocatore"] = 0;
$_SESSION["Giuste"] = 0;
$_SESSION["Punti"] = [0,0,0,0];
?>
    <div class="zoom">
    <img src="Resources/HangmanTitle.png"><br><br>
    </div>
    <a href="Game.php">
    <button>
    <span class="button_top">Inizia Gioco</span>
    </button><br><br>
    </a>
    <a href="RulePage.php">
    <button>
    <span class="button_top">Regole</span>
    </button><br><br>
    </a>
    <a href="SettingPage.php">
    <button>
    <span class="button_top">Impostazioni</span>
    </button><br>
    </a>
</body>
</html>