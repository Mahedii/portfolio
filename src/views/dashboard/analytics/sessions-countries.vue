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
          data: [1010, 1640, 490, 1255, 1050, 689, 800, 420, 1085, 589],
          name: "Sessions",
        }, ],
        chartOptions: {
          chart: {
            type: "bar",
            height: 436,
            toolbar: {
              show: false,
            },
          },
          plotOptions: {
            bar: {
              borderRadius: 4,
              horizontal: true,
              distributed: true,
              dataLabels: {
                position: "top",
              },
            },
          },

          colors: getChartColorsArray('["--vz-success", "--vz-gray-300"]'),
          dataLabels: {
            enabled: true,
            offsetX: 32,
            style: {
              fontSize: "12px",
              fontWeight: 400,
              colors: ["#adb5bd"],
            },
          },

          legend: {
            show: false,
          },
          grid: {
            show: false,
          },
          xaxis: {
            categories: [
              "India",
              "United States",
              "China",
              "Indonesia",
              "Russia",
              "Bangladesh",
              "Canada",
              "Brazil",
              "Vietnam",
              "UK",
            ],
          },
        },
      };
    },
  };
</script>

<template>
  <div class="card card-height-100">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">Sessions by Countries</h4>
      <div>
        <button type="button" class="btn btn-soft-secondary btn-sm me-1 shadow-none">ALL</button>
        <button type="button" class="btn btn-soft-primary btn-sm me-1 shadow-none">1M</button>
        <button type="button" class="btn btn-soft-secondary btn-sm shadow-none">6M</button>
      </div>
    </div>
    <div class="card-body p-0">
      <div>
        <apexchart class="apex-charts" dir="ltr" height="436" :series="series" :options="chartOptions"></apexchart>
      </div>
    </div>
    <!-- end card body -->
  </div>
  <!-- end card -->
</template>