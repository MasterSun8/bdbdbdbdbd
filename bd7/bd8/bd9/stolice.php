<head>
    <title>Kacper Dorożalski</title>
    <?php
        if($_GET["light"]){
            echo '<link rel="stylesheet" href="stolice_ciemny.css">';
        }else{
            echo '<link rel="stylesheet" href="stolice_jasny.css">';
        }
    ?>
    <link rel="icon" type="image/x-icon" href="flagi/polska.png">
</head>
<body>
    <div class="baner">
        <a href="?light=0" class="light"></a>
        <a href="?light=1" class="dark"></a>
    </div>
    <div class="tresc">
        <iframe class="tresc" name="tresc" src="wyswietl.php?panstwo=polska<?php echo "&light=".$_GET["light"]?>">
        </iframe>
    </div>
    <div class="menu">
        <ul>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "stolice";   
            
                $conn = new mysqli($servername, $username, $password, $dbname);
            
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
            
                $sql = "SELECT `panstwo` FROM `panstwa`;";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                    echo "<a target=\"tresc\" href=\"wyswietl.php?panstwo=".$row["panstwo"]."&light=".$_GET["light"]."\"><li>".$row["panstwo"]."</li></a>";
                }
            ?>
        <ul>
    </div>
    <footer class="stopka">Stronę wykonał: Kacper Dorożalski</footer>
</body>