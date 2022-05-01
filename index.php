<?php
    echo "<table border = '1'>";
    $data = (include_once("./data.php"));

    foreach ($data as $key => $group) {
        echo "<tr><td colspan='2'>" . $key . "</td></tr>";
        foreach ($group as $person) {
            echo "<tr><td>" . $person["name"] . "</td>";
            echo "<td>" . $person["mail"] . "</td></tr>";
        }
    }
    echo '</table>';
?>