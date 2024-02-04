<script>
  function getChartColorsArray(colors) {
    colors = JSON.parse(colors);
    return colors.map(function (value) {
      var newValue = value.replace(" ", "");
      if (newValue.indexOf(",") === -1) {
        var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);
        if (color) {
          color = color.replace(" ", "");
          return color;
        } else return newValue;
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

  function generateData(count, yrange) {
    var i = 0;
    var series = [];
    while (i < count) {
      var x = (i + 1).toString() + "h";
      var y =
        Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

      series.push({
        x: x,
        y: y,
      });
      i++;
    }
    return series;
  }
  export default {
    data() {
      return {
        series: [{
            name: "Sat",
            data: generateData(18, {
              min: 0,
              max: 90,
            }),
          },
          {
            name: "Fri",
            data: generateData(18, {
              min: 0,
              max: 90,
            }),
          },
          {
            name: "Thu",
            data: generateData(18, {
              min: 0,
              max: 90,
            }),
          },
          {
            name: "Wed",
            data: generateData(18, {
              min: 0,
              max: 90,
            }),
          },
          {
            name: "Tue",
            data: generateData(18, {
              min: 0,
              max: 90,
            }),
          },
          {
            name: "Mon",
            data: generateData(18, {
              min: 0,
              max: 90,
            }),
          },
          {
            name: "Sun",
            data: generateData(18, {
              min: 0,
              max: 90,
            }),
          },
        ],
        chartOptions: {
          chart: {
            height: 430,
            type: "heatmap",
            offsetX: 0,
            offsetY: -8,
            toolbar: {
              show: false,
            },
          },
          dataLabels: {
            enabled: false,
          },
          legend: {
            show: true,
            horizontalAlign: "center",
            offsetX: 0,
            offsetY: 20,
            markers: {
              width: 20,
              height: 6,
              radius: 2,
            },
            itemMargin: {
              horizontal: 12,
              vertical: 0,
            },
          },
          colors: getChartColorsArray('["--vz-success", "--vz-info"]'),
          tooltip: {
            y: [{
              formatter: function (y) {
                if (typeof y !== "undefined") {
                  return y.toFixed(0) + "k";
                }
                return y;
              },
            }, ],
          },
        },
      };
    },
  };
</script>

<template>
  <div class="card card-height-100">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">Audiences Sessions by Country</h4>
      <div class="flex-shrink-0">
        <div class="dropdown card-header-dropdown">
          <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <span class="fw-semibold text-uppercase fs-12">Sort by: </span><span class="text-muted">Current Week<i
                class="mdi mdi-chevron-down ms-1"></i></span>
          </a>
          <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="#">Today</a>
            <a class="dropdown-item" href="#">Last Week</a>
            <a class="dropdown-item" href="#">Last Month</a>
            <a class="dropdown-item" href="#">Current Year</a>
          </div>
        </div>
      </div>
    </div>
    <!-- end card header -->
    <div class="card-body p-0">
      <div>
        <apexchart class="apex-charts" height="390" dir="ltr" :series="series" :options="chartOptions"></apexchart>
      </div>
    </div>
    <!-- end cardbody -->
  </div>
  <!-- end card -->
</template>