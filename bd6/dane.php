<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <div class="baner">
        <img src="obraz.png"></img>
    </div>
    <div class="menu">
        <div>
            <a href="strona.php">Strona główna</a>
        </div>
        <div>
            <a href="skrypty.php">Skrypty</a>
        </div>
        <div>
            <a href="dane.php">Dane</a>
        </div>
    </div>
    <div class="tresc">
        <?php
            $handle = fopen("dane.txt", "r");
            if ($handle) {
                while($line = fgets($handle)){
                    echo $line."<br>";
                }
            }
        ?>
    </div>
</body>
</html>