<script>
  import {
    UsersIcon
  } from '@zhuowenli/vue-feather-icons'

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
        series: [78.56, 105.02, 42.89],
        chartOptions: {
          labels: ["Desktop", "Mobile", "Tablet"],
          chart: {
            type: "donut",
            height: 219,
          },
          plotOptions: {
            pie: {
              size: 100,
              donut: {
                size: "76%",
              },
            },
          },
          dataLabels: {
            enabled: false,
          },
          legend: {
            show: false,
            position: "bottom",
            horizontalAlign: "center",
            offsetX: 0,
            offsetY: 0,
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
          stroke: {
            width: 0,
          },
          yaxis: {
            labels: {
              formatter: function (value) {
                return value + "k" + " Users";
              },
            },
            tickAmount: 4,
            min: 0,
          },
          colors: getChartColorsArray('["--vz-primary", "--vz-warning", "--vz-info"]'),
        },
      };
    },
    components: {
      UsersIcon
    }
  };
</script>

<template>
  <div class="card card-height-100">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">Users by Device</h4>
      <div class="flex-shrink-0">
        <div class="dropdown card-header-dropdown">
          <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <span class="text-muted fs-16"><i class="mdi mdi-dots-vertical align-middle"></i></span>
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
    <div class="card-body">
      <apexchart class="apex-charts" dir="ltr" height="219" :series="series" :options="chartOptions"></apexchart>

      <div class="table-responsive mt-3">
        <table class="table table-borderless table-sm table-centered align-middle table-nowrap mb-0">
          <tbody class="border-0">
            <tr>
              <td>
                <h4 class="text-truncate fs-14 fs-medium mb-0">
                  <i class="ri-stop-fill align-middle fs-18 text-primary me-2"></i>Desktop Users
                </h4>
              </td>
              <td>
                <p class="text-muted mb-0">
                  <UsersIcon class="me-2 icon-sm"></UsersIcon>78.56k
                </p>
              </td>
              <td class="text-end">
                <p class="text-success fw-medium fs-12 mb-0">
                  <i class="ri-arrow-up-s-fill fs-5 align-middle"></i>2.08%
                </p>
              </td>
            </tr>
            <tr>
              <td>
                <h4 class="text-truncate fs-14 fs-medium mb-0">
                  <i class="ri-stop-fill align-middle fs-18 text-warning me-2"></i>Mobile Users
                </h4>
              </td>
              <td>
                <p class="text-muted mb-0">
                  <UsersIcon class="me-2 icon-sm"></UsersIcon>105.02k
                </p>
              </td>
              <td class="text-end">
                <p class="text-danger fw-medium fs-12 mb-0">
                  <i class="ri-arrow-down-s-fill fs-5 align-middle"></i>10.52%
                </p>
              </td>
            </tr>
            <tr>
              <td>
                <h4 class="text-truncate fs-14 fs-medium mb-0">
                  <i class="ri-stop-fill align-middle fs-18 text-info me-2"></i>Tablet Users
                </h4>
              </td>
              <td>
                <p class="text-muted mb-0">
                  <UsersIcon class="me-2 icon-sm"></UsersIcon>42.89k
                </p>
              </td>
              <td class="text-end">
                <p class="text-danger fw-medium fs-12 mb-0">
                  <i class="ri-arrow-down-s-fill fs-5 align-middle"></i>7.36%
                </p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- end card body -->
  </div>
  <!-- end card -->
</template>