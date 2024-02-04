<script>
import Layout from "../../../layouts/main.vue";
import PageHeader from "@/components/page-header";
import appConfig from "../../../../app.config";

import Widget from "./widget.vue";
import SalesForecast from "./forecast.vue";
import DealType from "./deal-type.vue";
import BalanceOverview from "./balance-overview.vue";
import DealStatus from "./deals-status.vue";
import Tasks from "./tasks.vue";
import UpcomingActivity from "./activities.vue";
import ClosingDeals from "./closing-deals.vue";

export default {
  page: {
    title: "CRM",
    meta: [{ name: "description", content: appConfig.description }],
  },
  data() {
    return {
      title: "CRM",
      items: [
        {
          text: "Dashboards",
          href: "/",
        },
        {
          text: "CRM",
          active: true,
        },
      ],
    };
  },
  components: {
    Layout,
    PageHeader,
    Widget,
    SalesForecast,
    DealType,
    BalanceOverview,
    DealStatus,
    Tasks,
    UpcomingActivity,
    ClosingDeals
  },
};
</script>

<template>
  <Layout>
    <PageHeader :title="title" :items="items" />
    
    <div class="row">
      <div class="col-xl-12">
        <Widget />
      </div>
    </div>
    <!-- end row -->

    <div class="row">
      <div class="col-xxl-3 col-md-6">
        <SalesForecast />
      </div>

      <div class="col-xxl-3 col-md-6">
        <DealType />
      </div>
      <div class="col-xxl-6">
        <BalanceOverview />
      </div>
    </div>
    <!-- end row -->
    <div class="row">
      <div class="col-xl-7">
          <DealStatus />
      </div>
      <div class="col-xl-5">
          <Tasks />
      </div>
    </div>
    <!-- end row -->
    <div class="row">
      <div class="col-xxl-5">
          <UpcomingActivity />
      </div>
      <div class="col-xxl-7">
          <ClosingDeals />
      </div>
    </div>
    <!-- end row -->
  </Layout>
</template>
