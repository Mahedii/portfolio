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
            name: "Pending",
            data: [80, 50, 30, 40, 100, 20],
          },
          {
            name: "Loss",
            data: [20, 30, 40, 80, 20, 80],
          },
          {
            name: "Won",
            data: [44, 76, 78, 13, 43, 10],
          },
        ],
        chartOptions: {
          chart: {
            height: 341,
            type: "radar",
            dropShadow: {
              enabled: true,
              blur: 1,
              left: 1,
              top: 1,
            },
            toolbar: {
              show: false,
            },
          },
          stroke: {
            width: 2,
          },
          fill: {
            opacity: 0.2,
          },
          legend: {
            show: true,
            fontWeight: 500,
            offsetX: 0,
            offsetY: -8,
            markers: {
              width: 8,
              height: 8,
              radius: 6,
            },
            itemMargin: {
              horizontal: 10,
              vertical: 0,
            },
          },
          markers: {
            size: 0,
          },
          colors: getChartColorsArray('["--vz-warning", "--vz-danger", "--vz-success"]'),
          xaxis: {
            categories: ["2016", "2017", "2018", "2019", "2020", "2021"],
          },
        },
      };
    },
  };
</script>

<template>
  <div class="card card-height-100">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">Deal Type</h4>
      <div class="flex-shrink-0">
        <div class="dropdown card-header-dropdown">
          <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <span class="fw-semibold text-uppercase fs-12">Sort by: </span><span class="text-muted">Monthly<i
                class="mdi mdi-chevron-down ms-1"></i></span>
          </a>
          <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="#">Today</a>
            <a class="dropdown-item" href="#">Weekly</a>
            <a class="dropdown-item" href="#">Monthly</a>
            <a class="dropdown-item" href="#">Yearly</a>
          </div>
        </div>
      </div>
    </div>
    <!-- end card header -->
    <div class="card-body pb-0">
      <apexchart class="apex-charts" height="341" dir="ltr" :series="series" :options="chartOptions"></apexchart>
    </div>
    <!-- end card body -->
  </div>
  <!-- end card -->
</template>