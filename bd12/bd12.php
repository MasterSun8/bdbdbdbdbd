<form>
Nazwa: <input type="text" name="name">
<br>
Hasło: <input type="text" name="password">
<input type="submit" value="submit">
</form>

<?php

    if(!isset($_GET["name"])){
        exit(0);
    }
    $host = "localhost";
    $user = $_GET["name"];  
    $password = $_GET["password"];
    $db_name = "importowanie";
      
    $conn = mysqli_init();

    mysqli_real_connect($conn,$host, $user, $password, $db_name);
    mysqli_options($conn, MYSQLI_OPT_LOCAL_INFILE, true);

    $file = fopen("osoby.txt", "r") or die("Unable to open file!");

    $drop = "DROP TABLE `osoby`";

    $q = "CREATE TABLE IF NOT EXISTS `osoby`(
            pesel varchar(255),
            nazwisko varchar(255),
            imie varchar(255),
            miasto varchar(255),
            czas1 time,
            czas2 time,
            czas3 time
        )";

    $query = 'LOAD DATA LOCAL INFILE "osoby.txt" INTO TABLE `osoby` CHARACTER SET utf8 COLUMNS TERMINATED BY ";" IGNORE 1 LINES';

    $tf = $conn->query($drop);

    $r = $conn->query($q);

    $re = $conn->query($query);

    $szczecin = 'SELECT COUNT(`pesel`) FROM `osoby` WHERE `osoby`.`miasto`="Szczecin";';
    
    $result = $conn->query($szczecin);

    while($row = $result->fetch_assoc()) {
        print_r($row);
    }
    echo "<br>";

    $winner = "Select nazwisko, imie, Case When czas1 < czas2 And czas1 < czas3 Then czas1 When czas2 < czas3 Then czas2 Else czas3 End As czas From `osoby` ORDER BY czas LIMIT  1;";

    $result = $conn->query($winner);

    while($row = $result->fetch_assoc()) {
        echo "<br>";
        print_r($row);
    }
    echo "<br>";

    $avg = 'Select nazwisko, imie, (czas1+czas2+czas3)/3 As srednia From `osoby`;';

    $result = $conn->query($avg);

    while($row = $result->fetch_assoc()) {
        echo "<br>";
        print_r($row);
    }
    echo "<br>";

    $sredn = 'Select nazwisko, imie, AVG(czas1), AVG(czas2), AVG(czas3) From `osoby`;';

    $result = $conn->query($sredn);

    while($row = $result->fetch_assoc()) {
        echo "<br>";
        print_r($row);
    }
?>