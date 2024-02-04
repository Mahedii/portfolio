<script>
import Layout from "../../layouts/main.vue";
import PageHeader from "@/components/page-header";
import appConfig from "../../../app.config";

export default {
  page: {
    title: "Starter",
    meta: [{ name: "description", content: appConfig.description }],
  },
  data() {
    return {
      title: "Starter",
      items: [
        {
          text: "Pages",
          href: "/",
        },
        {
          text: "Starter",
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
    
    </Layout>
</template>