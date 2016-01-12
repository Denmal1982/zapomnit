<?php
/**
 * Created by PhpStorm.
 * User: Den4ik
 * Date: 26.12.2015
 * Time: 10:40
 */
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

        $date0 = new \DateTime();
        $d = explode("-",$date);

        $date0->setDate($d[0],$d[1]+1,1);

        $wDay = $date0->format("w");
        $nDay = $date0->format("t");

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