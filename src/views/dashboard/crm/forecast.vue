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
            name: "Goal",
            data: [37],
          },
          {
            name: "Pending Forcast",
            data: [12],
          },
          {
            name: "Revenue",
            data: [18],
          },
        ],
        chartOptions: {
          chart: {
            type: "bar",
            height: 341,
            toolbar: {
              show: false,
            },
          },
          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: "65%",
            },
          },
          stroke: {
            show: true,
            width: 5,
            colors: ["transparent"],
          },
          xaxis: {
            categories: [""],
            axisTicks: {
              show: false,
              borderType: "solid",
              color: "#78909C",
              height: 6,
              offsetX: 0,
              offsetY: 0,
            },
            title: {
              text: "Total Forecasted Value",
              offsetX: 0,
              offsetY: -30,
              style: {
                color: "#78909C",
                fontSize: "12px",
                fontWeight: 400,
              },
            },
          },
          yaxis: {
            labels: {
              formatter: function (value) {
                return "$" + value + "k";
              },
            },
            tickAmount: 4,
            min: 0,
          },
          fill: {
            opacity: 1,
          },
          legend: {
            show: true,
            position: "bottom",
            horizontalAlign: "center",
            fontWeight: 500,
            offsetX: 0,
            offsetY: -14,
            itemMargin: {
              horizontal: 8,
              vertical: 0,
            },
            markers: {
              width: 10,
              height: 10,
            },
          },
          colors: getChartColorsArray('["--vz-primary", "--vz-success", "--vz-warning"]'),
        }
      };
    },
  };
</script>

<template>
  <div class="card">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">Sales Forecast</h4>
      <div class="flex-shrink-0">
        <div class="dropdown card-header-dropdown">
          <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <span class="fw-semibold text-uppercase fs-12">Sort by: </span><span class="text-muted">Nov 2021<i
                class="mdi mdi-chevron-down ms-1"></i></span>
          </a>
          <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="#">Oct 2021</a>
            <a class="dropdown-item" href="#">Nov 2021</a>
            <a class="dropdown-item" href="#">Dec 2021</a>
            <a class="dropdown-item" href="#">Jan 2022</a>
          </div>
        </div>
      </div>
    </div>
    <!-- end card header -->
    <div class="card-body pb-0">
      <apexchart class="apex-charts" height="350" dir="ltr" :series="series" :options="chartOptions"></apexchart>

    </div>
  </div>
  <!-- end card -->
</template>