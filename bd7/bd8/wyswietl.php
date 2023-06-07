<head>
    <link rel="stylesheet" href="wyswietl.css">
</head>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "stolice";   

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT `stolica`, `ludnosc`, `powierzchnia`, `domena` FROM `panstwa` JOIN `stolice` ON `stolice`.`id_panstwa` = `panstwa`.`id` WHERE `panstwo`=\"".$_GET['panstwo']."\";";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    echo "<div>Państwo: ".$_GET['panstwo'];
    echo "</div><img class=\"image\" src=\"flagi/".$_GET['panstwo'].".png\">";
    echo "<div>Stolica: ".$row["stolica"];
    echo "</div><div>Powierzchnia: ".$row["powierzchnia"];
    echo "</div><div>Ludność: ".$row["ludnosc"];
    echo "</div><div>Domena: ".$row["domena"]."</div>";
?>