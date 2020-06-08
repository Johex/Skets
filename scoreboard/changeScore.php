<?php
// Function to change score
$userToChange = $_GET['user'];
$scoreToAdd = $_GET['score'];
$jsonString = file_get_contents('score.json');
$jsonData = json_decode($jsonString, true);
$jsonData[$userToChange] += $scoreToAdd;
echo $jsonData[$userToChange];

$newJson = json_encode($jsonData);
file_put_contents('score.json', $newJson);
