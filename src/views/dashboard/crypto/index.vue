<script>
import Layout from "../../../layouts/main.vue";
import PageHeader from "@/components/page-header";
import appConfig from "../../../../app.config";

import SwiperCore, { Thumbs, Pagination, Navigation } from "swiper";
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/swiper-bundle.css";

SwiperCore.use([Thumbs, Pagination, Navigation]);

import Portfolio from "./portfolio.vue";
import MarketGraph from "./market-graph.vue";
import News from "./news.vue";
import RecentActivity from "./recent-activity.vue";
import TopProgram from "./top-performers.vue";
import Currencies from "./currencies.vue";
import Trading from "./trading.vue";

export default {
  page: {
    title: "Crypto",
    meta: [{ name: "description", content: appConfig.description }],
  },
  data() {
    return {
      title: "Crypto",
      items: [
        {
          text: "Dashboards",
          href: "/",
        },
        {
          text: "Crypto",
          active: true,
        },
      ],
      chartcolors: {
        colors: ["#f17171"],
      },
      cyptoWidgets: [
        {
          id: 1,
          icon: "ri-money-dollar-circle-fill",
          label: "Total Invested",
          counter: "2390.68",
          badge: "ri-arrow-up-s-fill",
          badgeColor: "success",
          percentage: "6.24",
        },
        {
          id: 2,
          icon: "ri-arrow-up-circle-fill",
          label: "Total Change",
          counter: "19523.25",
          badge: "ri-arrow-up-s-fill",
          badgeColor: "success",
          percentage: "3.67",
        },
        {
          id: 3,
          icon: "ri-arrow-down-circle-fill",
          label: "Day Change",
          counter: "14799.44",
          badge: "ri-arrow-down-s-fill",
          badgeColor: "danger",
          percentage: "4.80",
        },
      ],
      cryptoSlider: [
        {
          id: 1,
          img: require("@/assets/images/svg/crypto-icons/btc.svg"),
          label: "Bitcoin",
          price: "$1,523,647",
          change: "+13.11%",
          changeClass: "success",
          coinName: "btc",
          chartsColor: "#0ab39c",
          chartOptions: {
            chart: {
              width: "100%",
              height: 46,
              type: "area",
              sparkline: {
                enabled: true,
              },
              toolbar: {
                show: false,
              },
            },
            dataLabels: {
              enabled: false,
            },
            stroke: {
              curve: "smooth",
              width: 1.5,
            },
            fill: {
              type: "gradient",
              gradient: {
                shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.45,
                opacityTo: 0.05,
                stops: [50, 100, 100, 100],
              },
            },
            colors: ["#0ab39c"],
          },
          series: [
            {
              name: "Bitcoin",
              data: [85, 68, 35, 90, 8, 11, 26, 54],
            },
          ],
        },
        {
          id: 2,
          img: require("@/assets/images/svg/crypto-icons/ltc.svg"),
          label: "Litecoin",
          price: "$2,145,687",
          change: "+15.08%",
          changeClass: "success",
          coinName: "ltc",
          chartsColor: "#0ab39c",
          chartOptions: {
            chart: {
              width: "100%",
              height: 46,
              type: "area",
              sparkline: {
                enabled: true,
              },
              toolbar: {
                show: false,
              },
            },
            dataLabels: {
              enabled: false,
            },
            stroke: {
              curve: "smooth",
              width: 1.5,
            },
            fill: {
              type: "gradient",
              gradient: {
                shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.45,
                opacityTo: 0.05,
                stops: [50, 100, 100, 100],
              },
            },
            colors: ["#0ab39c"],
          },
          series: [
            {
              name: "Litecoin",
              data: [25, 50, 41, 87, 12, 36, 9, 54],
            },
          ],
        },
        {
          id: 3,
          img: require("@/assets/images/svg/crypto-icons/eth.svg"),
          label: "Eathereum",
          price: "$3,312,870",
          change: "+08.57%",
          changeClass: "success",
          coinName: "etc",
          chartsColor: "#0ab39c",
          chartOptions: {
            chart: {
              width: "100%",
              height: 46,
              type: "area",
              sparkline: {
                enabled: true,
              },
              toolbar: {
                show: false,
              },
            },
            dataLabels: {
              enabled: false,
            },
            stroke: {
              curve: "smooth",
              width: 1.5,
            },
            fill: {
              type: "gradient",
              gradient: {
                shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.45,
                opacityTo: 0.05,
                stops: [50, 100, 100, 100],
              },
            },
            colors: ["#0ab39c"],
          },
          series: [
            {
              name: "Eathereum",
              data: [36, 21, 65, 22, 35, 50, 29, 44],
            },
          ],
        },
        {
          id: 4,
          img: require("@/assets/images/svg/crypto-icons/bnb.svg"),
          label: "Binance",
          price: "$1,820,045",
          change: "-09.21%",
          changeClass: "danger",
          coinName: "bnb",
          chartsColor: "#F06548",
          chartOptions: {
            chart: {
              width: "100%",
              height: 46,
              type: "area",
              sparkline: {
                enabled: true,
              },
              toolbar: {
                show: false,
              },
            },
            dataLabels: {
              enabled: false,
            },
            stroke: {
              curve: "smooth",
              width: 1.5,
            },
            fill: {
              type: "gradient",
              gradient: {
                shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.45,
                opacityTo: 0.05,
                stops: [50, 100, 100, 100],
              },
            },
            colors: ["#F06548"],
          },
          series: [
            {
              name: "Binance",
              data: [30, 58, 29, 89, 12, 36, 9, 54],
            },
          ],
        },
        {
          id: 5,
          img: require("@/assets/images/svg/crypto-icons/dash.svg"),
          label: "Dash",
          price: "$9,458,153",
          change: "+12.07%",
          changeClass: "success",
          coinName: "dash",
          chartsColor: "#0ab39c",
          chartOptions: {
            chart: {
              width: "100%",
              height: 46,
              type: "area",
              sparkline: {
                enabled: true,
              },
              toolbar: {
                show: false,
              },
            },
            dataLabels: {
              enabled: false,
            },
            stroke: {
              curve: "smooth",
              width: 1.5,
            },
            fill: {
              type: "gradient",
              gradient: {
                shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.45,
                opacityTo: 0.05,
                stops: [50, 100, 100, 100],
              },
            },
            colors: ["#0ab39c"],
          },
          series: [
            {
              name: "Dash",
              data: [24, 68, 39, 86, 29, 42, 11, 58],
            },
          ],
        },
        {
          id: 6,
          img: require("@/assets/images/svg/crypto-icons/usdt.svg"),
          label: "Tether",
          price: "$5,201,458",
          change: "+14.99%",
          changeClass: "success",
          coinName: "usdt",
          chartsColor: "#0ab39c",
          chartOptions: {
            chart: {
              width: "100%",
              height: 46,
              type: "area",
              sparkline: {
                enabled: true,
              },
              toolbar: {
                show: false,
              },
            },
            dataLabels: {
              enabled: false,
            },
            stroke: {
              curve: "smooth",
              width: 1.5,
            },
            fill: {
              type: "gradient",
              gradient: {
                shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.45,
                opacityTo: 0.05,
                stops: [50, 100, 100, 100],
              },
            },
            colors: ["#0ab39c"],
          },
          series: [
            {
              name: "Dash",
              data: [13, 76, 12, 85, 25, 60, 9, 54],
            },
          ],
        },
        {
          id: 7,
          img: require("@/assets/images/svg/crypto-icons/neo.svg"),
          label: "NEO",
          price: "$6,147,957",
          change: "-05.07%",
          changeClass: "danger",
          coinName: "neo",
          chartsColor: "#F06548",
          chartOptions: {
            chart: {
              width: "100%",
              height: 46,
              type: "area",
              sparkline: {
                enabled: true,
              },
              toolbar: {
                show: false,
              },
            },
            dataLabels: {
              enabled: false,
            },
            stroke: {
              curve: "smooth",
              width: 1.5,
            },
            fill: {
              type: "gradient",
              gradient: {
                shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.45,
                opacityTo: 0.05,
                stops: [50, 100, 100, 100],
              },
            },
            colors: ["#F06548"],
          },
          series: [
            {
              name: "Neo",
              data: [9, 66, 41, 89, 12, 36, 25, 54],
            },
          ],
        },
      ],
      chartOptions: {
        chart: {
          width: 130,
          height: 46,
          type: "area",
          sparkline: {
            enabled: true,
          },
          toolbar: {
            show: false,
          },
        },
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: "smooth",
          width: 1.5,
        },
        fill: {
          type: "gradient",
          gradient: {
            shadeIntensity: 1,
            inverseColors: false,
            opacityFrom: 0.45,
            opacityTo: 0.05,
            stops: [50, 100, 100, 100],
          },
        },
        colors: ["#4b38b3"],
      },
    };
  },
  components: {
    Layout,
    PageHeader,
    Portfolio,
    MarketGraph,
    RecentActivity,
    TopProgram,
    News,
    Currencies,
    Trading,
    Swiper,
    SwiperSlide,
  },
};
</script>

<template>
  <Layout>
    <PageHeader :title="title" :items="items" />

    <div class="row">
      <div class="col-xxl-3">
        <Portfolio />
      </div>
      <!-- end col -->

      <div class="col-xxl-9 order-xxl-0 order-first">
        <div class="row">
          <div
            class="col-lg-4 col-md-6"
            v-for="(item, index) of cyptoWidgets"
            :key="index"
          >
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="avatar-sm flex-shrink-0">
                    <span
                      class="avatar-title bg-light text-primary rounded-circle shadow fs-3"
                    >
                      <i :class="`${item.icon} align-middle`"></i>
                    </span>
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">
                      {{ item.label }}
                    </p>
                    <h4 class="mb-0">
                      $
                      <span class="counter-value">
                        {{ item.counter }}
                      </span>
                    </h4>
                  </div>
                  <div class="flex-shrink-0 align-self-end">
                    <span :class="`badge badge-soft-${item.badgeColor}`">
                      <i :class="`${item.badge} align-middle me-1`"></i>
                      {{ item.percentage }} %
                      <span></span>
                    </span>
                  </div>
                </div>
              </div>
              <!-- end card body -->
            </div>
            <!-- end card -->
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->

        <div class="row">
          <div class="col-xl-12">
            <MarketGraph />
            <!-- end card -->
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
      <div class="col-lg-12">
        <swiper
          class="cryptoSlider"
          :slidesPerView="1"
          :loop="false"
          :spaceBetween="24"
          :navigation="{
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          }"
          :autoplay="{
            delay: 2500,
            disableOnInteraction: false,
          }"
          :breakpoints="{
            640: {
              slidesPerView: 2,
            },
            768: {
              slidesPerView: 2.5,
            },
            1024: {
              slidesPerView: 3,
            },
            1200: {
              slidesPerView: 5,
            },
          }"
        >
          <template v-for="(item, index) of cryptoSlider" :key="index">
            <swiper-slide>
              <div class="card">
                <div class="card-body">
                  <div class="float-end">
                    <div class="dropdown">
                      <a
                        class="text-reset"
                        href="#"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        <span class="text-muted fs-18">
                          <i class="mdi mdi-dots-horizontal"></i>
                        </span>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Details</a>
                        <a class="dropdown-item" href="#">Cancel</a>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex align-items-center">
                    <img
                      :src="item.img"
                      class="bg-light rounded-circle p-1 avatar-xs img-fluid shadow"
                      alt
                    />
                    <h6 class="ms-2 mb-0 fs-14">{{ item.label }}</h6>
                  </div>
                  <div class="row align-items-end g-0">
                    <div class="col-6">
                      <h5 class="mb-1 mt-4">{{ item.price }}</h5>
                      <p class="text-success fs-13 fw-medium mb-0">
                        {{ item.change }}
                        <span class="text-muted ms-2 fs-10 text-uppercase"
                          >({{ item.coinName }})</span
                        >
                      </p>
                    </div>
                    <!-- end col -->
                    <div class="col-6">
                      <apexchart
                        class="apex-charts"
                        :options="item.chartOptions"
                        height="50"
                        dir="ltr"
                        :series="item.series.length > 0 ? item.series : []"
                        :key="item.id"
                      ></apexchart>
                    </div>
                    <!-- end col -->
                  </div>
                  <!-- end row -->
                </div>
                <!-- end card body -->
              </div>
              <!-- end card -->
            </swiper-slide>
            <!-- end -->
          </template>
        </swiper>
        <!-- end swiper -->
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
      <div class="col-xl-8">
        <Currencies />
      </div>
      <div class="col-xl-4">
        <Trading />
      </div>
    </div>

    <div class="row">
      <div class="col-xxl-4 col-lg-6">
        <RecentActivity />
      </div>
      <div class="col-xxl-4 col-lg-6">
        <TopProgram />
      </div>
      <div class="col-xxl-4 col-lg-6">
        <News />
      </div>
    </div>
  </Layout>
</template>
