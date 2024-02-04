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

    import {
  CountTo
} from "vue3-count-to";

export default {
    components: {
    CountTo,
    },
    setup() {
      return {
        series: [{
            name: "Artwork",
            data: [10, 41, 35, 51, 49, 62, 69, 91, 148],
          },
          {
            name: "Auction",
            data: [40, 120, 83, 45, 31, 74, 35, 34, 78],
          },
          {
            name: "Creators",
            data: [95, 35, 20, 130, 64, 22, 43, 45, 31],
          },
        ],
        chartOptions: {
          chart: {
            height: 100,
            type: "area",
            toolbar: "false",
          },
          dataLabels: {
            enabled: false,
          },
          stroke: {
            curve: "smooth",
            width: 3,
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
            ],
          },
          yaxis: {
            labels: {
              formatter: function (value) {
                return value;
              },
            },
            tickAmount: 5,
            min: 0,
            max: 150,
          },
          colors: getChartColorsArray('["--vz-primary", "--vz-success","--vz-gray-400"]'),
          fill: {
            opacity: 0,
            colors: ["#0AB39C", "#F06548"],
            type: "solid",
          },
        },
      };
    },
    mounted(){
         // Set the date we're counting down to
    var countDownDate = new Date("Jan 1, 2023").getTime();

// Update the count down every 1 second
var countDown = setInterval(function () {

    // Get today's date and time
    var currentTime = new Date().getTime();

    // Find the distance between currentTime and the count down date
    var distance = countDownDate - currentTime;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    var countDownBlock = '<div class="countdownlist-item">'+
                            '<div class="count-title">Days</div>'+'<div class="count-num">'+ days +'</div>'+
                        '</div>'+
                        '<div class="countdownlist-item">'+
                            '<div class="count-title">Hours</div>'+'<div class="count-num">'+ hours +'</div>'+
                        '</div>'+
                        '<div class="countdownlist-item">'+
                            '<div class="count-title">Minutes</div>'+'<div class="count-num">'+ minutes +'</div>'+
                        '</div>'+
                        '<div class="countdownlist-item">'+
                            '<div class="count-title">Seconds</div>'+'<div class="count-num">'+ seconds +'</div>'+
                        '</div>';

    // Output the result in an element with id="countDownBlock"
    if(document.getElementById("countdown")){
    document.getElementById("countdown").innerHTML = countDownBlock;
}
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(countDown);
        document.getElementById("countdown").innerHTML = '<div class="countdown-endtxt">The countdown has ended!</div>';
    }
}, 1000);

    }
    }
</script>

<template>
 <div class="card">
    <div class="card-body p-0">
        <div class="row g-0">
            <div class="col-xxl-8">
                <div class="">
                    <div class="card-header border-0 align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Marketplace</h4>
                        <div>
                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                ALL
                            </button>
                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                1M
                            </button>
                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                6M
                            </button>
                            <button type="button" class="btn btn-soft-primary btn-sm">
                                1Y
                            </button>
                        </div>
                    </div><!-- end card header -->
                    <div class="row g-0 text-center">
                        <div class="col-6 col-sm-4">
                            <div class="p-3 border border-dashed border-start-0">
                                <h5 class="mb-1">
                                    <count-to :startVal='0' :endVal='36' :duration='5000'></count-to>k</h5>
                                <p class="text-muted mb-0">Aetworks</p>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-6 col-sm-4">
                            <div class="p-3 border border-dashed border-start-0">
                                <h5 class="mb-1"><count-to :startVal='0' :endVal='92' :duration='5000'></count-to>k</h5>
                                <p class="text-muted mb-0">Auction</p>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-6 col-sm-4">
                            <div class="p-3 border border-dashed border-end-0">
                                <h5 class="mb-1"><count-to :startVal='0' :endVal='8' :duration='5000'></count-to>k</h5>
                                <p class="text-muted mb-0">Creators</p>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <apexchart class="apex-charts" height="350" dir="ltr" :series="series" :options="chartOptions"></apexchart>
                </div>
            </div>

            <div class="col-xxl-4">
                <div class="border-start p-4 h-100 d-flex flex-column">

                    <div class="w-100">
                        <div class="d-flex align-items-center">
                            <img src="@/assets/images/nft/gif/img-2.gif" class="img-fluid avatar-xs rounded-circle object-cover" alt="">
                            <div class="ms-3 flex-grow-1">
                                <h5 class="fs-16 mb-1 fw-bold">Trendy Fashion Portraits</h5>
                                <p class="text-muted mb-0">Artwork</p>
                            </div>
                            <div class="dropdown">
                                <a href="javascript:void(0);" class="align-middle text-muted" role="button" id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-share-line fs-18"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton5">
                                    <li>
                                        <a href="#" class="dropdown-item">
                                            <i class="ri-twitter-fill text-primary align-bottom me-1"></i> Twitter
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item">
                                            <i class="ri-facebook-circle-fill text-info align-bottom me-1"></i> Facebook
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item">
                                            <i class="ri-google-fill text-danger align-bottom me-1"></i> Google
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <h3 class="ff-secondary fw-bold mt-4"><i class="mdi mdi-ethereum text-primary"></i> 346.12 ETH</h3>
                        <p class="text-success mb-3">+586.85 (40.6%)</p>

                        <p class="text-muted">NFT art is a digital asset that is collectable, unique, and non-transferrable, Cortes explained Every NFT is unique duplicated.</p>

                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <p class="fs-14 text-muted mb-1">Current Bid</p>
                                <h4 class="fs-20 ff-secondary fw-semibold mb-0">342.74 ETH</h4>
                            </div>

                            <div>
                                <p class="fs-14 text-muted mb-1">Highest Bid</p>
                                <h4 class="fs-20 ff-secondary fw-semibold mb-0">346.67 ETH</h4>
                            </div>
                        </div>

                        <div class="dash-countdown mt-4 pt-1">
                            <div id="countdown" class="countdownlist"></div>
                        </div>

                        <div class="row mt-4 pt-2">
                            <div class="col">
                                <b-link href="/apps/nft-item-detail" class="btn btn-primary w-100">View Details</b-link>
                            </div>
                            <div class="col">
                                <button class="btn btn-info w-100">Bid Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>