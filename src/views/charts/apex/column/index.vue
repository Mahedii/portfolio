<script>
import Layout from "../../../../layouts/main.vue";
import appConfig from "../../../../../app.config";
import PageHeader from "@/components/page-header";

import {
  basicColumnChart,
  columnDatalabelChart,
  stackedColumnsChart,
  columnStackedChart,
  columnMarkersChart,
  columnRotatedLabel,
  columnNegativeChart,
  rangeColumnChart,
  chartYearOption,
  quarterChartOption,
  distributedColumnchart,
  dynamicQuarterLoadedChart
} from "./data";

/**
 * Column Charts component
 */
export default {
  page: {
    title: "Column chart",
    meta: [
      {
        name: "description",
        content: appConfig.description,
      },
    ],
  },
  data() {
    return {
      basicColumnChart: basicColumnChart,
      columnDatalabelChart: columnDatalabelChart,
      stackedColumnsChart: stackedColumnsChart,
      columnStackedChart: columnStackedChart,
      columnMarkersChart: columnMarkersChart,
      columnRotatedLabel: columnRotatedLabel,
      columnNegativeChart: columnNegativeChart,
      rangeColumnChart: rangeColumnChart,
      chartYearOption: chartYearOption,
      quarterChartOption: quarterChartOption,
      distributedColumnchart: distributedColumnchart,
      dynamicQuarterLoadedChart:dynamicQuarterLoadedChart,
      title: "Column Charts",
      items: [
        {
          text: "Charts",
          href: "/",
        },
        {
          text: "Column Charts",
          active: true,
        },
      ],
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
            <h4 class="card-title">Basic Column Charts</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="basicColumnChart.series"
              :options="basicColumnChart.chartOptions"
            ></apexchart>
          </div>
        </div>
        <!--end card-->
      </div>
      <!--end col-->
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
            <h4 class="card-title">Column with Data Labels</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="columnDatalabelChart.series"
              :options="columnDatalabelChart.chartOptions"
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
            <h4 class="card-title">Stacked Column Charts</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="stackedColumnsChart.series"
              :options="stackedColumnsChart.chartOptions"
            ></apexchart>
          </div>
        </div>
        <!--end card-->
      </div>
      <!--end col-->
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
            <h4 class="card-title">Stacked Column 100</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="columnStackedChart.series"
              :options="columnStackedChart.chartOptions"
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
            <h4 class="card-title">Column with Markers</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="columnMarkersChart.series"
              :options="columnMarkersChart.chartOptions"
            ></apexchart>
            <div id="column_markers" class="apex-charts" dir="ltr"></div>
          </div>
        </div>
        <!--end card-->
      </div>
      <!--end col-->
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
            <h4 class="card-title">Column with Rotated Labels</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="columnRotatedLabel.series"
              :options="columnRotatedLabel.chartOptions"
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
            <h4 class="card-title">Column with Nagetive Values</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="columnNegativeChart.series"
              :options="columnNegativeChart.chartOptions"
            ></apexchart>
          </div>
        </div>
        <!--end card-->
      </div>
      <!--end col-->
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
            <h4 class="card-title">Range Column Chart</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="rangeColumnChart.series"
              :options="rangeColumnChart.chartOptions"
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
            <h4 class="card-title">Dynamic Loaded Chart</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <div id="dynamicloadedchart-wrap">
              <div id="chart-year">
                <apexchart
                  type="bar"
                  height="330"
                  ref="chart"
                  :options="chartYearOption.chartOptions"
                  :series="chartYearOption.series"
                ></apexchart>
              </div>
              <div id="chart-quarter">
                <apexchart
                  type="bar"
                  height="330"
                  ref="chartQuarter"
                  :options="dynamicQuarterLoadedChart.chartOptions"
                  :series="dynamicQuarterLoadedChart.series"
                ></apexchart>
              </div>
            </div>
          </div>
        </div>
        <!--end card-->
      </div>
      <!--end col-->
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
            <h4 class="card-title">Distributed Columns Charts</h4>
            
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="distributedColumnchart.series"
              :options="distributedColumnchart.chartOptions"
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
