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
const line = {
  type: "line",
  data: {
    labels: [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
    ],
    datasets: [{
        label: "Sales Analytics",
        fill: true,
        lineTension: 0.5,
        backgroundColor: getChartColorsArray('["--vz-primary-rgb, 0.2"]'),
        borderColor: getChartColorsArray('["--vz-primary"]'),
        borderCapStyle: "butt",
        borderDash: [],
        borderDashOffset: 0.0,
        borderJoinStyle: "miter",
        pointBorderColor: "#405189",
        pointBackgroundColor: "#fff",
        pointBorderWidth: 1,
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "#405189",
        pointHoverBorderColor: "#fff",
        pointHoverBorderWidth: 2,
        pointRadius: 1,
        pointHitRadius: 10,
        data: [65, 59, 80, 81, 56, 55, 40, 55, 30, 80],
      },
      {
        label: "Monthly Earnings",
        fill: true,
        lineTension: 0.5,
        backgroundColor: getChartColorsArray('["--vz-success-rgb, 0.2"]'),
        borderColor: getChartColorsArray('["--vz-success"]'),
        borderCapStyle: "butt",
        borderDash: [],
        borderDashOffset: 0.0,
        borderJoinStyle: "miter",
        pointBorderColor: "#0AB39C",
        pointBackgroundColor: "#fff",
        pointBorderWidth: 1,
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "#0AB39C",
        pointHoverBorderColor: "#eef0f2",
        pointHoverBorderWidth: 2,
        pointRadius: 1,
        pointHitRadius: 10,
        data: [80, 23, 56, 65, 23, 35, 85, 25, 92, 36],
      },
    ],
  },
  options: {
    x: {
      ticks: {
        font: {
          family: 'Poppins',
        },
      },
    },
    y: {
      ticks: {
        font: {
          family: 'Poppins',
        },
      },
    },
    plugins: {
      legend: {
        labels: {
          // This more specific font property overrides the global property
          font: {
            family: 'Poppins',
          }
        }
      },
    },
  },

};

const pie = {
  type: "pie",
  data: {
    labels: ["Desktops", "Tablets"],
    datasets: [{
      data: [300, 180],
      backgroundColor: getChartColorsArray('["--vz-success", "--vz-light"]'),
      hoverBackgroundColor: getChartColorsArray('["--vz-success", "--vz-light"]'),
      hoverBorderColor: "#fff",
    }, ],
  },
  options: {
    maintainAspectRatio: true,
    responsive: true,
  },
};

const Doughnut = {
  type: "doughnut",
  data: {
    labels: ["Desktops", "Tablets"],
    datasets: [{
      data: [300, 210],
      backgroundColor: getChartColorsArray('["--vz-primary", "--vz-light"]'),
      hoverBackgroundColor: getChartColorsArray('["--vz-primary", "--vz-light"]'),
      hoverBorderColor: "#fff",
      borderWidth: 0,
      radius: "90%",
      innerRadius: "75%",
    }, ],
  },
  options: {
    maintainAspectRatio: true,
  },
};

const radar = {
  type: 'radar',
  data: {
    labels: [
      'Eating',
      'Drinking',
      'Sleeping',
      'Designing',
      'Coding',
      'Cycling',
      'Running',
    ],
    datasets: [{
        label: 'Desktops',
        backgroundColor: getChartColorsArray('["--vz-success-rgb, 0.2"]'),
        borderColor: getChartColorsArray('["--vz-success"]'),
        pointBackgroundColor: getChartColorsArray('["--vz-success"]'),
        pointBorderColor: '#fff',
        pointHoverBackgroundColor: '#fff',
        pointHoverBorderColor: getChartColorsArray('["--vz-success"]'),
        data: [65, 59, 90, 81, 56, 55, 40],
      },
      {
        label: 'Tablets',
        backgroundColor: getChartColorsArray('["--vz-primary-rgb, 0.2"]'),
        borderColor: getChartColorsArray('["--vz-primary"]'),
        pointBackgroundColor: getChartColorsArray('["--vz-primary"]'),
        pointBorderColor: '#fff',
        pointHoverBackgroundColor: '#fff',
        pointHoverBorderColor: getChartColorsArray('["--vz-primary"]'),
        data: [28, 48, 40, 19, 96, 27, 100],
      },
    ],
  },
  options: {
    maintainAspectRatio: true,
    legend: {
      position: 'top',
    },
  }
}

const bar = {
  type: "bar",
  data: {
    labels: [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
    ],
    datasets: [{
      barPercentage: 0.4,
      label: "Sales Analytics",
      backgroundColor: getChartColorsArray('["--vz-primary-rgb, 0.8"]'),
      borderColor: getChartColorsArray('["--vz-primary-rgb, 0.9"]'),
      borderWidth: 1,
      hoverBackgroundColor: getChartColorsArray('["--vz-primary-rgb, 0.9"]'),
      hoverBorderColor: getChartColorsArray('["--vz-primary-rgb, 0.9"]'),
      data: [65, 59, 81, 45, 56, 80, 50, 20],
    }, ],
  },
  options: {
    x: {
      ticks: {
        font: {
          family: 'Poppins',
        },
      },
    },
    y: {
      ticks: {
        font: {
          family: 'Poppins',
        },
      },
    },
    plugins: {
      legend: {
        labels: {
          font: {
            family: 'Poppins',
          }
        }
      },
    }
  }
};

const PolarArea = {
  type: "polarArea",
  data: {
    labels: ["Series 1", "Series 2", "Series 3", "Series 4"],
    datasets: [{
      data: [11, 16, 7, 18],
      backgroundColor: ["#f46a6a", "#34c38f", "#f1b44c", "#405189"],
      label: "My dataset", // for legend
      hoverBorderColor: "#fff",
    }, ],
  },
  options: {
    maintainAspectRatio: true,
    legend: {
      position: "top",
    },
  },
};

export {
  line,
  pie,
  Doughnut,
  radar,
  bar,
  PolarArea
};