<script>
import { AlertTriangleIcon } from '@zhuowenli/vue-feather-icons'

import Layout from "../../../layouts/main.vue";
import PageHeader from "@/components/page-header";
import appConfig from "../../../../app.config";

import Widget from "./widget.vue";
import AudiencesMetrics from "./audiences-metrics.vue";
import AudiencesSessions from "./audiences-sessions.vue";
import Country from "./country.vue";
import Referrals from "./referrals.vue";
import SessionsCounties from "./sessions-countries.vue";
import TopPages from "./top-pages.vue";
import Users from "./users.vue";

export default {
  page: {
    title: "Analytics",
    meta: [{ name: "description", content: appConfig.description }],
  },
  data() {
    return {
      title: "Analytics",
      items: [
        {
          text: "Dashboards",
          href: "/",
        },
        {
          text: "Analytics",
          active: true,
        },
      ],
    };
  },
  components: {
    AlertTriangleIcon,
    Layout,
    PageHeader,
    Widget,
    AudiencesSessions,
    AudiencesMetrics,
    Country,
    Referrals,
    SessionsCounties,
    TopPages,
    Users,
  },
};
</script>

<template>
  <Layout>
    <PageHeader :title="title" :items="items" />
    <div class="row">
      <div class="col-xxl-5">
           <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="alert alert-warning border-0 rounded-0 m-0 d-flex align-items-center" role="alert">
                                <alert-triangle-icon class="text-warning me-2 icon-sm"></alert-triangle-icon>
                                <div class="flex-grow-1 text-truncate">
                                    Your free trial expired in <b>17</b> days. 
                                </div>
                                <div class="flex-shrink-0">
                                    <router-link to="/pages/pricing" class="text-reset text-decoration-underline"><b>Upgrade</b></router-link>
                                </div>
                            </div>

                            <div class="row align-items-end">
                                <div class="col-sm-8">
                                    <div class="p-3">
                                        <p class="fs-16 lh-base">Upgrade your plan from a <span class="fw-semibold">Free
                                            trial</span>, to ‘Premium Plan’ <i class="mdi mdi-arrow-right"></i></p>
                                        <div class="mt-3">
                                            <router-link to="/pages/pricing" class="btn btn-success">Upgrade Account!</router-link>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="px-3">
                                        <img src="@/assets/images/user-illustarator-2.png" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card-body-->
                    </div>
                </div> <!-- end col-->
            </div> <!-- end row-->
        <Widget />
      </div>
       <div class="col-xxl-7">
           <div class="row h-100">
               <div class="col-xl-6">
                   <Country />
               </div>
               <div class="col-xl-6">
                   <SessionsCounties />
               </div>
           </div>
           </div>
    </div>

    <div class="row h-100">
      <div class="col-xl-6">
        <AudiencesMetrics />
      </div>
      <div class="col-xl-6">
        <AudiencesSessions />
      </div>
    </div>

    <div class="row">
      <div class="col-xl-4">
        <Users />
      </div>
      <div class="col-xl-4 col-md-6">
        <Referrals />
      </div>
      <div class="col-xl-4 col-md-6">
        <TopPages />
      </div>
    </div>
  </Layout>
</template>
