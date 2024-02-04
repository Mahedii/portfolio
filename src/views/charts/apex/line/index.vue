<script>
import Layout from "../../../../layouts/main.vue";
import PageHeader from "@/components/page-header";
import appConfig from "../../../../../app.config";

import {
  basicLineChart,
  zoomableChart,
  lineDatalabelChart,
  lineAnnotation,
  syncingAreaChart,
  brushLineChart,
  brushAreaChart,
  steplineChart,
  gradientLineChart,
  realtimeLineChart,
  dashedLineChart,
  missingDataChart,
} from "./data";

/**
 * Line chart component
 */
export default {
  page: {
    title: "Line Charts",
    meta: [
      {
        name: "description",
        content: appConfig.description,
      },
    ],
  },
  data() {
    return {
      basicLineChart: basicLineChart,
      zoomableChart: zoomableChart,
      lineDatalabelChart: lineDatalabelChart,
      lineAnnotation: lineAnnotation,
      syncingAreaChart: syncingAreaChart,
      brushLineChart: brushLineChart,
      brushAreaChart: brushAreaChart,
      steplineChart: steplineChart,
      gradientLineChart: gradientLineChart,
      realtimeLineChart: realtimeLineChart,
      dashedLineChart: dashedLineChart,
      missingDataChart: missingDataChart,
      title: "Line Charts",
      items: [
        {
          text: "Apexcharts",
          href: "/",
        },
        {
          text: "Line Charts",
          active: true,
        },
      ],
    
    };
  },
  components: {
    Layout,
    PageHeader,
  },
};
</script>

<template>
  <Layout>
    <PageHeader :title="title" :items="items" />
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Basic Line Chart</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="basicLineChart.series"
              :options="basicLineChart.chartOptions"
            ></apexchart>
          </div>
        </div>
        <!--end card-->
      </div>
      <!--end col-->

      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Zoomable Timeseries</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="zoomableChart.series"
              :options="zoomableChart.chartOptions"
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
          <div class="card-header">
            <h4 class="card-title mb-0">Line with Data Labels</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="lineDatalabelChart.series"
              :options="lineDatalabelChart.chartOptions"
            ></apexchart>
          </div>
        </div>
        <!--end card-->
      </div>
      <!--end col-->

      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Dashed Line</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="dashedLineChart.series"
              :options="dashedLineChart.chartOptions"
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
          <div class="card-header">
            <h4 class="card-title mb-0">Line with Annotations</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="lineAnnotation.series"
              :options="lineAnnotation.chartOptions"
            ></apexchart>
          </div>
        </div>
        <!--end card-->
      </div>
      <!--end col-->
        <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Brush Charts</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <div>
              <apexchart
                class="apex-charts"
                height="230"
                dir="ltr"
                :series="brushLineChart.series"
                :options="brushLineChart.chartOptions"
              ></apexchart>

              <apexchart
                class="apex-charts"
                height="130"
                dir="ltr"
                :series="brushAreaChart.series"
                :options="brushAreaChart.chartOptions"
              ></apexchart>
            </div>
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
          <div class="card-header">
            <h4 class="card-title mb-0">Stepline Charts</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="steplineChart.series"
              :options="steplineChart.chartOptions"
            ></apexchart>
          </div>
        </div>
        <!--end card-->
      </div>
      <!--end col-->
        <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Gradient Charts</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="gradientLineChart.series"
              :options="gradientLineChart.chartOptions"
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
          <div class="card-header">
            <h4 class="card-title mb-0">Missing Data/ Null Value Charts</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="missingDataChart.series"
              :options="missingDataChart.chartOptions"
            ></apexchart>
          </div>
        </div>
        <!--end card-->
      </div>
     
    </div>
    <!-- end row -->
  </Layout>
</template>
