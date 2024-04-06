<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styling.css">
    <title>Document</title>
</head>
<body>
    <h1>HANGMAN GAME!!!!</h1><br>
    <img src="Resources/hang1.jpg" id="img"><br>
    <?php
    $words = [];
    $
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
    $wordlength = strlen($word) -2;

    echo "<h2>Length: ". $wordlength. "</h2>";
    ?>
    
    <input type="text" maxlength="1" id="Lettera" onkeydown="return /[a-z]/i.test(event.key)"><br><br>
    <input type="text" id="Parola" onkeydown="return /[a-z]/i.test(event.key)"><br><br>
    <button>Confirm</button>
</body>
</html>