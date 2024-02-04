<script>
  import {
    CountTo
  } from "vue3-count-to";

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
            name: "Last Year",
            data: [
              25.3, 12.5, 20.2, 18.5, 40.4, 25.4, 15.8, 22.3, 19.2, 25.3, 12.5,
              20.2,
            ],
          },
          {
            name: "Current Year",
            data: [
              36.2, 22.4, 38.2, 30.5, 26.4, 30.4, 20.2, 29.6, 10.9, 36.2, 22.4,
              38.2,
            ],
          },
        ],
        chartOptions: {
          chart: {
            type: "bar",
            height: 309,
            stacked: true,
            toolbar: {
              show: false,
            },
          },
          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: "20%",
              borderRadius: 6,
            },
          },
          dataLabels: {
            enabled: false,
          },
          legend: {
            show: true,
            position: "bottom",
            horizontalAlign: "center",
            fontWeight: 400,
            fontSize: "8px",
            offsetX: 0,
            offsetY: 0,
            markers: {
              width: 9,
              height: 9,
              radius: 4,
            },
          },
          stroke: {
            show: true,
            width: 2,
            colors: ["transparent"],
          },
          grid: {
            show: false,
          },
          colors: getChartColorsArray('["--vz-success", "--vz-gray-300"]'),
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
            axisTicks: {
              show: false,
            },
            axisBorder: {
              show: true,
              strokeDashArray: 1,
              height: 1,
              width: "100%",
              offsetX: 0,
              offsetY: 0,
            },
          },
          yaxis: {
            show: false,
          },
          fill: {
            opacity: 1,
          },
        },
      };
    },
    components: {
      CountTo
    }
  };
</script>

<template>
  <div class="card">
    <div class="card-header border-0 align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">Audiences Metrics</h4>
      <div>
        <button type="button" class="btn btn-soft-secondary btn-sm me-1 shadow-none">ALL</button>
        <button type="button" class="btn btn-soft-secondary btn-sm me-1 shadow-none">1M</button>
        <button type="button" class="btn btn-soft-secondary btn-sm me-1 shadow-none">6M</button>
        <button type="button" class="btn btn-soft-primary btn-sm shadow-none">1Y</button>
      </div>
    </div>
    <!-- end card header -->
    <div class="card-header p-0 border-0 bg-soft-light">
      <div class="row g-0 text-center">
        <div class="col-6 col-sm-4">
          <div class="p-3 border border-dashed border-start-0">
            <h5 class="mb-1">
              <count-to :startVal='0' :endVal='854' :duration='5000'></count-to>
              <span class="text-success ms-1 fs-12">49%<i class="ri-arrow-right-up-line ms-1 align-middle"></i></span>
            </h5>
            <p class="text-muted mb-0">Avg. Session</p>
          </div>
        </div>
        <!--end col-->
        <div class="col-6 col-sm-4">
          <div class="p-3 border border-dashed border-start-0">
            <h5 class="mb-1">
              <count-to :startVal='0' :endVal='1278' :duration='4000'></count-to>
              <span class="text-success ms-1 fs-12">60%<i class="ri-arrow-right-up-line ms-1 align-middle"></i></span>
            </h5>
            <p class="text-muted mb-0">Conversion Rate</p>
          </div>
        </div>
        <!--end col-->
        <div class="col-6 col-sm-4">
          <div class="p-3 border border-dashed border-start-0 border-end-0">
            <h5 class="mb-1">
              <count-to :startVal='0' :endVal='3' :duration='4000'></count-to>m
              <count-to :startVal='0' :endVal='40' :duration='4000'></count-to>sec
              <span class="text-success ms-1 fs-12">37%<i class="ri-arrow-right-up-line ms-1 align-middle"></i></span>
            </h5>
            <p class="text-muted mb-0">Avg. Session Duration</p>
          </div>
        </div>
        <!--end col-->
      </div>
    </div>
    <!-- end card header -->
    <div class="card-body p-0 pb-2">
      <div>
        <apexchart class="apex-charts" dir="ltr" :series="series" :options="chartOptions" height="309"></apexchart>
      </div>
    </div>
    <!-- end card body -->
  </div>
  <!-- end card -->
</template>