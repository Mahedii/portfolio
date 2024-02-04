<script>
import { VueEcharts } from "vue3-echarts";

import Layout from "../../../layouts/main";
import PageHeader from "@/components/page-header";
import appConfig from "../../../../app.config";

import {
  lineChart,
  areaChart,
  polarChart,
  stackedLineChart,
  basicBar,
  lineYCategoryChart,
  stackedAreaChart,
  horizontalBarChart,
  stepLineChart,
  pieChart,
  bubbleChart,
  doughnutChart,
  candlestickChart,
  mixedBarChart,
  stackedHorizontalBarChart,
  guageChart,
  graphChart,
  treemapChart,
  sunburstChart,
  scatterChart,
  parallelChart,
  sankeyChart,
  funnelChart,
} from "./data";

export default {
  page: {
    title: "Echart Chart",
    meta: [{ name: "description", content: appConfig.description }],
  },
  components: { Layout, PageHeader, VueEcharts },
  data() {
    return {
      title: "E Charts",
      items: [
        {
          text: "Charts",
          href: "/",
        },
        {
          text: "E Charts",
          active: true,
        },
      ],
    };
  },
  computed: {
    option() {
      return {
        lineChart: lineChart,
        scatterChart: scatterChart,
        areaChart: areaChart,
        stackedAreaChart: stackedAreaChart,
        polarChart: polarChart,
        basicBar: basicBar,
        horizontalBarChart: horizontalBarChart,
        stackedLineChart: stackedLineChart,
        graphChart: graphChart,
        lineYCategoryChart: lineYCategoryChart,
        stepLineChart: stepLineChart,
        candlestickChart: candlestickChart,
        pieChart: pieChart,
        sunburstChart: sunburstChart,
        treemapChart: treemapChart,
        parallelChart: parallelChart,
        sankeyChart: sankeyChart,
        funnelChart: funnelChart,
        bubbleChart: bubbleChart,
        doughnutChart: doughnutChart,
        stackedHorizontalBarChart: stackedHorizontalBarChart,
        mixedBarChart: mixedBarChart,
        guageChart: guageChart,
      };
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
          <div class="card-body">
            <h4 class="card-title mb-4">Line Chart</h4>
            <vue-echarts
              :option="option.lineChart"
              style="height: 300px"
              ref="chart"
            />
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Stacked Line Chart</h4>
            <vue-echarts
              :option="option.stackedLineChart"
              style="height: 300px"
              ref="chart"
            />
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Area Chart</h4>
            <vue-echarts :option="option.areaChart" style="height: 300px" />
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Stacked Area Chart</h4>
            <vue-echarts
              :option="option.stackedAreaChart"
              style="height: 300px"
            />
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Step Line</h4>
            <vue-echarts :option="option.stepLineChart" style="height: 300px" />
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Line Y Category</h4>
            <vue-echarts
              :option="option.lineYCategoryChart"
              style="height: 300px"
            />
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Basic Bar</h4>
            <vue-echarts :option="option.basicBar" style="height: 300px" />
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Horizontal Bar</h4>
            <vue-echarts
              :option="option.horizontalBarChart"
              style="height: 300px"
            />
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Stacked Horizontal Bar</h4>
            <vue-echarts
              :option="option.stackedHorizontalBarChart"
              style="height: 300px"
            />
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Candlestick Chart</h4>
            <vue-echarts
              :option="option.candlestickChart"
              style="height: 300px"
            />
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Pie Chart</h4>
            <vue-echarts :option="option.pieChart" style="height: 300px" />
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Doughnut Chart</h4>
            <vue-echarts :option="option.doughnutChart" style="height: 300px" />
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Graph Chart</h4>
            <vue-echarts :option="option.graphChart" style="height: 300px" />
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Treemap Chart</h4>
            <vue-echarts :option="option.treemapChart" style="height: 300px" />
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Basic Scatter Chart</h4>
            <vue-echarts :option="option.scatterChart" style="height: 300px" />
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Sunburst Chart</h4>
            <vue-echarts :option="option.sunburstChart" style="height: 300px" />
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Bubble Chart</h4>
            <vue-echarts :option="option.bubbleChart" style="height: 300px" />
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Polar Chart</h4>
            <vue-echarts
              :option="option.polarChart.polar"
              style="height: 300px"
            />
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Parallel Chart</h4>
            <vue-echarts
              :option="option.parallelChart"
              style="height: 300px"
              ref="chart"
            />
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Sankey Chart</h4>
            <vue-echarts
              :option="option.sankeyChart"
              style="height: 300px"
              ref="chart"
            />
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Mix Line-Bar</h4>
            <vue-echarts
              :option="option.mixedBarChart"
              style="height: 300px"
              ref="chart"
            />
          </div>
        </div>
      </div>
       <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Funnel Chart</h4>
            <vue-echarts
              :option="option.funnelChart"
              style="height: 300px"
              ref="chart"
            />
          </div>
        </div>
      </div>
    </div>
        <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Gauge Chart</h4>
            <vue-echarts :option="option.guageChart" style="height: 300px" />
          </div>
        </div>
      </div>
    </div>
  </Layout>
</template>