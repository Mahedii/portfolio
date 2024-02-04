<script>
import { CountTo } from "vue3-count-to";

export default {
  setup() {
    return {
      crmWidgets: [
        {
          id: 1,
          label: "Campaign Sent",
          badge: "ri-arrow-up-circle-line text-success",
          icon: "ri-space-ship-line",
          counter: 197,
          decimals: 0,
          suffix: "",
          prefix: "",
        },
        {
          id: 2,
          label: "Annual Profit",
          badge: "ri-arrow-up-circle-line text-success",
          icon: "ri-exchange-dollar-line",
          counter: 489.4,
          decimals: 1,
          suffix: "K",
          prefix: "$",
        },
        {
          id: 3,
          label: "Lead Coversation",
          badge: "ri-arrow-down-circle-line text-danger",
          icon: "ri-pulse-line",
          counter: 32.89,
          decimals: 2,
          suffix: "%",
          prefix: "",
        },
        {
          id: 4,
          label: "Daily Average Income",
          badge: "ri-arrow-up-circle-line text-success",
          icon: "ri-trophy-line",
          counter: 1596.5,
          decimals: 1,
          prefix: "$",
          separator: ",",
          suffix: "",
        },
        {
          id: 5,
          label: "Annual Deals",
          badge: "ri-arrow-down-circle-line text-danger",
          icon: "ri-service-line",
          counter: 2659,
          decimals: 0,
          separator: ",",
          suffix: "",
          prefix: "",
        },
      ],
    };
  },
  components: {
    CountTo
  }
};
</script>

<template>
  <div class="card crm-widget">
    <div class="card-body p-0">
      <div class="row row-cols-xxl-5 row-cols-md-3 row-cols-1 g-0">
        <div class="col" v-for="(item, index) of crmWidgets" :key="index">
          <div class="py-4 px-3">
            <h5 class="text-muted text-uppercase fs-13">
              {{ item.label }}
              <i :class="`${item.badge} fs-18 float-end align-middle`"></i>
            </h5>
            <div class="d-flex align-items-center">
              <div class="flex-shrink-0">
                <i :class="`${item.icon} display-6 text-muted`"></i>
              </div>
              <div class="flex-grow-1 ms-3">
                <h2 class="mb-0">
                  {{item.prefix}}<count-to :startVal='0' :endVal='item.counter' :duration='5000'></count-to>{{item.suffix}}
                </h2>
              </div>
            </div>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- end card body -->
  </div>
  <!-- end card -->
</template>
