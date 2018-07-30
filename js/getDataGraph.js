$(document).ready(function() {
    $.ajax({
        url: "/cashflow/dataGraph.php",
        method: "GET",
        success: function(data) {
            var totalPerMonth = [];

            for (var i in data) {
                totalPerMonth.push(data[i]);
            }

            var incomeChartData = {
                label: 'รายรับ',
                data: totalPerMonth[0],
                backgroundColor: 'rgba(72, 189, 194, 1)',
                borderColor: 'rgba(72, 189, 194, 1)',
                hoverBackgroundColor: 'rgba(72, 189, 194, 1)',
                hoverBorderColor: 'rgba(72, 189, 194, 1)',
                yAxesID: "y-axis-income"
            };

            var moneyoutChartData = {
                label: 'รายจ่าย',
                data: totalPerMonth[1],
                backgroundColor: 'rgba(255, 99, 132, 1)',
                borderColor: 'rgba(255, 99, 132, 1)',
                hoverBackgroundColor: 'rgba(255, 99, 132, 1)',
                hoverBorderColor: 'rgba(255, 99, 132, 1)',
                yAxesID: "y-axis-moneyout"
            };

            var cashflow = {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Seb", "Oct", "Nov", "Dec"],
                datasets: [incomeChartData, moneyoutChartData]
            };
            var chartOptions = {
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                            color: "#ffffff"
                        },
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                            color: "#ffffff"
                        },
                        id: "y-axis-income",
                        id: "y-axis-moneyout",
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            fontColor: "#ffffff"
                        }
                    }
                }
            };


            var incomeChartWeekData = {
                label: 'รายรับ',
                data: totalPerMonth[8],
                backgroundColor: 'rgba(72, 189, 194, 1)',
                borderColor: 'rgba(72, 189, 194, 1)',
                hoverBackgroundColor: 'rgba(72, 189, 194, 1)',
                hoverBorderColor: 'rgba(72, 189, 194, 1)',
                yAxesID: "y-axis-income"
            };

            var moneyoutChartWeekData = {
                label: 'รายจ่าย',
                data: totalPerMonth[9],
                backgroundColor: 'rgba(255, 99, 132, 1)',
                borderColor: 'rgba(255, 99, 132, 1)',
                hoverBackgroundColor: 'rgba(255, 99, 132, 1)',
                hoverBorderColor: 'rgba(255, 99, 132, 1)',
                yAxesID: "y-axis-moneyout"
            };

            var weekCashflow = {
                labels: ["Week1(01-07)", "Week2(08-14)", "Week3(15-21)", "Week4(22-31)"],
                datasets: [incomeChartWeekData, moneyoutChartWeekData]
            };
            var chartOptions = {
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                            color: "#ffffff"
                        },
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                            color: "#ffffff"
                        },
                        id: "y-axis-income",
                        id: "y-axis-moneyout",
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            fontColor: "#ffffff"
                        }
                    }
                }
            };


            var ctx = $("#mycanvas");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: weekCashflow,
                options: chartOptions
            });
            $(function() {

                //pie chart data
                var data1 = {
                    labels: ["รายรับ", "รายจ่าย"],
                    datasets: [{
                        label: "Pie Chart",
                        data: [totalPerMonth[2], totalPerMonth[3]],
                        backgroundColor: [
                            'rgba(72, 189, 194, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderColor: [
                            'rgba(72, 189, 194, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: [1, 1]
                    }]
                };
                //options
                var options = {
                    responsive: true,
                    legend: {
                        display: true,
                        position: "bottom",
                        labels: {
                            fontColor: "#333",
                            fontSize: 16
                        }
                    }
                };


                $('#category_faq').change(function() {
                    //Use $option (with the "$") to see that the variable is a jQuery object
                    var $option = $('#category_faq').val();
                    var $option = $(this).find('option:selected');
                    //Added with the EDIT
                    var optionText = $option.text(); //to get <option>Text</option> content
                    if (optionText == "Today") {
                        barGraph.destroy();
                        barGraph = new Chart(ctx, {
                            type: "pie",
                            data: data1,
                            options: options
                        });
                    } else if (optionText == "This Month") {
                        barGraph.destroy();
                        barGraph = new Chart(ctx, {
                            type: 'bar',
                            data: weekCashflow,
                            options: chartOptions
                        });
                    } else if (optionText == "This Year") {
                        barGraph.destroy();
                        barGraph = new Chart(ctx, {
                            type: 'bar',
                            data: cashflow,
                            options: chartOptions
                        });
                    }
                });
            });

        },
        error: function(data) {
            console.log(data);
        }
    });
});