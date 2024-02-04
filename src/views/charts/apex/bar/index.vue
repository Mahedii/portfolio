<script>
import Layout from "../../../../layouts/main.vue";
import appConfig from "../../../../../app.config";
import PageHeader from "@/components/page-header";

import {
  basicBarChart,
  customDatalabelsChart,
  stackedBarChart,
  stackedBar100Chart,
  barNegativeChart,
  barMarkersChart,
  reversedBarChart,
  patternedBarChart,
  groupedBarChart,
  barImagesChart,
} from "./data";

/**
 * Bar charts component
 */
export default {
  page: {
    title: "Bar charts",
    meta: [
      {
        name: "description",
        content: appConfig.description
      },
    ],
  },
  data() {
    return {
      title: "Bar Charts",
      items: [
        {
          text: "Apexcharts",
          href: "/",
        },
        {
          text: "Bar Charts",
          active: true,
        },
      ],
      basicBarChart: basicBarChart,
      customDatalabelsChart: customDatalabelsChart,
      stackedBarChart: stackedBarChart,
      stackedBar100Chart: stackedBar100Chart,
      barNegativeChart: barNegativeChart,
      barMarkersChart: barMarkersChart,
      reversedBarChart: reversedBarChart,
      patternedBarChart: patternedBarChart,
      groupedBarChart: groupedBarChart,
      barImagesChart: barImagesChart,
    };
  },
  components: {
    Layout,
    PageHeader
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
            <h4 class="card-title">Basic Bar Chart</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="basicBarChart.series"
              :options="basicBarChart.chartOptions"
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
            <h4 class="card-title">Custom DataLabels Bar</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="customDatalabelsChart.series"
              :options="customDatalabelsChart.chartOptions"
            ></apexchart>
          </div>
        </div>
        <!--end card-->
      </div>
      <!--end col-->
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
            <h4 class="card-title">Stacked Bar Chart</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="stackedBarChart.series"
              :options="stackedBarChart.chartOptions"
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
            <h4 class="card-title">Stacked Bars 100</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="stackedBar100Chart.series"
              :options="stackedBar100Chart.chartOptions"
            ></apexchart>
          </div>
        </div>
        <!--end card-->
      </div>
      <!--end col-->
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
            <h4 class="card-title">Bar with Negative Values</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="barNegativeChart.series"
              :options="barNegativeChart.chartOptions"
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
            <h4 class="card-title">Bar with Marker</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="barMarkersChart.series"
              :options="barMarkersChart.chartOptions"
            ></apexchart>
          </div>
        </div>
        <!--end card-->
      </div>
      <!--end col-->
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
            <h4 class="card-title">Reversed Bar Chart</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="reversedBarChart.series"
              :options="reversedBarChart.chartOptions"
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
            <h4 class="card-title">Patterned Chart</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="patternedBarChart.series"
              :options="patternedBarChart.chartOptions"
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
            <h4 class="card-title">Grouped Bar Chart</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="groupedBarChart.series"
              :options="groupedBarChart.chartOptions"
            ></apexchart>
          </div>
        </div>
        <!--end card-->
      </div>
      <!--end col-->
   
    </div>
    <!-- end row -->
  </Layout>
</template>