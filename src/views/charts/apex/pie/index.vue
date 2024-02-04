<script>
import Layout from "../../../../layouts/main.vue";
import appConfig from "../../../../../app.config";
import PageHeader from "@/components/page-header";

import {
  simplePieChart,
  donutChart,
  updatingDonutChart,
  gradientDonutChart,
  patternDonutChart,
  imagePieChart,
  monochromePieChart,
} from "./data";

/**
 * Pie chart component
 */
export default {
  page: {
    title: "Pie Charts",
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
      simplePieChart: simplePieChart,
      donutChart: donutChart,
      updatingDonutChart: updatingDonutChart,
      gradientDonutChart: gradientDonutChart,
      patternDonutChart: patternDonutChart,
      imagePieChart: imagePieChart,
      monochromePieChart: monochromePieChart,
      title: "Pie Charts",
      items: [
        {
          text: "Apexcharts",
          href: "/",
        },
        {
          text: "Pie Charts",
          active: true,
        },
      ],
    };
  },
  methods: {
    appendData: function() {
      var arr = this.updatingDonutChart.series.slice();
      arr.push(Math.floor(Math.random() * (100 - 1 + 1)) + 1);
      this.updatingDonutChart.series = arr;
    },

    removeData: function() {
      if (this.updatingDonutChart.series.length === 1) return;
      var arr = this.updatingDonutChart.series.slice();
      arr.pop();
      this.updatingDonutChart.series = arr;
    },

    randomize: function() {
      this.updatingDonutChart.series = this.updatingDonutChart.series.map(function() {
        return Math.floor(Math.random() * (100 - 1 + 1)) + 1;
      });
    },

    reset: function() {
      this.updatingDonutChart.series = [44, 55, 13, 33];
    },
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
            <h4 class="card-title">Simple Pie Chart</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="300"
              dir="ltr"
              :series="simplePieChart.series"
              :options="simplePieChart.chartOptions"
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
            <h4 class="card-title">Simple Donut Chart</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="300"
              dir="ltr"
              :series="donutChart.series"
              :options="donutChart.chartOptions"
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
            <h4 class="card-title">Updating Donut Chart</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="300"
              dir="ltr"
              :series="updatingDonutChart.series"
              :options="updatingDonutChart.chartOptions"
            ></apexchart>

            <div
              class="d-flex align-items-start flex-wrap gap-2 justify-content-center mt-4"
            >
              <button id="add" class="btn btn-light btn-sm" @click="appendData">
                + ADD
              </button>

              <button
                id="remove"
                class="btn btn-light btn-sm"
                @click="removeData"
              >
                - REMOVE
              </button>

              <button
                id="randomize"
                class="btn btn-light btn-sm"
                @click="randomize"
              >
                RANDOMIZE
              </button>

              <button id="reset" class="btn btn-light btn-sm" @click="reset">
                RESET
              </button>
            </div>
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
            <h4 class="card-title">Monochrome Pie Chart</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="300"
              dir="ltr"
              :series="monochromePieChart.series"
              :options="monochromePieChart.chartOptions"
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
            <h4 class="card-title">Gradient Donut Chart</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="300"
              dir="ltr"
              :series="gradientDonutChart.series"
              :options="gradientDonutChart.chartOptions"
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
            <h4 class="card-title">Patterned Donut Chart</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="300"
              dir="ltr"
              :series="patternDonutChart.series"
              :options="patternDonutChart.chartOptions"
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
            <h4 class="card-title">Pie Chart with Image Fill</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="300"
              dir="ltr"
              :series="imagePieChart.series"
              :options="imagePieChart.chartOptions"
            ></apexchart>
          </div>
        </div>
        <!--end card-->
      </div>
      <!-- end col -->
    </div>
  </Layout>
</template>
