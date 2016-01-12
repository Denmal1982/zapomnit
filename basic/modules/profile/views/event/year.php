<?php

$months = [
    'янв',
    'фев',
    'мар',
    'апр',
    'май',
    'июн',
    'июл',
    'авг',
    'сен',
    'окт',
    'ноя',
    'дек'
];
?>

<table>
    <?php $i = 1;$m = 0;?>
    <?php foreach($months as $month):?>
        <?php if($i == 1):?>
            <tr>
        <?php endif;?>
        <td id="m<?=$m?>" class="select-month"><?=$month?></td>

        <?php  if($i == 3):?>
            </tr>
            <?php $i = 0;?>
        <?php endif; ?>

        <?php $i++; $m++;?>

    <?php endforeach?>

</table>



