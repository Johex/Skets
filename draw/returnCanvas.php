<?php
$canvasFile = fopen('data/canvasURL.txt', 'r');
echo fread($canvasFile, filesize('data/canvasURl.txt'));