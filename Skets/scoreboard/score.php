<table>
    <tr>
        <th>Name</th>
        <th>Score</th>
    </tr>
    <?php
    $string = file_get_contents("score.json");
    $json_a = json_decode($string,true);
    arsort($json_a);

    foreach ($json_a as $key => $value){
        echo "<tr>
                    <td>$key</td>
                    <td>$value</td>
              </tr>";
    }
    ?>
</table>




