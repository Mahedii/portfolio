<script>
import Layout from "../../../../layouts/main.vue";
import appConfig from "../../../../../app.config";
import PageHeader from "@/components/page-header";

import { basicPolarareaChart, polarAreaMonochromeChart } from "./data";

/**
 * Polararea chart component
 */
export default {
  page: {
    title: "Polararea Charts",
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
      basicPolarareaChart: basicPolarareaChart,
      polarAreaMonochromeChart: polarAreaMonochromeChart,
      title: "Polararea Charts",
      items: [
        {
          text: "Apexcharts",
          href: "/",
        },
        {
          text: "Polararea Charts",
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
            <h4 class="card-title">Basic-Polar Area Chart</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="330"
              dir="ltr"
              :series="basicPolarareaChart.series"
              :options="basicPolarareaChart.chartOptions"
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
            <h4 class="card-title">Polar-Area Monochrome</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="330"
              dir="ltr"
              :series="polarAreaMonochromeChart.series"
              :options="polarAreaMonochromeChart.chartOptions"
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
