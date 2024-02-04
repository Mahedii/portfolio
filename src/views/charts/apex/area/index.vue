<script>
import Layout from "../../../../layouts/main.vue";
import appConfig from "../../../../../app.config";
import PageHeader from "@/components/page-header";

import {
  basicAreaChart,
  splineAreaChart,
  datetimeAreaChart,
  areaMonthsChart,
  areaYearsChart,
  areaStackedChart,
  areaIrregularChart,
  areaNullValueChart,
  areaNegativeChart,
} from "./data";

/**
 * Area charts component
 */
export default {
  page: {
    title: "Area charts",
    meta: [
      {
        name: "description",
        content: appConfig.description,
      },
    ],
  },
  data() {
    return {
      basicAreaChart: basicAreaChart,
      splineAreaChart: splineAreaChart,
      datetimeAreaChart: datetimeAreaChart,
      areaMonthsChart: areaMonthsChart,
      areaYearsChart: areaYearsChart,
      areaStackedChart: areaStackedChart,
      areaIrregularChart: areaIrregularChart,
      areaNullValueChart: areaNullValueChart,
      areaNegativeChart: areaNegativeChart,
      title: "Area Charts",
      items: [
        {
          text: "Charts",
          href: "/",
        },
        {
          text: "Area Charts",
          active: true,
        },
      ],
      selection: "one_year",
    };
  },
  components: {
    Layout,
    PageHeader
  },
  methods: {
    updateData: function (timeline) {
      this.selection = timeline;
      switch (timeline) {
        case "one_month":
          this.$refs.chart.zoomX(
            new Date("28 Jan 2013").getTime(),
            new Date("27 Feb 2013").getTime()
          );
          break;
        case "six_months":
          this.$refs.chart.zoomX(
            new Date("27 Sep 2012").getTime(),
            new Date("27 Feb 2013").getTime()
          );
          break;
        case "one_year":
          this.$refs.chart.zoomX(
            new Date("27 Feb 2012").getTime(),
            new Date("27 Feb 2013").getTime()
          );
          break;
        case "all":
          this.$refs.chart.zoomX(
            new Date("23 Jan 2012").getTime(),
            new Date("27 Feb 2013").getTime()
          );
          break;
        default:
      }
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
          <div class="card-header">
            <h4 class="card-title mb-0">Basic Area Chart</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="basicAreaChart.series"
              :options="basicAreaChart.chartOptions"
            ></apexchart>
          </div>
        </div>
        <!--end card-->
      </div>
      <!-- end col -->
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Spline Area Chart</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="splineAreaChart.series"
              :options="splineAreaChart.chartOptions"
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
          <div class="card-header">
            <h4 class="card-title mb-0">Area Chart - Datetime X - Axis Chart</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <div
              class="toolbar d-flex align-items-start justify-content-center flex-wrap gap-2"
            >
              <button
                type="button"
                class="btn btn-soft-primary timeline-btn btn-sm"
                id="one_month"
                @click="updateData('one_month')"
                :class="{ active: selection === 'one_month' }"
              >
                1M
              </button>
              <button
                type="button"
                class="btn btn-soft-primary timeline-btn btn-sm"
                id="six_months"
                @click="updateData('six_months')"
                :class="{ active: selection === 'six_months' }"
              >
                6M
              </button>
              <button
                type="button"
                class="btn btn-soft-primary timeline-btn btn-sm"
                id="one_year"
                @click="updateData('one_year')"
                :class="{ active: selection === 'one_year' }"
              >
                1Y
              </button>
              <button
                type="button"
                class="btn btn-soft-primary timeline-btn btn-sm"
                id="all"
                @click="updateData('all')"
                :class="{ active: selection === 'all' }"
              >
                ALL
              </button>
            </div>
            <apexchart
              ref="chart"
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="datetimeAreaChart.series"
              :options="datetimeAreaChart.chartOptions"
            ></apexchart>
          </div>
        </div>
        <!-- end card -->
      </div>
      <!-- end col -->
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Area with Negative Values Chart</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="areaNegativeChart.series"
              :options="areaNegativeChart.chartOptions"
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
          <div class="card-header">
            <h4 class="card-title mb-0">Area Chart - Github Style</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <div class="bg-light">
              <div id="area_chart-months" class="apex-charts" dir="ltr"></div>
              <apexchart
                class="apex-charts"
                height="130"
                dir="ltr"
                :series="areaMonthsChart.series"
                :options="areaMonthsChart.chartOptions"
              ></apexchart>
            </div>

            <div class="github-style d-flex align-items-center my-2">
              <div class="flex-shrink-0 me-2">
                <img
                  class="avatar-sm rounded"
                  src="@/assets/images/users/avatar-2.jpg"
                  data-hovercard-user-id="634573"
                  alt=""
                />
              </div>
              <div class="flex-grow-1">
                <a class="font-size-14 text-dark fw-medium">coder</a>
                <div class="cmeta text-muted font-size-11">
                  <span class="commits text-dark fw-medium"></span> commits
                </div>
              </div>
            </div>

            <div class="bg-light">
              <apexchart
                class="apex-charts"
                height="170"
                dir="ltr"
                :series="areaYearsChart.series"
                :options="areaYearsChart.chartOptions"
              ></apexchart>
            </div>
          </div>
        </div>
        <!--end card-->
      </div>
      <!-- end col -->
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Stacked Area Chart</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="areaStackedChart.series"
              :options="areaStackedChart.chartOptions"
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
          <div class="card-header">
            <h4 class="card-title mb-0">Irregular Timeseries Chart</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="areaIrregularChart.series"
              :options="areaIrregularChart.chartOptions"
            ></apexchart>
          </div>
        </div>
        <!--end card-->
      </div>
      <!-- end col -->
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Area Chart With Null Values Chart</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <apexchart
              class="apex-charts"
              height="350"
              dir="ltr"
              :series="areaNullValueChart.series"
              :options="areaNullValueChart.chartOptions"
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
