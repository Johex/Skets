<div>
    <table style="width:50%">
        <tr>
            <th>Name</th>
            <th>Score</th>
        </tr>
        <tr>
            <td>Matisse</td>
            <td>14</td>
        </tr>
        <tr>
            <td>Roman</td>
            <td>10</td>
        </tr>
    </table>
</div>

<?php
$string = file_get_contents("score.json");
$json_a=json_decode($string,true);

foreach ($json_a as $key => $value){
    echo  $key . ':' . $value . "<br>";
}
?>
<?php
?>

