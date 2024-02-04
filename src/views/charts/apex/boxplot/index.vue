<script>
import Layout from "../../../../layouts/main.vue";
import appConfig from "../../../../../app.config";
import PageHeader from "@/components/page-header";

import { boxChart, boxplotScatterChart } from "./data";

/**
 * Boxplot Charts component
 */
export default {
  page: {
    title: "Boxplot Charts",
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
      boxChart: boxChart,
      boxplotScatterChart: boxplotScatterChart,
      title: "Boxplot Charts",
      items: [
        {
          text: "Apexcharts",
          href: "/",
        },
        {
          text: "Boxplot Charts",
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
              :series="boxChart.series"
              :options="boxChart.chartOptions"
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
              height="350"
              dir="ltr"
              :series="boxplotScatterChart.series"
              :options="boxplotScatterChart.chartOptions"
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