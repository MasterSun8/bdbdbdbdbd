<head>
    <title>Kacper Dorożalski</title>
    <link rel="stylesheet" href="def.css">
    <link rel="stylesheet" href="stolice.css">
    <link rel="icon" type="image/x-icon" href="flagi/polska.png">
</head>
<body>
    <script>
        var z = 0
        var f = 1
        function fontSize(x=-1){
            if(x==-1){
            }else{
                f = x
            }
            let r = document.querySelector(':root')
            let i = document.querySelector("iframe").contentWindow.document.querySelector(":root")
            r.style.setProperty('--fontsize', f)
            i.style.setProperty('--fontsize', f)
        }
        function invert(x=-1){
            if(x==-1){
            }else{
                z = x
            }
            let r = document.querySelector(':root')
            let i = document.querySelector("iframe").contentWindow.document.querySelector(":root")
            r.style.setProperty('--invert', z)
            i.style.setProperty('--invert', z)
        }
        function changeLink(){
            fontSize()
            invert()
        }
    </script>
    <div class="baner"></div>
    <div class="tresc">
        <iframe class="tresc" name="tresc" src="wyswietl.php?panstwo=polska" onload="changeLink()">
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
    <footer class="stopka">
        <div>
            <button onclick="invert(0)" class="light"></button>
            <button onclick="invert(1)" class="dark"></button>
        </div>
        <div>Stronę wykonał: Kacper Dorożalski</div>
        <div>
            <button style="font-size: 16px;height: 50px; width: 50px;" onclick="fontSize(1)">A</button>
            <button style="font-size: 24px;height: 75px; width: 75px;" onclick="fontSize(1.5)">A</button>
            <button style="font-size: 32px;height: 100px; width: 100px;" onclick="fontSize(2)">A</button>
        </div>
    </footer>
</body>