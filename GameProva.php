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
    /*function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
    */
    session_start();

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



    echo "<h2>Round: ". $_SESSION["round"] . "</h2>";
    $Fine=false;
    $words = [];
    $splitted = [];
    $word;
    $wordlength;
    $index = 0;
    $randword;
    $filename = "Paniere.txt";
    $handler = fopen($filename,"r") or die("unable to open file!");
    while (!feof($handler)) {
        $words[$index] = fgets($handler); 
        $index++;
    }
    fclose($handler);
    $randword = rand(0, count($words) -1);
    $word = $words[$randword];
    $splitted=str_split($word); // semplicemente pick
    
    $wordlength = strlen($word) -2;
    $_SESSION["Lunghezza"] = $wordlength;
    echo "<h3>Length: ". $_SESSION["Lunghezza"]. "</h3>"; // lunghezza parola
    print_r ($splitted);
    print_r ($_SESSION["wordA"]);
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $Lettera = $_POST["Lettera"];
            for ($j = 0; $j < $wordlength; $j++) //controllo
            {
                if($splitted[$j] = $Lettera)
                {
                    echo $Lettera;
                }
                else 
                {
                    $_SESSION["Immagine"]++;
                }
            }
        }
    /*for ($i = 0; $i < $_SESSION["Quantity"]; $i++) // Partita
{
        
       
        while ($Fine) //round
    {
        for ($k = 0; $k = 1; $k++) // turno
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
            $Lettera = $_POST["Lettera"];
            $k++;
            echo "<h2> palle </h2>";
            for ($j = 0; $j < $wordlength; $j++) //controllo
            {
                if($splitted[$j] = $Lettera)
                {
                    echo $Lettera;
                }
                else 
                {
                    $imageNumber++;
                }
            }   
            }
        }
        $Fine = true;
    }
}*/


    ?>
    <img src="<?php echo $_SESSION["Immagine"]; ?>.jpg"><br>
    <form action="Game.php" method="post">
    <input type="text" maxlength="1" id="Lettera" onkeydown="return /[a-z]/i.test(event.key)" ><br><br>
    <input type="text" id="Letter" onkeydown="return /[a-z]/i.test(event.key)" ><br><br>
    <input type="submit" value="Conferma">
</body>
</html>