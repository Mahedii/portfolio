<script>
import Layout from "../../../../layouts/main.vue";
import appConfig from "../../../../../app.config";
import PageHeader from "@/components/page-header";

import {
  multipleSeriesHeatmapChart,
  basicHeatmapChat,
  colorHeatmapChart,
  shadesHeatmapChart,
} from "./data";

/**
 * Heatmap chart component
 */
export default {
  page: {
    title: "Heatmap Charts",
    meta: [
      {
        name: "description",
        content: appConfig.description,
      },
    ],
  },
  components: {
    Layout,PageHeader
  },
  data() {
    return {
      multipleSeriesHeatmapChart: multipleSeriesHeatmapChart,
      basicHeatmapChat: basicHeatmapChat,
      colorHeatmapChart: colorHeatmapChart,
      shadesHeatmapChart: shadesHeatmapChart,
      title: "Heatmap Charts",
      items: [
        {
          text: "Apexcharts",
          href: "/",
        },
        {
          text: "Heatmap Charts",
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
            class="card-header justify-content-between d-flex align-items-center"
          >
            <h4 class="card-title">Basic Heatmap Chart</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="basicHeatmapChat.series"
              :options="basicHeatmapChat.chartOptions"
            ></apexchart>
           
          </div>
        </div>
        <!--end card-->
      </div>
      <!-- end col -->
      <div class="col-lg-6">
        <div class="card">
          <div
            class="card-header justify-content-between d-flex align-items-center"
          >
            <h4 class="card-title">Heatmap - Multiple Series</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
             <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="multipleSeriesHeatmapChart.series"
              :options="multipleSeriesHeatmapChart.chartOptions"
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
            class="card-header justify-content-between d-flex align-items-center"
          >
            <h4 class="card-title">Heatmap Color Range</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="colorHeatmapChart.series"
              :options="colorHeatmapChart.chartOptions"
            ></apexchart>
          </div>
        </div>
        <!--end card-->
      </div>
      <!-- end col -->
      <div class="col-lg-6">
        <div class="card">
          <div
            class="card-header justify-content-between d-flex align-items-center"
          >
            <h4 class="card-title">Heatmap - Range Without Shades</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="shadesHeatmapChart.series"
              :options="shadesHeatmapChart.chartOptions"
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
