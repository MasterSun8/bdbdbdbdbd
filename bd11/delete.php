<script>
<?php
$name = $_POST["name"];

if(file_exists($name)){
    unlink($name);
}else{
    echo "alert('plik nie istnieje, nie ma jak fo usunac')";
}
?>
</script>