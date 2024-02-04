// Basic Polar Area
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
const basicPolarareaChart = {
  series: [14, 23, 21, 17, 15, 10, 12, 17, 21],
  chartOptions: {
    chart: {
      type: "polarArea",
      width: 400,
    },
    labels: [
      "Series A",
      "Series B",
      "Series C",
      "Series D",
      "Series E",
      "Series F",
      "Series G",
      "Series H",
      "Series I",
    ],
    stroke: {
      colors: ["#fff"],
    },
    fill: {
      opacity: 0.8,
    },

    legend: {
      position: "bottom",
    },
    colors: getChartColorsArray('["--vz-primary", "--vz-success", "--vz-warning","--vz-danger", "--vz-info", "--vz-success", "--vz-primary", "--vz-dark", "--vz-secondary"]'),
  },
};

// Polar-Area Monochrome Charts

const polarAreaMonochromeChart = {
  series: [42, 47, 52, 58, 65],
  chartOptions: {
    chart: {
      width: 400,
      type: "polarArea",
    },
    labels: ["Rose A", "Rose B", "Rose C", "Rose D", "Rose E"],
    fill: {
      opacity: 1,
    },
    stroke: {
      width: 1,
      colors: undefined,
    },
    yaxis: {
      show: false,
    },
    legend: {
      position: "bottom",
    },
    plotOptions: {
      polarArea: {
        rings: {
          strokeWidth: 0,
        },
        spokes: {
          strokeWidth: 0,
        },
      },
    },
    theme: {
      mode: "light",
      palette: "palette1",
      monochrome: {
        enabled: true,
        shadeTo: "light",
        color: "#405189",
        shadeIntensity: 0.6,
      },
    },
  },
};

export { basicPolarareaChart, polarAreaMonochromeChart };
