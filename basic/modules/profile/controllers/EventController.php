<?php

namespace app\modules\profile\controllers;


class EventController extends \yii\web\Controller
{


    public function actionIndex($year = null)
    {
        return $this->render('index');
    }


    public function actionCalendar($month, $year)
    {

        $date = new \DateTime();
        $date->setDate($year,$month,1);

        $wDay = $date->format("w");
        $nDay = $date->format("t");

        $html = "
        <table class='calendar'>
        <!--
            <thead class='cal-head'>
                <tr>
                    <td colspan='7' align='center'><h2>". $date->format('m')-1 ."</h2></td>
                </tr>
            </thead>
           -->
            <tbody class=''>
                <tr id='week-day'>
                    <td>ВС</td>
                    <td>ПН</td>
                    <td>ВТ</td>
                    <td>СР</td>
                    <td>ЧТ</td>
                    <td>ПТ</td>
                    <td>СБ</td>

                 </tr>";
        $html .= "<tr>";
        $column = 0;

        for($i=0; $i < $wDay; $i++){
            $html .="<td style='background: none'></td>";
            $column++;
        }

        for($i=1; $i<$nDay; $i++){
            $column++;
            $html .="<td>".$i."</td>";

            if ($column == 7) {
                $html .="</tr><tr>";
                $column = 0;
            }

        }



        $html .="</tr></tbody></table>";


        echo $html;

    }

    public function actionMonth($date){

        return $this->renderAjax('month',[
            'date'=>$date
        ]);

    }

    public function actionYear($date)
    {

        return $this->renderAjax('year',[
            'date'=>$date
        ]);
    }

    public function  actionDay($date){

        return $this->renderAjax('day',[
            'date'=>$date
        ]);
    }

}

