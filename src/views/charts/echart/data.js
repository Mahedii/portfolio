import {
    graphic
} from "echarts";

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
let data1 = [];
for (let i = 0; i <= 360; i++) {
    let t = (i / 180) * Math.PI;
    let r = Math.sin(2 * t) * Math.cos(2 * t);
    data1.push([r, i]);
}

const lineChart = {
    grid: {
        left: '0%',
        right: '0%',
        bottom: '0%',
        top: '4%',
        containLabel: true
    },
    xAxis: {
        type: 'category',
        data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        axisLine: {
            lineStyle: {
                color: '#858d98'
            },
        },
    },
    yAxis: {
        type: 'value',
        axisLine: {
            lineStyle: {
                color: '#858d98'
            },
        },
        splitLine: {
            lineStyle: {
                color: "rgba(133, 141, 152, 0.1)"
            }
        }
    },
    series: [{
        data: [150, 230, 224, 218, 135, 147, 260],
        type: 'line'
    }],
    textStyle: {
        fontFamily: 'Poppins, sans-serif'
    },
    color: getChartColorsArray('["--vz-success"]'),

};

const stackedLineChart = {
    // Setup grid
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data: ['Email', 'Union Ads', 'Video Ads', 'Direct', 'Search Engine'],
        textStyle: { //The style of the legend text
            color: '#858d98',
        },
    },
    grid: {
        left: '0%',
        right: '0%',
        bottom: '0%',
        containLabel: true
    },
    toolbox: {
        feature: {
            saveAsImage: {}
        }
    },
    textStyle: {
        fontFamily: 'Poppins, sans-serif'
    },
    xAxis: {
        type: 'category',
        boundaryGap: false,
        data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        axisLine: {
            lineStyle: {
                color: '#858d98'
            },
        },
    },
    yAxis: {
        type: 'value',
        axisLine: {
            lineStyle: {
                color: '#858d98'
            },
        },
        splitLine: {
            lineStyle: {
                color: "rgba(133, 141, 152, 0.1)"
            }
        }
    },
    series: [{
            name: 'Email',
            type: 'line',
            stack: 'Total',
            data: [120, 132, 101, 134, 90, 230, 210],
        },
        {
            name: 'Union Ads',
            type: 'line',
            stack: 'Total',
            data: [220, 182, 191, 234, 290, 330, 310]
        },
        {
            name: 'Video Ads',
            type: 'line',
            stack: 'Total',
            data: [150, 232, 201, 154, 190, 330, 410]
        },
        {
            name: 'Direct',
            type: 'line',
            stack: 'Total',
            data: [320, 332, 301, 334, 390, 330, 320]
        },
        {
            name: 'Search Engine',
            type: 'line',
            stack: 'Total',
            data: [820, 932, 901, 934, 1290, 1330, 1320]
        }
    ],
    colors: getChartColorsArray('["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'),
};

const areaChart = {
    grid: {
        left: '0%',
        right: '0%',
        bottom: '0%',
        top: '4%',
        containLabel: true
    },
    xAxis: {
        type: 'category',
        boundaryGap: false,
        data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        axisLine: {
            lineStyle: {
                color: '#858d98'
            },
        },
    },
    yAxis: {
        type: 'value',
        axisLine: {
            lineStyle: {
                color: '#858d98'
            },
        },
        splitLine: {
            lineStyle: {
                color: "rgba(133, 141, 152, 0.1)"
            }
        }
    },
    series: [{
        data: [820, 932, 901, 934, 1290, 1330, 1320],
        type: 'line',
        areaStyle: {}
    }],
    textStyle: {
        fontFamily: 'Poppins, sans-serif'
    },
    colors: getChartColorsArray('["--vz-success"]'),
    backgroundColor: ["#fff"],
};

const stackedAreaChart = {
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'cross',
            label: {
                backgroundColor: '#6a7985'
            }
        }
    },
    legend: {
        data: ['Email', 'Union Ads', 'Video Ads', 'Direct', 'Search Engine'],
        textStyle: { //The style of the legend text
            color: '#858d98',
        },
    },
    toolbox: {
        feature: {
            saveAsImage: {}
        }
    },
    grid: {
        left: '0%',
        right: '0%',
        bottom: '0%',
        containLabel: true
    },
    xAxis: [{
        type: 'category',
        boundaryGap: false,
        data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        axisLine: {
            lineStyle: {
                color: '#858d98'
            },
        },
    }],
    yAxis: {
        type: 'value',
        axisLine: {
            lineStyle: {
                color: '#858d98'
            },
        },
        splitLine: {
            lineStyle: {
                color: "rgba(133, 141, 152, 0.1)"
            }
        }
    },
    textStyle: {
        fontFamily: 'Poppins, sans-serif'
    },
    color: getChartColorsArray('["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'),
    series: [{
            name: 'Email',
            type: 'line',
            stack: 'Total',
            areaStyle: {},
            emphasis: {
                focus: 'series'
            },
            data: [120, 132, 101, 134, 90, 230, 210]
        },
        {
            name: 'Union Ads',
            type: 'line',
            stack: 'Total',
            areaStyle: {},
            emphasis: {
                focus: 'series'
            },
            data: [220, 182, 191, 234, 290, 330, 310]
        },
        {
            name: 'Video Ads',
            type: 'line',
            stack: 'Total',
            areaStyle: {},
            emphasis: {
                focus: 'series'
            },
            data: [150, 232, 201, 154, 190, 330, 410]
        },
        {
            name: 'Direct',
            type: 'line',
            stack: 'Total',
            areaStyle: {},
            emphasis: {
                focus: 'series'
            },
            data: [320, 332, 301, 334, 390, 330, 320]
        },
        {
            name: 'Search Engine',
            type: 'line',
            stack: 'Total',
            label: {
                show: true,
                position: 'top'
            },
            areaStyle: {},
            emphasis: {
                focus: 'series'
            },
            data: [820, 932, 901, 934, 1290, 1330, 1320]
        }
    ]
}

const stepLineChart = {
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data: ['Step Start', 'Step Middle', 'Step End'],
        textStyle: { //The style of the legend text
            color: '#858d98',
        },
    },
    grid: {
        left: '0%',
        right: '0%',
        bottom: '0%',
        containLabel: true
    },
    toolbox: {
        feature: {
            saveAsImage: {}
        }
    },
    xAxis: {
        type: 'category',
        data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        axisLine: {
            lineStyle: {
                color: '#858d98'
            },
        },
    },
    yAxis: {
        type: 'value',
        axisLine: {
            lineStyle: {
                color: '#858d98'
            },
        },
        splitLine: {
            lineStyle: {
                color: "rgba(133, 141, 152, 0.1)"
            }
        }
    },
    textStyle: {
        fontFamily: 'Poppins, sans-serif'
    },
    color: getChartColorsArray('["--vz-primary", "--vz-success", "--vz-warning"]'),
    series: [{
            name: 'Step Start',
            type: 'line',
            step: 'start',
            data: [120, 132, 101, 134, 90, 230, 210]
        },
        {
            name: 'Step Middle',
            type: 'line',
            step: 'middle',
            data: [220, 282, 201, 234, 290, 430, 410]
        },
        {
            name: 'Step End',
            type: 'line',
            step: 'end',
            data: [450, 432, 401, 454, 590, 530, 510]
        }
    ]
};

const lineYCategoryChart = {
    legend: {
        data: ['Altitude (km) vs. temperature (°C)'],
        textStyle: { //The style of the legend text
            color: '#858d98',
        },
    },
    tooltip: {
        trigger: 'axis',
        formatter: 'Temperature : <br/>{b}km : {c}°C'
    },
    grid: {
        left: '1%',
        right: '0%',
        bottom: '0%',
        containLabel: true
    },
    xAxis: {
        type: 'value',
        axisLabel: {
            formatter: '{value} °C'
        },
        axisLine: {
            lineStyle: {
                color: '#858d98'
            },
        },
        splitLine: {
            lineStyle: {
                color: "rgba(133, 141, 152, 0.1)"
            }
        }
    },
    yAxis: {
        type: 'category',
        axisLine: {
            onZero: false,
            lineStyle: {
                color: '#858d98'
            },
        },
        axisLabel: {
            formatter: '{value} km'
        },
        boundaryGap: false,
        data: ['0', '10', '20', '30', '40', '50', '60', '70', '80'],
        splitLine: {
            lineStyle: {
                color: "rgba(133, 141, 152, 0.1)"
            }
        }
    },
    textStyle: {
        fontFamily: 'Poppins, sans-serif'
    },
    color: getChartColorsArray('["--vz-success"]'),
    series: [{
        name: 'Altitude (km) vs. temperature (°C)',
        type: 'line',
        symbolSize: 10,
        symbol: 'circle',
        smooth: true,
        lineStyle: {
            width: 3,
            shadowColor: 'rgba(0,0,0,0.3)',
            shadowBlur: 10,
            shadowOffsetY: 8
        },
        data: [15, -50, -56.5, -46.5, -22.1, -2.5, -27.7, -55.7, -76.5]
    }]
}

const basicBar = {
    grid: {
        left: '0%',
        right: '0%',
        bottom: '0%',
        top: '3%',
        containLabel: true
    },
    xAxis: {
        type: 'category',
        data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        axisLine: {
            lineStyle: {
                color: '#858d98'
            },
        },
    },
    yAxis: {
        type: 'value',
        axisLine: {
            lineStyle: {
                color: '#858d98'
            },
        },
        splitLine: {
            lineStyle: {
                color: "rgba(133, 141, 152, 0.1)"
            }
        }
    },
    textStyle: {
        fontFamily: 'Poppins, sans-serif'
    },
    color: getChartColorsArray('["--vz-success"]'),
    series: [{
        data: [120, 200, 150, 80, 70, 110, 130],
        type: 'bar',
        showBackground: true,
        backgroundStyle: {
            color: 'rgba(180, 180, 180, 0.2)'
        }
    }]
};

const barLabelChart = {

}

const horizontalBarChart = {
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'shadow'
        }
    },
    legend: {
        textStyle: { //The style of the legend text
            color: '#858d98',
        },
    },
    grid: {
        left: '0%',
        right: '4%',
        bottom: '0%',
        containLabel: true
    },
    xAxis: {
        type: 'value',
        boundaryGap: [0, 0.01],
        axisLine: {
            lineStyle: {
                color: '#858d98'
            },
        },
        splitLine: {
            lineStyle: {
                color: "rgba(133, 141, 152, 0.1)"
            }
        }
    },
    yAxis: {
        type: 'category',
        data: ['Brazil', 'Indonesia', 'USA', 'India', 'China', 'World'],
        axisLine: {
            lineStyle: {
                color: '#858d98'
            },
        },
        splitLine: {
            lineStyle: {
                color: "rgba(133, 141, 152, 0.1)"
            }
        }
    },
    textStyle: {
        fontFamily: 'Poppins, sans-serif'
    },
    color: getChartColorsArray('["--vz-primary", "--vz-success"]'),
    series: [{
            name: '2011',
            type: 'bar',
            data: [18203, 23489, 29034, 104970, 131744, 630230]
        },
        {
            name: '2012',
            type: 'bar',
            data: [19325, 23438, 31000, 121594, 134141, 681807]
        }
    ]
}

const stackedHorizontalBarChart = {
    trigger: 'axis',
    axisPointer: {
        // Use axis to trigger tooltip
        type: 'shadow' // 'shadow' as default; can also be 'line' or 'shadow'
    },
    legend: {
        textStyle: { //The style of the legend text
            color: '#858d98',
        },
    },
    grid: {
        left: '1%',
        right: '3%',
        bottom: '0%',
        containLabel: true
    },
    xAxis: {
        type: 'value',
        axisLine: {
            lineStyle: {
                color: '#858d98'
            },
        },
        splitLine: {
            lineStyle: {
                color: "rgba(133, 141, 152, 0.1)"
            }
        }
    },
    color: getChartColorsArray('["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'),
    yAxis: {
        type: 'category',
        data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        axisLine: {
            lineStyle: {
                color: '#858d98'
            },
        },
        splitLine: {
            lineStyle: {
                color: "rgba(133, 141, 152, 0.1)"
            }
        }
    },
    textStyle: {
        fontFamily: 'Poppins, sans-serif'
    },
    series: [{
            name: 'Direct',
            type: 'bar',
            stack: 'total',
            label: {
                show: true
            },
            emphasis: {
                focus: 'series'
            },
            data: [320, 302, 301, 334, 390, 330, 320]
        },
        {
            name: 'Mail Ad',
            type: 'bar',
            stack: 'total',
            label: {
                show: true
            },
            emphasis: {
                focus: 'series'
            },
            data: [120, 132, 101, 134, 90, 230, 210]
        },
        {
            name: 'Affiliate Ad',
            type: 'bar',
            stack: 'total',
            label: {
                show: true
            },
            emphasis: {
                focus: 'series'
            },
            data: [220, 182, 191, 234, 290, 330, 310]
        },
        {
            name: 'Video Ad',
            type: 'bar',
            stack: 'total',
            label: {
                show: true
            },
            emphasis: {
                focus: 'series'
            },
            data: [150, 212, 201, 154, 190, 330, 410]
        },
        {
            name: 'Search Engine',
            type: 'bar',
            stack: 'total',
            label: {
                show: true
            },
            emphasis: {
                focus: 'series'
            },
            data: [820, 832, 901, 934, 1290, 1330, 1320]
        }
    ]
}

const pieChart = {
    tooltip: {
        trigger: 'item',
        formatter: '{a} <br/>{b} : {c} ({d}%)'
    },
    legend: {
        orient: 'vertical',
        left: 'left',
        data: ['Laptop', 'Tablet', 'Mobile', 'Others', 'Desktop'],
        textStyle: {
            color: '#999'
        }
    },
    color: getChartColorsArray('["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'),
    series: [{
        name: 'Total sales',
        type: 'pie',
        radius: '55%',
        center: ['50%', '60%'],
        data: [{
                value: 488,
                name: 'Laptop'
            },
            {
                value: 310,
                name: 'Tablet'
            },
            {
                value: 234,
                name: 'Mobile'
            },
            {
                value: 170,
                name: 'Others'
            },
            {
                value: 175,
                name: 'Desktop'
            }
        ]
    }]
};

const doughnutChart = {
    tooltip: {
        trigger: 'item',
        formatter: '{a} <br/>{b}: {c} ({d}%)'
    },
    legend: {
        orient: 'vertical',
        x: 'left',
        data: ['Laptop', 'Tablet', 'Mobile', 'Others', 'Desktop'],
        textStyle: {
            color: '#999'
        }
    },
    color: getChartColorsArray('["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'),
    series: [{
        name: 'Total sales',
        type: 'pie',
        radius: ['50%', '70%'],
        avoidLabelOverlap: false,
        emphasis: {
            label: {
                show: true,
                textStyle: {
                    fontSize: '30',
                    fontWeight: 'bold'
                }
            }
        },
        labelLine: {
            normal: {
                show: false
            }
        },
        data: [{
                value: 335,
                name: 'Laptop'
            },
            {
                value: 310,
                name: 'Tablet'
            },
            {
                value: 234,
                name: 'Mobile'
            },
            {
                value: 135,
                name: 'Others'
            },
            {
                value: 1548,
                name: 'Desktop'
            }
        ]
    }]
};

const scatterChart = {
    grid: {
        left: '1%',
        right: '0%',
        bottom: '0%',
        top: '2%',
        containLabel: true
    },
    xAxis: {
        axisLine: {
            lineStyle: {
                color: '#858d98'
            },
        },
        splitLine: {
            lineStyle: {
                color: "rgba(133, 141, 152, 0.1)"
            }
        }
    },
    yAxis: {
        axisLine: {
            lineStyle: {
                color: '#858d98'
            },
        },
        splitLine: {
            lineStyle: {
                color: "rgba(133, 141, 152, 0.1)"
            }
        }
    },
    textStyle: {
        fontFamily: 'Poppins, sans-serif'
    },
    series: [{
        symbolSize: 12,
        data: [
            [10.0, 8.04],
            [8.07, 6.95],
            [13.0, 7.58],
            [9.05, 8.81],
            [11.0, 8.33],
            [14.0, 7.66],
            [13.4, 6.81],
            [10.0, 6.33],
            [14.0, 8.96],
            [12.5, 6.82],
            [9.15, 7.2],
            [11.5, 7.2],
            [3.03, 4.23],
            [12.2, 7.83],
            [2.02, 4.47],
            [1.05, 3.33],
            [4.05, 4.96],
            [6.03, 7.24],
            [12.0, 6.26],
            [12.0, 8.84],
            [7.08, 5.82],
            [5.02, 5.68]
        ],
        type: 'scatter'
    }],
}



const graphChart = {
    tooltip: {},
    animationDurationUpdate: 1500,
    animationEasingUpdate: 'quinticInOut',
    color: getChartColorsArray('["--vz-primary"]'),
    series: [{
        type: 'graph',
        layout: 'none',
        symbolSize: 50,
        roam: true,
        label: {
            show: true
        },
        edgeSymbol: ['circle', 'arrow'],
        edgeSymbolSize: [4, 10],
        edgeLabel: {
            fontSize: 20
        },
        data: [{
                name: 'Node 1',
                x: 300,
                y: 300
            },
            {
                name: 'Node 2',
                x: 800,
                y: 300
            },
            {
                name: 'Node 3',
                x: 550,
                y: 100
            },
            {
                name: 'Node 4',
                x: 550,
                y: 500
            }
        ],
        // links: [],
        links: [{
                source: 0,
                target: 1,
                symbolSize: [5, 20],
                label: {
                    show: true
                },
                lineStyle: {
                    width: 5,
                    curveness: 0.2
                }
            },
            {
                source: 'Node 2',
                target: 'Node 1',
                label: {
                    show: true
                },
                lineStyle: {
                    curveness: 0.2
                }
            },
            {
                source: 'Node 1',
                target: 'Node 3'
            },
            {
                source: 'Node 2',
                target: 'Node 3'
            },
            {
                source: 'Node 2',
                target: 'Node 4'
            },
            {
                source: 'Node 1',
                target: 'Node 4'
            }
        ],
        lineStyle: {
            opacity: 0.9,
            width: 2,
            curveness: 0
        }
    }],
    textStyle: {
        fontFamily: 'Poppins, sans-serif'
    },
}

const treemapChart = {
    color: getChartColorsArray('["--vz-primary", "--vz-success"]'),
    series: [{
        type: 'treemap',
        data: [{
                name: 'nodeA',
                value: 10,
                children: [{
                        name: 'nodeAa',
                        value: 4
                    },
                    {
                        name: 'nodeAb',
                        value: 6
                    }
                ]
            },
            {
                name: 'nodeB',
                value: 20,
                children: [{
                    name: 'nodeBa',
                    value: 20,
                    children: [{
                        name: 'nodeBa1',
                        value: 20
                    }]
                }]
            }
        ]
    }],
    textStyle: {
        fontFamily: 'Poppins, sans-serif'
    },
}

const sunburstChart = {
    color: getChartColorsArray('["--vz-warning", "--vz-success"]'),
    series: {
        type: 'sunburst',
        // emphasis: {
        //     focus: 'ancestor'
        // },
        data: [{
                name: 'Grandpa',
                children: [{
                        name: 'Uncle Leo',
                        value: 15,
                        children: [{
                                name: 'Cousin Jack',
                                value: 2
                            },
                            {
                                name: 'Cousin Mary',
                                value: 5,
                                children: [{
                                    name: 'Jackson',
                                    value: 2
                                }]
                            },
                            {
                                name: 'Cousin Ben',
                                value: 4
                            }
                        ]
                    },
                    {
                        name: 'Father',
                        value: 10,
                        children: [{
                                name: 'Me',
                                value: 5
                            },
                            {
                                name: 'Brother Peter',
                                value: 1
                            }
                        ]
                    }
                ]
            },
            {
                name: 'Nancy',
                children: [{
                    name: 'Uncle Nike',
                    children: [{
                            name: 'Cousin Betty',
                            value: 1
                        },
                        {
                            name: 'Cousin Jenny',
                            value: 2
                        }
                    ]
                }]
            }
        ],
        radius: [0, '90%'],
        label: {
            rotate: 'radial'
        }
    },
    textStyle: {
        fontFamily: 'Poppins, sans-serif'
    },
}

const parallelChart = {
    parallelAxis: [{
            dim: 0,
            name: 'Price'
        },
        {
            dim: 1,
            name: 'Net Weight'
        },
        {
            dim: 2,
            name: 'Amount'
        },
        {
            dim: 3,
            name: 'Score',
            type: 'category',
            data: ['Excellent', 'Good', 'OK', 'Bad']
        }
    ],
    grid: {
        left: '0%',
        right: '0%',
        bottom: '0%',
        top: '2%',
        containLabel: true
    },
    color: getChartColorsArray('["--vz-success"]'),
    series: {
        type: 'parallel',
        lineStyle: {
            width: 4
        },
        data: [
            [12.99, 100, 82, 'Good'],
            [9.99, 80, 77, 'OK'],
            [20, 120, 60, 'Excellent']
        ]
    },
    textStyle: {
        fontFamily: 'Poppins, sans-serif'
    },
}

const sankeyChart = {
    color: getChartColorsArray('["--vz-info", "--vz-success", "--vz-warning", "--vz-danger", "--vz-primary"]'),
    series: {
        type: 'sankey',
        layout: 'none',
        emphasis: {
            focus: 'adjacency'
        },
        data: [{
                name: 'a'
            },
            {
                name: 'b'
            },
            {
                name: 'a1'
            },
            {
                name: 'a2'
            },
            {
                name: 'b1'
            },
            {
                name: 'c'
            }
        ],
        links: [{
                source: 'a',
                target: 'a1',
                value: 5
            },
            {
                source: 'a',
                target: 'a2',
                value: 3
            },
            {
                source: 'b',
                target: 'b1',
                value: 8
            },
            {
                source: 'a',
                target: 'b1',
                value: 3
            },
            {
                source: 'b1',
                target: 'a1',
                value: 1
            },
            {
                source: 'b1',
                target: 'c',
                value: 2
            }
        ]
    },
    textStyle: {
        fontFamily: 'Poppins, sans-serif'
    },
}

const funnelChart = {
    tooltip: {
        trigger: 'item',
        formatter: '{a} <br/>{b} : {c}%'
    },
    toolbox: {
        feature: {
            dataView: {
                readOnly: false
            },
            restore: {},
            saveAsImage: {}
        }
    },
    legend: {
        data: ['Show', 'Click', 'Visit', 'Inquiry', 'Order'],
        textStyle: { //The style of the legend text
            color: '#858d98',
        },
    },
    color: getChartColorsArray('["--vz-info", "--vz-success","--vz-warning", "--vz-danger", "--vz-primary"]'),
    series: [{
        name: 'Funnel',
        type: 'funnel',
        left: '10%',
        top: 60,
        bottom: 60,
        width: '80%',
        min: 0,
        max: 100,
        minSize: '0%',
        maxSize: '100%',
        sort: 'descending',
        gap: 2,
        label: {
            show: true,
            position: 'inside'
        },
        labelLine: {
            length: 10,
            lineStyle: {
                width: 1,
                type: 'solid'
            }
        },
        itemStyle: {
            borderColor: '#fff',
            borderWidth: 1
        },
        emphasis: {
            label: {
                fontSize: 20
            }
        },
        data: [{
                value: 60,
                name: 'Visit'
            },
            {
                value: 40,
                name: 'Inquiry'
            },
            {
                value: 20,
                name: 'Order'
            },
            {
                value: 80,
                name: 'Click'
            },
            {
                value: 100,
                name: 'Show'
            }
        ]
    }],
    textStyle: {
        fontFamily: 'Poppins, sans-serif'
    },
}

const guageChart = {
    tooltip: {
        formatter: "{a} <br/>{b} : {c}%"
    },
    toolbox: {
        feature: {
            restore: {
                title: "Refresh"
            },
            saveAsImage: {
                title: "Download Image"
            }
        }
    },
    series: [{
        name: 'Business indicator',
        type: 'gauge',
        detail: {
            formatter: '{value}%'
        },
        axisLine: {
            lineStyle: {
                color: [
                    [0.2, '#34c38f'],
                    [0.8, '#556ee6'],
                    [1, '#f46a6a']
                ],
                width: 20
            }
        },
        data: [{
            value: 50,
            name: 'Completion rate'
        }]
    }]
};

const polarChart = {
    polar: {
        legend: {
            data: ["line"],
            textStyle: {
                color: '#999'
            }
        },
        polar: {
            center: ["50%", "54%"]
        },
        color: getChartColorsArray('["--vz-success"]'),
        tooltip: {
            trigger: "axis",
            axisPointer: {
                type: "cross"
            }
        },
        angleAxis: {
            type: "value",
            startAngle: 0
        },
        radiusAxis: {
            min: 0
        },
        series: [{
            coordinateSystem: "polar",
            name: "line",
            type: "line",
            showSymbol: false,
            data: data1
        }],
        animationDuration: 2000
    }
};

const mixedBarChart = {
    // Setup grid
    grid: {
        zlevel: 0,
        x: 80,
        x2: 50,
        y: 30,
        y2: 30,
        borderWidth: 0,
        backgroundColor: 'rgba(0,0,0,0)',
        borderColor: 'rgba(0,0,0,0)',
    },
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'cross',
            crossStyle: {
                color: '#999'
            }
        }
    },
    toolbox: {
        orient: 'center',
        left: 0,
        top: 20,
        feature: {
            dataView: {
                readOnly: false,
                title: "Data View"
            },
            magicType: {
                type: ['line', 'bar'],
                title: {
                    line: "For line chart",
                    bar: "For bar chart"
                }
            },
            restore: {
                title: "restore"
            },
            saveAsImage: {
                title: "Download Image"
            }
        }
    },
    color: getChartColorsArray('["--vz-success","--vz-primary","--vz-danger"]'),
    legend: {
        data: ['Evaporation', 'Precipitation', 'Average temperature'],
        textStyle: {
            color: '#8791af'
        }
    },
    xAxis: [{
        type: 'category',
        data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
        axisPointer: {
            type: 'shadow'
        },
        axisLine: {
            lineStyle: {
                color: '#8791af'
            },
        },
    }],
    yAxis: [{
            type: 'value',
            name: 'Water volume',
            min: 0,
            max: 250,
            interval: 50,
            axisLine: {
                lineStyle: {
                    color: '#8791af'
                },
            },
            splitLine: {
                lineStyle: {
                    color: "rgba(166, 176, 207, 0.1)"
                }
            },
            axisLabel: {
                formatter: '{value} ml'
            }
        },
        {
            type: 'value',
            name: 'Temperature',
            min: 0,
            max: 25,
            interval: 5,
            axisLine: {
                lineStyle: {
                    color: '#8791af'
                },
            },
            splitLine: {
                lineStyle: {
                    color: "rgba(166, 176, 207, 0.1)"
                }
            },
            axisLabel: {
                formatter: '{value} Ã‚Â°C'
            }
        }
    ],
    series: [{
            name: 'Evaporation',
            type: 'bar',
            data: [2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2]
        },
        {
            name: 'Precipitation',
            type: 'bar',
            data: [2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2]
        },
        {
            name: 'Average Temperature',
            type: 'line',
            yAxisIndex: 1,
            data: [2.0, 2.2, 3.3, 4.5, 6.3, 10.2, 20.3, 23.4]
        }
    ]
};

var data = [
    [
        [28604, 77, 17096869, 'Australia', 1990],
        [31163, 77.4, 27662440, 'Canada', 1990],
        [1516, 68, 1154605773, 'China', 1990],
        [13670, 74.7, 10582082, 'Cuba', 1990],
        [28599, 75, 4986705, 'Finland', 1990],
        [29476, 77.1, 56943299, 'France', 1990],
        [31476, 75.4, 78958237, 'Germany', 1990],
        [28666, 78.1, 254830, 'Iceland', 1990],
        [1777, 57.7, 870601776, 'India', 1990],
        [29550, 79.1, 122249285, 'Japan', 1990],
        [2076, 67.9, 20194354, 'North Korea', 1990],
        [12087, 72, 42972254, 'South Korea', 1990],
        [24021, 75.4, 3397534, 'New Zealand', 1990],
        [43296, 76.8, 4240375, 'Norway', 1990],
        [10088, 70.8, 38195258, 'Poland', 1990],
        [19349, 69.6, 147568552, 'Russia', 1990],
        [10670, 67.3, 53994605, 'Turkey', 1990],
        [26424, 75.7, 57110117, 'United Kingdom', 1990],
        [37062, 75.4, 252847810, 'United States', 1990]
    ],
    [
        [44056, 81.8, 23968973, 'Australia', 2015],
        [43294, 81.7, 35939927, 'Canada', 2015],
        [13334, 76.9, 1376048943, 'China', 2015],
        [21291, 78.5, 11389562, 'Cuba', 2015],
        [38923, 80.8, 5503457, 'Finland', 2015],
        [37599, 81.9, 64395345, 'France', 2015],
        [44053, 81.1, 80688545, 'Germany', 2015],
        [42182, 82.8, 329425, 'Iceland', 2015],
        [5903, 66.8, 1311050527, 'India', 2015],
        [36162, 83.5, 126573481, 'Japan', 2015],
        [1390, 71.4, 25155317, 'North Korea', 2015],
        [34644, 80.7, 50293439, 'South Korea', 2015],
        [34186, 80.6, 4528526, 'New Zealand', 2015],
        [64304, 81.6, 5210967, 'Norway', 2015],
        [24787, 77.3, 38611794, 'Poland', 2015],
        [23038, 73.13, 143456918, 'Russia', 2015],
        [19360, 76.5, 78665830, 'Turkey', 2015],
        [38225, 81.4, 64715810, 'United Kingdom', 2015],
        [53354, 79.1, 321773631, 'United States', 2015]
    ]
];
const bubbleChart = {
    grid: {
        zlevel: 0,
        x: 50,
        x2: 50,
        y: 30,
        y2: 30,
        borderWidth: 0,
        backgroundColor: 'rgba(0,0,0,0)',
        borderColor: 'rgba(0,0,0,0)',
    },
    legend: {
        right: 10,
        data: ['2018', '2019'],
        textStyle: {
            color: '#999'
        }
    },
    xAxis: {
        axisLine: {
            lineStyle: {
                color: '#8791af'
            },
        },
        splitLine: {
            lineStyle: {
                type: 'dashed',
                color: "rgba(166, 176, 207, 0.1)"
            }
        },
    },
    yAxis: {
        axisLine: {
            lineStyle: {
                color: '#8791af'
            },
        },
        splitLine: {
            lineStyle: {
                type: 'dashed',
                color: "rgba(166, 176, 207, 0.1)"
            }
        },
        scale: true
    },
    series: [{
            name: '2018',
            data: data[0],
            type: 'scatter',
            symbolSize(data) {
                return Math.sqrt(data[2]) / 5e2
            },

            emphasis: {
                label: {
                    show: true,
                    formatter({
                        data
                    }) {
                        return data[3]
                    },
                    position: 'top'
                }
            },
            itemStyle: {

                shadowBlur: 10,
                shadowColor: 'rgba(120, 36, 50, 0.5)',
                shadowOffsetY: 5,
                color: new graphic.RadialGradient(0.4, 0.3, 1, [{
                        offset: 0,
                        color: getChartColorsArray('["--vz-primary"]')
                    },
                    {
                        offset: 1,
                        color: getChartColorsArray('["--vz-primary"]')
                    }
                ])

            }
        },
        {
            name: '2019',
            data: data[1],
            type: 'scatter',
            symbolSize(data) {
                return Math.sqrt(data[2]) / 5e2
            },

            emphasis: {
                label: {
                    show: true,
                    formatter({
                        data
                    }) {
                        return data[3]
                    },
                    position: 'top'
                }
            },
            itemStyle: {
                shadowBlur: 10,
                shadowColor: 'rgba(52, 195, 143, 0.5)',
                shadowOffsetY: 5,
                color: new graphic.RadialGradient(0.4, 0.3, 1, [{
                        offset: 0,
                        color: getChartColorsArray('["--vz-success"]')
                    },
                    {
                        offset: 1,
                        color: getChartColorsArray('["--vz-success"]')
                    }
                ])

            }
        }
    ]
};

const candlestickChart = {
    grid: {
        left: '1%',
        right: '0%',
        bottom: '0%',
        top: '2%',
        containLabel: true
    },
    xAxis: {
        data: ['2017-10-24', '2017-10-25', '2017-10-26', '2017-10-27'],
        axisLine: {
            lineStyle: {
                color: '#858d98'
            },
        },
        splitLine: {
            lineStyle: {
                color: "rgba(133, 141, 152, 0.1)"
            }
        }
    },
    yAxis: {
        axisLine: {
            lineStyle: {
                color: '#858d98'
            },
        },
        splitLine: {
            lineStyle: {
                color: "rgba(133, 141, 152, 0.1)"
            }
        }
    },
    textStyle: {
        fontFamily: 'Poppins, sans-serif'
    },
    series: [{
        type: 'candlestick',
        data: [
            [20, 34, 10, 38],
            [40, 35, 30, 50],
            [31, 38, 33, 44],
            [38, 15, 5, 42]
        ],
        itemStyle: {
            normal: {
                color: "#556ee6",
                color0: "#34c38f",
                borderColor: "#556ee6",
                borderColor0: "#34c38f"
            }
        }
    }]
};

export {
    lineChart,
    polarChart,
    areaChart,
    mixedBarChart,
    guageChart,
    stackedLineChart,
    pieChart,
    stepLineChart,
    bubbleChart,
    doughnutChart,
    lineYCategoryChart,
    stackedAreaChart,
    basicBar,
    barLabelChart,
    horizontalBarChart,
    stackedHorizontalBarChart,
    scatterChart,
    graphChart,
    treemapChart,
    sunburstChart,
    parallelChart,
    sankeyChart,
    candlestickChart,
    funnelChart
};