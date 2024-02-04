<script>
import Layout from "../../../../layouts/main.vue";
import appConfig from "../../../../../app.config";
import PageHeader from "@/components/page-header";

import {
  basicCandlestickChart,
  comboCandlestickBrushChart,
  comboCandlestickChart,
  categoryXaxisChart,
} from "./data";

/**
 * Candlestick Charts component
 */
export default {
  page: {
    title: "Candlestick Charts",
    meta: [
      {
        name: "description",
        content: appConfig.description,
      },
    ],
  },
  components: {
    Layout,
    PageHeader
  },
  data() {
    return {
      basicCandlestickChart: basicCandlestickChart,
      comboCandlestickBrushChart: comboCandlestickBrushChart,
      comboCandlestickChart: comboCandlestickChart,
      categoryXaxisChart: categoryXaxisChart,
      title: "Candlestick Charts",
      items: [
        {
          text: "Apexcharts",
          href: "/",
        },
        {
          text: "Candlestick Charts",
          active: true,
        },
      ],
    };
  },
};
</script>

<template>
  <Layout>
    <PageHeader :title="title" :items="items" />
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div
            class="
              card-header
              justify-content-between
              d-flex
              align-items-center
            "
          >
            <h4 class="card-title">Basic Candlestick Chart</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="basicCandlestickChart.series"
              :options="basicCandlestickChart.chartOptions"
            ></apexchart>
          </div>
        </div>
        <!--end card-->
      </div>
      <!-- end col -->
      <div class="col-lg-6">
        <div class="card">
          <div
            class="
              card-header
              justify-content-between
              d-flex
              align-items-center
            "
          >
            <h4 class="card-title">
              Candlestick Synced with Brush Chart (Combo)
            </h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="200"
              dir="ltr"
              :series="comboCandlestickBrushChart.series"
              :options="comboCandlestickBrushChart.chartOptions"
            ></apexchart>
             <apexchart
              class="apex-charts"
              height="150"
              dir="ltr"
              :series="comboCandlestickChart.series"
              :options="comboCandlestickChart.chartOptions"
            ></apexchart>
          </div>
        </div>
        <!--end card-->
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div
            class="
              card-header
              justify-content-between
              d-flex
              align-items-center
            "
          >
            <h4 class="card-title">Category X-Axis</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="categoryXaxisChart.series"
              :options="categoryXaxisChart.chartOptions"
            ></apexchart>
          </div>
        </div>
        <!--end card-->
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->
  </Layout>
</template>