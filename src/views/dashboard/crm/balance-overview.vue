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
  export default {
    setup() {
      return {
        series: [{
            name: "Revenue",
            data: [20, 25, 30, 35, 40, 55, 70, 110, 150, 180, 210, 250],
          },
          {
            name: "Expenses",
            data: [12, 17, 45, 42, 24, 35, 42, 75, 102, 108, 156, 199],
          },
        ],
        chartOptions: {
          chart: {
            height: 290,
            type: "area",
            toolbar: "false",
          },
          dataLabels: {
            enabled: false,
          },
          stroke: {
            curve: "smooth",
            width: 2,
          },
          xaxis: {
            categories: [
              "Jan",
              "Feb",
              "Mar",
              "Apr",
              "May",
              "Jun",
              "Jul",
              "Aug",
              "Sep",
              "Oct",
              "Nov",
              "Dec",
            ],
          },
          yaxis: {
            labels: {
              formatter: function (value) {
                return "$" + value + "k";
              },
            },
            tickAmount: 5,
            min: 0,
            max: 260,
          },
          colors: getChartColorsArray('["--vz-success", "--vz-danger"]'),
          fill: {
            opacity: 0.06,
            colors: ["#45CB85", "#f06548"],
            type: "solid",
          },
        },
      };
    },
  };
</script>

<template>
  <div class="card card-height-100">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">Balance Overview</h4>
      <div class="flex-shrink-0">
        <div class="dropdown card-header-dropdown">
          <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <span class="fw-semibold text-uppercase fs-12">Sort by: </span><span class="text-muted">Current Year<i
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
    <div class="card-body px-0">
      <ul class="list-inline main-chart text-center mb-0">
        <li class="list-inline-item chart-border-left me-0 border-0">
          <h4 class="text-primary">
            $584k
            <span class="text-muted d-inline-block fs-13 align-middle ms-2">Revenue</span>
          </h4>
        </li>
        <li class="list-inline-item chart-border-left me-0">
          <h4>
            $497k<span class="text-muted d-inline-block fs-13 align-middle ms-2">Expenses</span>
          </h4>
        </li>
        <li class="list-inline-item chart-border-left me-0">
          <h4>
            <span data-plugin="counterup">3.6</span>%<span
              class="text-muted d-inline-block fs-13 align-middle ms-2">Profit Ratio</span>
          </h4>
        </li>
      </ul>

      <apexchart class="apex-charts" height="290" dir="ltr" :series="series" :options="chartOptions"></apexchart>
    </div>
  </div>
  <!-- end card -->
</template>