/*

$(document).ready(function(){

        $(".cal-head").click(function(){
            $(".show").removeClass("show").addClass("hide");
            var tb = $(this).next('tbody')

            tb.addClass("show");

        })



    $(".year-list li").click(function(){
        var id = $(this).children("a").attr("id");
        var year = $("#active").text().trim();
        if(id=="back"){
            hideYear();
            var yearD = parseInt(year) - 1
            $("#year-val").text(yearD);
            showYear(yearD);
        } else if(id=="forward"){
            hideYear();
            var yearU = parseInt(year) + 1
            $("#year-val").text(yearU);
            showYear(yearU);
        }

    })
    /*


    $.ajax({
        url: "index.php?r=profile/event/calendar",
        success: function(data){
            $(".tbl").html(data)
        }
    })
*/
/*
})


function hideYear(){
    $("#year-wrapper").animate(
        {
            height:'0px'
        },
        300
    );
    $(".month-mini").animate({
        height:'0px'
    }, 300)
}

function showYear(year){
    $.get(
        "index.php?r=profile%2Fevent/get-year&year=" + year,
        function(html){
            $("#year-wrapper")
                .html(html)
                .animate(
                {
                    height:'500px'
                },
                300
            );
            $(".month-mini").animate({
                height:'110px'
            }, 300);

            $("a.month").click(function(){
                var id = $(this).attr("id");
                var month = $(this).attr("id").replace("m","");
                $(this).replaceWith("<div class='m_active' id='"+id+"'></div>");
                //$(this).addClass("m_active").removeClass("month");
                showMonth();
                var year = $("#year-val").text();

                $.get(
                    "index.php?r=profile%2Fevent/calendar&year="+year+"&month=" + month,
                    function(html){
                        $(".m_active").html(html);
                    }
                );


            })
        });
}

function showMonth(){
    $(".m_active .month-mini").animate({
        height:'500px',
        width: '100%'
    },300);
    $(".month").animate({
        height:'0px',
        width: '0px'
    },100);
}








/*
function calendar(dateStr){
    var d = new Date();
    var da = dateStr.split("-");

    d.setMonth(da[0]-1);
    d.setFullYear(da[1]);


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

    console.log(d.getDay())
    console.log(d.getFullYear())
    console.log(months[d.getMonth()])
    var countMonthDays = [31, 28, 31, 30, 31, 30, 31, 31, 30,31, 30, 31];
    var year = d.getYear();
    var nDays = countMonthDays[d.getMonth()];

    if (((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0)){
        monthDays[1] = 29;
    }

    document.write("<table class='calendar'>");

    document.write("<thead class='cal-head'><tr><td colspan='7' align='center'><h2>"+months[d.getMonth()] +" " + d.getFullYear() + "</h2></td></tr></thead>");

    document.write("<tbody class='hide'><tr id='week-day'><td>ПН</td><td>ВТ</td><td>СР</td><td>ЧТ</td><td>ПТ</td><td>СБ</td><td>ВС</td></tr>");

    var column = 0;

    document.write("<tr>");

    for (i = 0; i < d.getDay(); i++) {
        document.write('<td style="background: none">');
        column++;
    }
    for(n=0; n<=nDays; n++){
        document.write("<td>");
        document.write(n);
        column++;
        if (column == 7) {
            document.write("<tr>");
            column = 0;
        }
    }

    document.write("</tbody></table>");

}

*/



