<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styling.css">
    <title>Document</title>
</head>
<body>
    <h1>HANGMAN GAME </h1>
    <?php
    // funzione per il consol.log . da cancellare
    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
    function GG()
    {
        $_SESSION["round"]++;
                    $_SESSION["incorso"] = false;
                    $_SESSION["Immagine"] = 1;
                    $_SESSION["Punti"][$_SESSION["giocatore"]]--;
                    debug_to_console("sei nel prossimo round");
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

    
    echo "<h2>Round: ". $_SESSION["round"] . "</h2>";
    $Fine=false;  
    $words = [];
    $index = 0;
    $Trovato = false;
    
    if ($_SESSION["incorso"] == false)
    {

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
    $_SESSION["Parola"] = trim($_SESSION["Parola"]);
    $_SESSION["wordS"] = str_split($_SESSION["Parola"]) ;
    $_SESSION["ParolaGiocatori"] =[];
    $_SESSION["LettereSbagliate"] = ""; 
    $_SESSION["incorso"] = true ;
    $_SESSION["Immagine"]--;
    debug_to_console ("stai nella generazione della parola");
    }
    else 
    {
    }
    echo $_SESSION["Parola"];
    echo "<h3>Length: ". $_SESSION["Lunghezza"]. "</h3>"; // lunghezza parola
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $Lettera = $_POST["Lettera"];
            if (strlen($Lettera) > 1)
            {
                if ( $Lettera == $_SESSION["Parola"])
                {
                    $_SESSION["incorso"] = false;
                    $_SESSION["round"]++;
                    $_SESSION["Punti"][$_SESSION["giocatore"]] ++;
                }
                else 
                {
                    $_SESSION["Punti"][$_SESSION["giocatore"]]--;
                    $_SESSION["Immagine"]++;
                    $_SESSION["LettereSbagliate"] = $_SESSION["LettereSbagliate"] . $Lettera . "  " ; // Fatal error: Uncaught TypeError: Unsupported operand types: string + string in C:\xampp\htdocs\Lavoro_Gruppo_PHP-main\Game.php:97 Stack trace: #0 {main} thrown in C:\xampp\htdocs\Lavoro_Gruppo_PHP-main\Game.php on line 97
                }
            }
            else
            {
            for ($j = 0; $j < $_SESSION["Lunghezza"]; $j++) //controllo
            {
                if($_SESSION["wordS"][$j] === $Lettera) // Problema
                {

                    debug_to_console("ti trovi nel if della lettera");
                   $Trovato  = true;
                   $_SESSION["ParolaGiocatori"][$j] = $_SESSION["wordS"][$j];
                   $_SESSION["Giuste"]++;
                }
                else 
                {
                    debug_to_console("ti trovi nel else della lettera");
                }
            }
            if ($Trovato == true)
            {
                 debug_to_console("stai nel if di trovato  ");
            }
            else
            {
                $_SESSION["LettereSbagliate"] =$_SESSION["LettereSbagliate"] . $Lettera . "  " ; // Fatal error: Uncaught TypeError: Unsupported operand types: string + string in C:\xampp\htdocs\Lavoro_Gruppo_PHP-main\Game.php:97 Stack trace: #0 {main} thrown in C:\xampp\htdocs\Lavoro_Gruppo_PHP-main\Game.php on line 97
                $_SESSION["Immagine"]++;
            }
            }  

            if($_SESSION["giocatore"] == $_SESSION["Players"] - 1 )
            {
                $_SESSION["giocatore"] = 0 ;
            }
            else
            {
                $_SESSION["giocatore"]++;
            }
            // fine
            if ($_SESSION["Giuste"] == $_SESSION["Lunghezza"])
            {
                $_SESSION["incorso"] = false;
                $_SESSION["round"]++;
                $_SESSION["Punti"][$_SESSION["giocatore"]] ++;
            }

        }
        if ( $_SESSION["Immagine"] == 8)
                    {
                    GG();
                    }
        if ( $_SESSION["round"] == $_SESSION["Quantity"] + 1) // ti porta ai risultati 
                    {
                    header('Location: FinalResults.php');
                    }


                    debug_to_console($_SESSION["giocatore"]);
        echo "<h3>Parola : </h3>";
        for ($i =0;$i < $_SESSION ["Lunghezza"] ; $i++) // funziona da dio
        {
            error_reporting(E_ERROR | E_PARSE);
            echo $i + 1 . ")";
            echo $_SESSION["ParolaGiocatori"][$i];
            error_reporting(E_ERROR | E_PARSE);
        }
        echo "<h3>Sbagliate : ". $_SESSION["LettereSbagliate"] . "</h3>"; 
        print_r($_SESSION["Punti"]);
    ?>
    <img src="<?php echo $_SESSION["Immagine"]; ?>.jpg"><br>
    <form action="Game.php" method="post">
    <input type="text" id="Lettera" name="Lettera" onkeydown="return /[a-z]/i.test(event.key)" ><br><br>
    <!--<input type="text" id="ParolaF" name="ParolaF" onkeydown="return /[a-z]/i.test(event.key)" ><br><br> -->
    <input type="submit" value="Conferma">
</body>
</html>