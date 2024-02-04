<script>
import Layout from "../../../layouts/main";
import PageHeader from "@/components/page-header";
import appConfig from "../../../../app.config";
import Vue3ChartJs from "@j-t-mcc/vue3-chartjs";

import { line, pie, Doughnut, radar, bar, PolarArea } from "./data";

/**
 * Chartjs-chart component
 */
export default {
  page: {
    title: "Chartjs Charts",
    meta: [{ name: "description", content: appConfig.description }],
  },
  components: {
    Layout,
    PageHeader,
    Vue3ChartJs,
  },
  data() {
    return {
      line: line,
      pie: pie,
      Doughnut: Doughnut,
      radar: radar,
      bar: bar,
      PolarArea: PolarArea,
      title: "Chartjs",
      items: [
        {
          text: "Charts",
          href: "/",
        },
        {
          text: "Chartjs",
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
          <div class="card-body">
            <h4 class="card-title mb-4">Line Chart</h4>
            <!-- Line Chart -->
            <vue3-chart-js
              class="chartjs-chart"
              v-bind="{ ...line }"
            ></vue3-chart-js>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Bar Chart</h4>
          
            <!-- Bar Chart -->
            <vue3-chart-js
               class="chartjs-chart"
              v-bind="{ ...bar }"
            ></vue3-chart-js>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Pie Chart</h4>
            
            <!-- Pie Chart -->
             <vue3-chart-js
              :height="140"
              class="chartjs-chart"
              v-bind="{ ...pie }"
            ></vue3-chart-js>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Donut Chart</h4>
            
            <!-- Donut Chart -->
            <vue3-chart-js
              :height="140"
              class="chartjs-chart"
              v-bind="{ ...Doughnut }"
            ></vue3-chart-js>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Polar area Chart</h4>
            
            <!-- Polar area Chart -->
            <vue3-chart-js
              :height="140"
              class="chartjs-chart"
              v-bind="{ ...PolarArea }"
            ></vue3-chart-js>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Radar Chart</h4>
            
            <!-- Radar Chart -->
             <vue3-chart-js
              :height="140"
              class="chartjs-chart"
              v-bind="{ ...radar }"
            ></vue3-chart-js>
          </div>
        </div>
      </div>
    </div>
  </Layout>
</template>