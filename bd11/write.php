<script>
<?php
$name = $_POST["name"];
$content = $_POST["content"];

if(file_exists($name)){
    $file = fopen($name, 'a');
    fputs($file, $content);
    fclose($file);
}
?>
</script>