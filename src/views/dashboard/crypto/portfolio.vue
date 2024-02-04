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
        series: [19405, 40552, 15824, 30635],
        chartOptions: {
          labels: ["Bitcoin", "Ethereum", "Litecoin", "Dash"],
          chart: {
            type: "donut",
            height: 224,
          },
          plotOptions: {
            pie: {
              size: 100,
              offsetX: 0,
              offsetY: 0,
              donut: {
                size: "70%",
                labels: {
                  show: true,
                  name: {
                    show: true,
                    fontSize: "18px",
                    offsetY: -5,
                  },
                  value: {
                    show: true,
                    fontSize: "20px",
                    color: "#343a40",
                    fontWeight: 500,
                    offsetY: 5,
                    formatter: function (val) {
                      return "$" + val;
                    },
                  },
                  total: {
                    show: true,
                    fontSize: "13px",
                    label: "Total value",
                    color: "#9599ad",
                    fontWeight: 500,
                    formatter: function (w) {
                      return (
                        "$" +
                        w.globals.seriesTotals.reduce(function (a, b) {
                          return a + b;
                        }, 0)
                      );
                    },
                  },
                },
              },
            },
          },
          dataLabels: {
            enabled: false,
          },
          legend: {
            show: false,
          },
          yaxis: {
            labels: {
              formatter: function (value) {
                return "$" + value;
              },
            },
          },
          stroke: {
            lineCap: "round",
            width: 2,
          },
          colors: getChartColorsArray('["--vz-primary", "--vz-info", "--vz-warning", "--vz-success"]'),
        },
      };
    },
  };
</script>

<template>
  <div class="card card-height-100">
    <div class="card-header border-0 align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">My Portfolio</h4>
      <div>
        <div class="dropdown">
          <button class="btn btn-soft-primary btn-sm shadow-none" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <span class="text-uppercase">Btc<i class="mdi mdi-chevron-down align-middle ms-1"></i></span>
          </button>
          <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="#">BTC</a>
            <a class="dropdown-item" href="#">USD</a>
            <a class="dropdown-item" href="#">Euro</a>
          </div>
        </div>
      </div>
    </div>
    <!-- end cardheader -->
    <div class="card-body">
      <apexchart class="apex-charts" height="224" dir="ltr" :series="series" :options="chartOptions"></apexchart>

      <ul class="list-group list-group-flush border-dashed mb-0 mt-3 pt-2">
        <li class="list-group-item px-0">
          <div class="d-flex">
            <div class="flex-shrink-0 avatar-xs">
              <span class="avatar-title bg-light p-1 rounded-circle shadow">
                <img src="@/assets/images/svg/crypto-icons/btc.svg" class="img-fluid" alt="" />
              </span>
            </div>
            <div class="flex-grow-1 ms-2">
              <h6 class="mb-1">Bitcoin</h6>
              <p class="fs-12 mb-0 text-muted">
                <i class="mdi mdi-circle fs-10 align-middle text-primary me-1"></i>BTC
              </p>
            </div>
            <div class="flex-shrink-0 text-end">
              <h6 class="mb-1">BTC 0.00584875</h6>
              <p class="text-success fs-12 mb-0">$19,405.12</p>
            </div>
          </div>
        </li>
        <!-- end -->
        <li class="list-group-item px-0">
          <div class="d-flex">
            <div class="flex-shrink-0 avatar-xs">
              <span class="avatar-title bg-light p-1 rounded-circle shadow">
                <img src="@/assets/images/svg/crypto-icons/eth.svg" class="img-fluid" alt="" />
              </span>
            </div>
            <div class="flex-grow-1 ms-2">
              <h6 class="mb-1">Ethereum</h6>
              <p class="fs-12 mb-0 text-muted">
                <i class="mdi mdi-circle fs-10 align-middle text-info me-1"></i>ETH
              </p>
            </div>
            <div class="flex-shrink-0 text-end">
              <h6 class="mb-1">ETH 2.25842108</h6>
              <p class="text-danger fs-12 mb-0">$40552.18</p>
            </div>
          </div>
        </li>
        <!-- end -->
        <li class="list-group-item px-0">
          <div class="d-flex">
            <div class="flex-shrink-0 avatar-xs">
              <span class="avatar-title bg-light p-1 rounded-circle shadow">
                <img src="@/assets/images/svg/crypto-icons/ltc.svg" class="img-fluid" alt="" />
              </span>
            </div>
            <div class="flex-grow-1 ms-2">
              <h6 class="mb-1">Litecoin</h6>
              <p class="fs-12 mb-0 text-muted">
                <i class="mdi mdi-circle fs-10 align-middle text-warning me-1"></i>LTC
              </p>
            </div>
            <div class="flex-shrink-0 text-end">
              <h6 class="mb-1">LTC 10.58963217</h6>
              <p class="text-success fs-12 mb-0">$15824.58</p>
            </div>
          </div>
        </li>
        <!-- end -->
        <li class="list-group-item px-0 pb-0">
          <div class="d-flex">
            <div class="flex-shrink-0 avatar-xs">
              <span class="avatar-title bg-light p-1 rounded-circle shadow">
                <img src="@/assets/images/svg/crypto-icons/dash.svg" class="img-fluid" alt="" />
              </span>
            </div>
            <div class="flex-grow-1 ms-2">
              <h6 class="mb-1">Dash</h6>
              <p class="fs-12 mb-0 text-muted">
                <i class="mdi mdi-circle fs-10 align-middle text-success me-1"></i>DASH
              </p>
            </div>
            <div class="flex-shrink-0 text-end">
              <h6 class="mb-1">DASH 204.28565885</h6>
              <p class="text-success fs-12 mb-0">$30635.84</p>
            </div>
          </div>
        </li>
        <!-- end -->
      </ul>
      <!-- end -->
    </div>
    <!-- end card body -->
  </div>
  <!-- end card -->
</template>