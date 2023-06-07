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
                $x = 0;
                $suma = 0;
                $a = 0;
                $b = 0;
                $c = 0;
                $arr = array();
                while($line = fgets($handle)) {
                    if($x==0){
                        $a=$line;
                        $b=$line;
                    }
                    $x += 1;
                    $suma += $line;
                    $s = $suma/$x;
                    if($a>$line){
                        $a=$line;
                    }
                    if($b<$line){
                        $b=$line;
                    }
                    if(array_key_exists($line, $arr)){
                        $arr[$line] += 1;
                    }else{
                        $arr[$line] = 0;
                    }
                }
                $c = array_keys($arr, max($arr))[0];
                echo "liczba = ".$x."<br>";
                echo "suma = ".$suma."<br>";
                echo "średnia = ".$s."<br>";
                echo "min = ".$a."<br>";
                echo "max = ".$b."<br>";
                echo "dominanta = ".$c."<br>";
            }
        ?>
    </div>
</body>
</html>