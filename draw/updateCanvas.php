<?php
echo $_POST['dataURL'];

$canvasFile = fopen('data/canvasURL.txt', 'w');
fwrite($canvasFile, $_POST['dataURL']);
fclose($canvasFile)
?>