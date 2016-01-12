<?php

use DateTime;


$date = new \DateTime();


$date->setDate(2015,11,1);

$wDay = $date->format("w");
$nDay = $date->format("t");


?>

<table class='calendar'>
    <tbody>
    <tr id='week-day'>
        <td>ВС</td>
        <td>ПН</td>
        <td>ВТ</td>
        <td>СР</td>
        <td>ЧТ</td>
        <td>ПТ</td>
        <td>СБ</td>

    </tr>
    <tr>
        <?php
        $column = 0;

        for($i=0; $i < $wDay; $i++){
            echo "<td style='background: none'></td>";
            $column++;
        }

        for($i=1; $i<$nDay; $i++){
            $column++;
            echo "<td class='select-day' id='d".$i."'>".$i."</td>";

            if ($column == 7) {
                echo "</tr><tr>";
                $column = 0;
            }

        }
        ?>
    </tr>
    </tbody>
</table>
