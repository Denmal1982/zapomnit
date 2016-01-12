<?php
use yii\widgets\Pjax;
?>

<script>
    var months = [
        'январь',
        'февраль',
        'март',
        'апрель',
        'май',
        'июнь',
        'июль',
        'август',
        'сентябрь',
        'октябрь',
        'ноябрь',
        'декабрь'
    ];
    $(document).ready(function(){


        var d = new Date();

        renderEvent(d.getFullYear()+"-"+d.getMonth()+"-"+d.getDate(), "d");



        function renderEvent(date, act){

            setDate(date);
            if(act == "d"){
                $(".month-wrapper .content").fadeOut(200);
                $(".month-wrapper .navig").fadeOut(200);
                $(".day-wrapper").fadeIn(500);
                $(".day-wrapper .content").fadeOut(200);
                $(".day-wrapper .content").load("event/day?date="+date, function(){
                    $(this).fadeIn(500);
                });
                $(".day-wrapper .navig").fadeIn(500);
            } else if(act == "m") {
                $(".year-wrapper .content").fadeOut(200);
                $(".year-wrapper .navig").fadeOut(200);
                $(".month-wrapper").fadeIn(500);
                $(".month-wrapper .content").fadeIn(200);
                $(".month-wrapper .content").load("event/month?date="+date, function(){
                    $(this).fadeIn(500);
                    selectDate();
                });
                $(".month-wrapper .navig").fadeIn(500);
            } else if(act == "y"){
                $(".month-wrapper").fadeOut(200);
                $(".day-wrapper").fadeOut(200);
                $(".year-wrapper .content").fadeOut(200);
                $(".year-wrapper .navig").fadeIn(500);
                $(".year-wrapper .content").load("event/year?date="+date, function(){
                    $(this).fadeIn(500);
                    selectDate();
                });
            }
        }

        function getDate(){
            var month = window.months.indexOf($("#m").text());
            return $("#y").text() + "-" + month + "-" + $("#d").text();
        }

        function setDate(date){
            var d = date.split("-");
            var month = window.months[d[1]];
            console.log(month);
            $("#y").text(d[0]);
            $("#m").text(month);
            $("#d").text(d[2]);

        }

        function selectDate(){
            $(".select-month").click(function(){
                var m = $(this).attr("id").replace("m","");
                $("#m").text(window.months[m]);
                renderEvent(getDate(), "m");
                console.log(getDate());
            })

            $(".select-day").click(function(){
                var d = $(this).attr("id").replace("d","");
                $("#d").text(d);
                renderEvent(getDate(), "d");
                console.log(getDate());
            })
        }


        $(".navig").click(function(){
            var date;
            var act;
            switch ($(this).attr("id")){
                case "back_d":
                    act = "d";
                    date = dateHandler("- 1 day");
                    break;
                case "forward_d":
                    act = "d";
                    date = dateHandler("+ 1 day");
                    break;
                case "back_m":
                    act = "m";
                    date = dateHandler("- 1 month");
                    break;
                case "forward_m":
                    act = "m";
                    date = dateHandler("+ 1 month");
                    break;
                case "back_y":
                    act = "y";
                    date = dateHandler("- 1 year");
                    break;
                case "forward_y":
                    act = "y";
                    date = dateHandler("+ 1 year");
                    break;
            }
            renderEvent(date,act);

        });

        $(".select").click(function(){
            var p = $(this).attr("id");
            switch (p){
                case "m":
                    $(".day-wrapper").fadeOut(500);
                    renderEvent(getDate(), p);
                    break;

                case  "y":
                    renderEvent(getDate(), p);
                    break;
            }

        });


        function dateHandler(action){
            var res = action.split(" ");
            var a = res[0];
            var v = res[1];
            var p = res[2];

            var day = $("#d").text();
            var year = $("#y").text();
            var month = window.months.indexOf($("#m").text());

            var day0 = day;
            var year0 = year;
            var month0 = month;

            var result = year+"-"+month+"-"+day;

            if(p == "day"){
                if(a == "+"){
                    //если сейчас число меньше возможного
                    if(day < getCountDays(year,month)){
                        day0++;
                    } else {
                    //если число больше возможного
                        day0 =1;
                        if(month<11){

                            month0++;
                        } else {
                            month0=0;
                            year0++;
                        }
                    }
                } else {
                    if(day > 1){
                        day0--;
                    } else {

                        if(month>0){
                            month0--;
                        } else {
                            month0=11;
                            year0--;
                        }
                        day0 =getCountDays(year, month0);
                    }
                }
            }

            if(p=="month"){
                if(a == "+"){
                    //если сейчас число меньше возможного
                        if(month<11){
                            month0++;
                        } else {
                            month0=0;
                            year0++;
                        }

                } else {
                    if(month>0){
                            month0--;
                        } else {
                            month0=11;
                            year0--;
                        }


                }
            }
            if(p=="year"){
                if(a == "+"){
                    year0++;
                } else {
                    year0--;
                }
            }

            $("#d").text(day0);
            $("#y").text(year0);
            $("#m").text(window.months[month0]);

            return year0 + "-" + month0 + "-" + day0;

        }



/*
        $(".select").click(function(){
            var cls = $(this).closest("div").attr("class");
            $("."+cls+" #back, ."+cls+" #forward, ."+cls+" .content").hide();
            $(this).closest("div").next("div").show();
            var year = $("#y").text();
            var month = $("#m").text();

            if(cls=="year-wrapper"){


            }


        })

        $(".navig").click(function(){
            var months = [
                'январь',
                'февраль',
                'март',
                'апрель',
                'май',
                'июнь',
                'июль',
                'август',
                'сентябрь',
                'октябрь',
                'ноябрь',
                'декабрь'
            ];
            var v = parseInt($(this).closest("tr").children("th.select").text());
            var cl = $(this).attr("id");
            var ind = $(this).closest("tr").children("th.select").attr("id");
            if(cl =="back"){
                //если месяц
                if(ind=="m"){
                    if(v > 1){
                        v--;
                    } else {
                        v = 12;
                        $("#y").text(parseInt($("#y").text()) - 1)

                    }
                } else if(ind=="y"){
                    v--;
                    //если число
                } else if(ind=="d"){
                    if(v > 1){
                        v--;
                    } else {
                        if(parseInt($("#m").text()) > 1){
                            $("#m").text(parseInt($("#m").text()) - 1);
                        } else {
                            $("#m").text(12);
                            $("#y").text(parseInt($("#y").text()) - 1)
                        }
                        v = getCountDays(parseInt($("#y").text()),parseInt($("#m").text()));;

                    }
                }
            } else {
                //если месяц
                if(ind=="m"){
                    if(v < 12){
                        v++;
                    } else {
                        v = 1;
                        $("#y").text(parseInt($("#y").text()) + 1)
                    }
                } else if(ind=="y"){
                    v++;
                    //если число
                } else if(ind=="d"){
                    var days =getCountDays(parseInt($("#y").text()),parseInt($("#m").text()));
                    if(v < days){
                        v++;
                    } else {
                        v = 1;
                        if(parseInt($("#m").text()) < 12){

                            $("#m").text(parseInt($("#m").text()) + 1);
                        } else {
                            $("#m").text(1);
                            $("#y").text(parseInt($("#y").text()) + 1)
                        }
                    }
                }


            }
            $(this).closest("tr").children("th.select").text(v)

        })*/
    })

    function calUpdate(year,month){
        $.ajax({
            url: "index.php?r=profile/event/calendar&year="+year+"&month="+month,
            success: function(data){
                $(".month-wrapper .content").html(data).show();
            }
        });
    }


    function getCountDays(year, month){
        var monthDays = [31, 28, 31, 30, 31, 30, 31, 31, 30,31, 30, 31];
        if (((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0)){
            monthDays[1] = 29;
        }
        console.log(year + " - " + month + " " +monthDays[month])
        return monthDays[month];

    }
</script>
<?php Pjax::begin()?>
<div class="event">
    <div class="year-wrapper">
        <table>
            <thead>
            <tr>
                <th class="back"><a href="#" id="back_y" class="navig"><i class="fa fa-chevron-left fa-2x"></i></a></th>
                <th class="select" id="y" data-y="2015"></th>
                <th class="forward"><a href="#" id="forward_y" class="navig"><i class="fa fa-chevron-right fa-2x"></i></a></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td></td>
                <td class="content"><img src="<?=Yii::getAlias('@web')?>/images/wait.gif"></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="month-wrapper">
        <table>
            <thead>
            <tr>
                <th class="back"><a href="#" id="back_m" class="navig"><i class="fa fa-chevron-left fa-2x"></i></a></th>
                <th class="select" id="m" data-m="1"></th>
                <th class="forward"><a href="#" id="forward_m" class="navig"><i class="fa fa-chevron-right fa-2x"></i></a></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td></td>
                <td class="content"><img src="<?=Yii::getAlias('@web')?>/images/wait.gif"></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="day-wrapper">
        <table>
            <thead>
            <tr>
                <th class="back"><a href="#" id="back_d" class="navig"><i class="fa fa-chevron-left fa-2x"></i></a></th>
                <th class="select" id="d"></th>
                <th class="forward"><a href="#" id="forward_d" class="navig"><i class="fa fa-chevron-right fa-2x"></i></a></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td></td>
                <td class="content"><img src="<?=Yii::getAlias('@web')?>/images/wait.gif"></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>


<?php Pjax::end()?>
<!--
<div class="year-frap">
    <ul class="year-list">
        <li>
            <a href="#" id="back"><i class="fa fa-chevron-left fa-3x"></i> </a>
        </li>
        <li id="active">
            <div>
                <div id="year-val"><?=date("Y")?></div>
                <div id="year-wrapper">
                    <script type="application/javascript">
                        showYear(<?=date("Y")?>)
                    </script>
                </div>
            </div>

        </li>
        <li>
            <a href="#" id="forward"><i class="fa fa-chevron-right fa-3x"></i></a>
        </li>
    </ul>
</div>
-->