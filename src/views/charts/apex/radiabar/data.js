//  Radialbar Charts
function getChartColorsArray(colors){
    colors = JSON.parse(colors);
    return colors.map(function (value) {
      var newValue = value.replace(" ", "");
      if (newValue.indexOf(",") === -1) {
        var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);
            if (color) {
            color = color.replace(" ", "");
            return color;
            }
            else return newValue;
        } else {
            var val = value.split(',');
            if (val.length == 2) {
                var rgbaColor = getComputedStyle(document.documentElement).getPropertyValue(val[0]);
                rgbaColor = "rgba(" + rgbaColor + "," + val[1] + ")";
                return rgbaColor;
            } else {
                return newValue;
            }
        }
    });
  }
const basicRadialBarChart = {
    series: [70],
    chartOptions: {
        chart: {
            height: 350,
            type: "radialBar",
        },
        plotOptions: {
            radialBar: {
                hollow: {
                    size: "70%",
                },
            },
        },
        labels: ["Cricket"],
        colors: getChartColorsArray('["--vz-success"]'),
    },
};

// Multi-Radial Bar

const multiRadialbarChart = {
    series: [44, 55, 67, 83],
    chartOptions: {
        chart: {
            height: 350,
            type: "radialBar",
        },
        plotOptions: {
            radialBar: {
                dataLabels: {
                    name: {
                        fontSize: "22px",
                    },
                    value: {
                        fontSize: "16px",
                    },
                    total: {
                        show: true,
                        label: "Total",
                        formatter: function () {
                            return 249;
                        },
                    },
                },
            },
        },
        labels: ["Apples", "Oranges", "Bananas", "Berries"],
        colors: getChartColorsArray('["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger"]'),
    },
};

// Circle Chart - Custom Angle

const circleAngleChart = {
    series: [76, 67, 61, 55],
    chartOptions: {
        chart: {
            height: 350,
            type: "radialBar",
        },
        plotOptions: {
            radialBar: {
                offsetY: 0,
                startAngle: 0,
                endAngle: 270,
                hollow: {
                    margin: 5,
                    size: "30%",
                    background: "transparent",
                    image: undefined,
                },
                dataLabels: {
                    name: {
                        show: false,
                    },
                    value: {
                        show: false,
                    },
                },
            },
        },
        colors: getChartColorsArray('["--vz-primary", "--vz-info", "--vz-danger", "--vz-success"]'),
        labels: ["Vimeo", "Messenger", "Facebook", "LinkedIn"],
        legend: {
            show: true,
            floating: true,
            fontSize: "16px",
            position: "left",
            offsetX: 160,
            offsetY: 15,
            labels: {
                useSeriesColors: true,
            },
            markers: {
                size: 0,
            },
            formatter: function (seriesName, opts) {
                return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex];
            },
            itemMargin: {
                vertical: 3,
            },
        },
        responsive: [{
            breakpoint: 480,
            options: {
                legend: {
                    show: false,
                },
            },
        }, ],
    },
};

// Gradient Radialbar

const gradientRadialbarChart = {
    series: [75],
    chartOptions: {
        chart: {
            height: 350,
            type: "radialBar",
            toolbar: {
                show: false,
            },
        },
        plotOptions: {
            radialBar: {
                startAngle: -135,
                endAngle: 225,
                hollow: {
                    margin: 0,
                    size: "70%",
                    image: undefined,
                    imageOffsetX: 0,
                    imageOffsetY: 0,
                    position: "front",
                },
                track: {
                    strokeWidth: "67%",
                    margin: 0, // margin is in pixels
                },

                dataLabels: {
                    show: true,
                    name: {
                        offsetY: -10,
                        show: true,
                        color: "#888",
                        fontSize: "17px",
                    },
                    value: {
                        formatter: function (val) {
                            return parseInt(val);
                        },
                        color: "#111",
                        fontSize: "36px",
                        show: true,
                    },
                },
            },
        },
        fill: {
            type: "gradient",
            gradient: {
                shade: "dark",
                type: "horizontal",
                shadeIntensity: 0.5,
                gradientToColors: getChartColorsArray('["--vz-success"]'),
                inverseColors: true,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100],
            },
        },
        stroke: {
            lineCap: "round",
        },
        labels: ["Percent"],
    },
};

// Stroked Gauge

const strokedRadialbarChart = {
    series: [67],
    chartOptions: {
        chart: {
            height: 326,
            type: "radialBar",
            offsetY: -10,
        },
        plotOptions: {
            radialBar: {
                startAngle: -135,
                endAngle: 135,
                dataLabels: {
                    name: {
                        fontSize: "16px",
                        color: undefined,
                        offsetY: 120,
                    },
                    value: {
                        offsetY: 76,
                        fontSize: "22px",
                        color: undefined,
                        formatter: function (val) {
                            return val + "%";
                        },
                    },
                },
            },
        },
        fill: {
            type: "gradient",
            gradient: {
                shade: "dark",
                shadeIntensity: 0.15,
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 50, 65, 91],
            },
        },
        stroke: {
            dashArray: 4,
        },
        labels: ["Median Ratio"],
        colors: getChartColorsArray('["--vz-success"]'),
    },
};

// Semi Circle

const semiRadialbarChart = {
    series: [76],
    chartOptions: {
        chart: {
            type: "radialBar",
            height: 350,
            offsetY: -20,
            sparkline: {
                enabled: true,
            },
        },
        plotOptions: {
            radialBar: {
                startAngle: -90,
                endAngle: 90,
                track: {
                    background: "#e7e7e7",
                    strokeWidth: "97%",
                    margin: 5, // margin is in pixels
                    dropShadow: {
                        enabled: true,
                        top: 2,
                        left: 0,
                        color: "#999",
                        opacity: 1,
                        blur: 2,
                    },
                },
                dataLabels: {
                    name: {
                        show: false,
                    },
                    value: {
                        offsetY: -2,
                        fontSize: "22px",
                    },
                },
            },
        },
        grid: {
            padding: {
                top: -10,
            },
        },
        fill: {
            type: "gradient",
            gradient: {
                shade: "light",
                shadeIntensity: 0.4,
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 50, 53, 91],
            },
        },
        labels: ["Average Results"],
        colors: getChartColorsArray('["--vz-primary"]'),
    },
};

export {
    basicRadialBarChart,
    multiRadialbarChart,
    circleAngleChart,
    gradientRadialbarChart,
    strokedRadialbarChart,
    semiRadialbarChart
};