<script>
import Layout from "../../layouts/main.vue";
import PageHeader from "@/components/page-header";
import appConfig from "../../../app.config";

import { icons } from "./data-remix.js";

export default {
  page: {
    title: "Remix",
    meta: [{ name: "description", content: appConfig.description }],
  },
  data() {
    return {
      icons: icons,
      iconsList: [],
      title: "Remix",
      items: [
        {
          text: "Icons",
          href: "/",
        },
        {
          text: "Remix",
          active: true,
        },
      ],
    };
  },
  components: {
    Layout,
    PageHeader,
  },
  mounted() {
        let iconData = "";
        Object.keys(this.icons).forEach(function(key) {
            if(key === "Editor") {
                iconData = iconData + '<div class="card"><div class="card-body"><h4 class="card-title">' + key + ' </h4><p class="card-title-desc mb-2">Use <code>&lt;i class="ri-bold"&gt;&lt;/i&gt;</code> <span class="badge badge-success">v 2.4.1</span>.</p><div class="row icon-demo-content">';
                Object.keys(icons[key]).forEach(function (k) {
                    iconData += '<div class="col-xl-3 col-lg-4 col-sm-6">\
                    <i class="ri-'+ k + '"></i> ri-' + k + '</div>';
                });
            } else {
                iconData = iconData + '<div class="card"><div class="card-body"><h4 class="card-title">' + key + ' </h4><p class="card-title-desc mb-2">Use <code>&lt;i class="ri-home-line"&gt;&lt;/i&gt;</code> or <code>&lt;i class="ri-home-fill"&gt;&lt;/i&gt;</code> <span class="badge badge-success">v 2.4.1</span>.</p><div class="row icon-demo-content">';
                Object.keys(icons[key]).forEach(function (k) {
                    iconData += '<div class="col-xl-3 col-lg-4 col-sm-6">\
                    <i class="ri-'+ k + '-line"></i> ri-' + k + '-line\
                </div><div class="col-xl-3 col-lg-4 col-sm-6">\
                    <i class="ri-'+ k + '-fill"></i> ri-' + k + '-fill\
                </div>';
                });
            }
            iconData += '</div></div></div>';
        });
        document.getElementById("icons").innerHTML = iconData;
  }
};
</script>

<template>
  <Layout>
    <PageHeader :title="title" :items="items" />
    <div class="row">
      <div class="col-12" id="icons"></div>
      <!-- end col-->
    </div>
    <!-- end row -->
  </Layout>
</template>
