<head>
    <title>Kacper Dorożalski</title>
    <link rel="stylesheet" href="stolice.css">
  <link rel="icon" type="image/x-icon" href="flagi/polska.png">
</head>
<body>
    <div class="baner"></div>
    <div class="tresc">
        <iframe class="tresc" name="tresc" src="wyswietl.php?panstwo=<?php echo $_GET['panstwo'];?>">
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
                    echo "<a target=\"tresc\" href=\"wyswietl.php?panstwo=".$row["panstwo"]."\"><li>".$row["panstwo"]."</li></a>";
                }
            ?>
        <ul>
    </div>
    <footer class="stopka">Stronę wykonał: Kacper Dorożalski</footer>
</body>