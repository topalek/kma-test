'use strict';
$(document).ready(function() {
    floatchart()
    $(window).on('resize', function() {
        floatchart();
    });
    $('#mobile-collapse').on('click', function() {
        setTimeout(function() {
            floatchart();
        }, 700);
    });

    $(".scroll-widget").slimScroll({
        size: "5px",
        height: "290px",
        allowPageScroll: false,
    });
    let cartData = [];
    let chart = $('#sales-analytics')
    let start = chart.data('start')
    let end = chart.data('end')
    let url = `https://api.exchangerate.host/timeseries?start_date=${start}&end_date=${end}&symbols=USD,RUB&base=USD`
    console.log(start,end,url)
    $.get(url,function (resp){
        if (resp.success){
            for (const [key, value] of Object.entries(resp.rates)) {
                cartData.push({
                    "date": key,
                    "value": value.RUB
                })
            }
        }
        console.log(cartData)
    })
    var charts1 = AmCharts.makeChart("sales-analytics", {
        "type": "serial",
        "theme": "light",
        "locale": "ru_RU",
        "marginRight": 15,
        "marginLeft": 40,
        "autoMarginOffset": 20,
        "dataDateFormat": "YYYY-MM-DD",
        "valueAxes": [{
            "id": "v1",
            "axisAlpha": 0,
            "position": "left",
            "ignoreAxisWidth": true
        }],
        "balloon": {
            "borderThickness": 1,
            "shadowAlpha": 0
        },
        "graphs": [{
            "id": "g1",
            "balloon": {
                "drop": true,
                "adjustBorderColor": false,
                "color": "#ffffff",
                "type": "smoothedLine"
            },
            "fillAlphas": 0.3,
            "bullet": "round",
            "bulletBorderAlpha": 1,
            "bulletColor": "#FFFFFF",
            "lineColor": "#4099ff",
            "bulletSize": 5,
            "hideBulletsCount": 50,
            "lineThickness": 3,
            "type": "smoothedLine",
            "title": "red line",
            "useLineColorForBulletBorder": true,
            "valueField": "value",
            "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
        }],
        "chartCursor": {
            "valueLineEnabled": true,
            "valueLineBalloonEnabled": true,
            "cursorAlpha": 0,
            "zoomable": false,
            "valueZoomable": true,
            "valueLineAlpha": 0.5
        },
        "chartScrollbar": {
            "autoGridCount": true,
            "graph": "g1",
            "oppositeAxis": true,
            "scrollbarHeight": 40
        },
        "categoryField": "date",
        "categoryAxis": {
            "parseDates": true,
            "dashLength": 1,
            "minorGridEnabled": true
        },
        "export": {
            "enabled": true
        },
        "dataProvider": cartData
    });
    // sale analyics end
    setTimeout(function() {
        charts1.zoomToIndexes(Math.round(charts1.dataProvider.length * 0.45), Math.round(charts1.dataProvider.length * 0.6));
    }, 800);
});

function floatchart() {
    //flot options
    var options = {
        legend: {
            show: false
        },
        series: {
            label: "",
            curvedLines: {
                active: true,
                nrSplinePoints: 20
            },
        },
        tooltip: {
            show: true,
            content: "x : %x | y : %y"
        },
        grid: {
            hoverable: true,
            borderWidth: 0,
            labelMargin: 0,
            axisMargin: 0,
            minBorderMargin: 0,
        },
        yaxis: {
            min: 0,
            max: 30,
            color: 'transparent',
            font: {
                size: 0,
            }
        },
        xaxis: {
            color: 'transparent',
            font: {
                size: 0,
            }
        }
    };
    var options_center = {
        legend: {
            show: false
        },
        series: {
            label: "",
            curvedLines: {
                active: true,
                nrSplinePoints: 20
            },
        },
        tooltip: {
            show: true,
            content: "x : %x | y : %y"
        },
        grid: {
            hoverable: true,
            borderWidth: 0,
            labelMargin: 0,
            axisMargin: 0,
            minBorderMargin: 8,
        },
        yaxis: {
            min: 0,
            max: 30,
            color: 'transparent',
            font: {
                size: 0,
            }
        },
        xaxis: {
            color: 'transparent',
            font: {
                size: 0,
            }
        }
    };
    $(function() {
        // sale start
        $.plot($("#sec-ecommerce-chart-line"), [{
            data: [
                [0, 18],
                [1, 10],
                [2, 20],
                [3, 10],
                [4, 27],
                [5, 15],
                [6, 20],
                [7, 28],
                [8, 20],
                [9, 10],
                [10, 18],
                [11, 10],
                [12, 20],
                [13, 10],
                [14, 27],
            ],
            color: "#fff",
            lines: {
                show: true,
                fill: false,
                lineWidth: 2
            },
            points: {
                show: true,
                radius: 3,
                fill: true,
                fillColor: '#fff'
            },
            curvedLines: {
                apply: false,
            }
        }], options_center);
        $.plot($("#sec-ecommerce-chart-bar"), [{
            data: [
                [0, 18],
                [1, 10],
                [2, 20],
                [3, 10],
                [4, 27],
                [5, 15],
                [6, 20],
                [7, 24],
                [8, 20],
                [9, 16],
                [10, 18],
                [11, 10],
                [12, 20],
                [13, 10],
                [14, 27],
            ],
            color: "#add3ff",
            bars: {
                show: true,
                lineWidth: 1,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 1
                    }, {
                        opacity: 1
                    }]
                },
                barWidth: 0.6,
                align: 'center',
                horizontal: false
            },
            points: {
                show: false
            },
        }], options);
        // sale Income start

    });
    // Round Chart statustc card end
}
