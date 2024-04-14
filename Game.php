<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styling.css">
    <title>Document</title>
</head>
<body>
    <h1>HANGMAN GAME!!!!</h1>
    <?php
    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }

    session_start();
    $Lettera ;
    $x =1;
    $filename ="Settings.txt";
    $handler = fopen($filename,"r") or die("unable to open file!");
    while (!feof($handler)) {
        if ($x == 1)
        {
            $_SESSION["Quantity"] = fgets($handler);
            $x++;
        }
        else 
        {
            $_SESSION["Players"] = fgets($handler);
        }
    }
    fclose($handler);
    //variabili sessione
    $_SESSION["round"] = 1;
    $_SESSION["Punti"] = $Punti= [];
    $_SESSION["Immagine"] = 1;
    $_SESSION["incorso"] = false;

    echo "<h2>Round: ". $_SESSION["round"] . "</h2>";
    $Fine=false;
    $words = [];
    $index = 0;

    
    if ($_SESSION["incorso"] == false)
    {// semplicemente pick

        $filename = "Paniere.txt";
        $handler = fopen($filename,"r") or die("unable to open file!");
        while (!feof($handler)) {
            $words[$index] = fgets($handler); 
            $index++;
        }
        fclose($handler);
    $_SESSION["Random"] = rand(0, count($words) -1);
    $_SESSION["Parola"] = $words[$_SESSION["Random"]];
    $_SESSION["Lunghezza"] = strlen($_SESSION["Parola"] )-2;
    $_SESSION["wordS"] = str_split($_SESSION["Parola"]) ;
    $_SESSION["incorso"] = true ;
    }
    else 
    {
        debug_to_console("ti trovi nel else");
    }

    echo "<h3>Length: ". $_SESSION["Lunghezza"]. "</h3>"; // lunghezza parola
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $Lettera = $_POST["Lettera"];
            for ($j = 0; $j < $_SESSION["Lunghezza"]; $j++) //controllo
            {
                if($_SESSION["wordS[$j]"] = $Lettera)
                {
                    
                }
                else 
                {
                    $_SESSION["Immagine"]++;
                }
            }
        }
    ?>
    <img src="<?php echo $_SESSION["Immagine"]; ?>.jpg"><br>
    <form action="Game.php" method="post">
    <input type="text" maxlength="1" id="Lettera" name="Lettera" onkeydown="return /[a-z]/i.test(event.key)" ><br><br>
    <!--<input type="text" id="Letter" onkeydown="return /[a-z]/i.test(event.key)" ><br><br> -->
    <input type="submit" value="Conferma">
</body>
</html>