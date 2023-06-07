<script>
<?php
$name = $_POST["name"];
$target = $_POST["target"];

if(file_exists($name) && !file_exists($target)){
    rename($name, $target);
}
?>
</script>