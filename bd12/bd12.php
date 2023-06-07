<form>
Nazwa: <input type="text" name="name" value="<?php if(isset($_GET["name"])) echo $_GET["name"];?>">
<br>
Hasło: <input type="text" name="password">
<input type="submit" value="submit">
</form>

<?php
    function write($result){
        echo mysqli_error();
        while($row = mysqli_fetch_array($result)) {
            write($row);
        }
    }

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

    write($conn->query($szczecin));
    echo "<br>";

    $winner = 'Select nazwisko, imie, Case When czas1 < czas2 And czas1 < czas3 Then czas1 When czas2 < czas3 Then czas2 Else czas3 End As Mini From `osoby` ORDER BY Mini LIMIT  1;';

    write($conn->query($winner));
    echo "<br>";

    $avg = 'Select nazwisko, imie, (czas1+czas2+czas3)/3 As srednia From `osoby`;';

    write($conn->query($avg));
    echo "<br>";
    
    $sredn = 'Select nazwisko, imie, AVG(czas1), AVG(czas2), AVG(czas3) From `osoby`;';

    write($conn->query($sredn));
    echo "<br>";


    echo $winner;
    echo "<br>";
    echo $avg;
    echo "<br>";
    echo $sredn;
    echo "<br>";
    echo $szczecin;
    echo "<br>";
?>