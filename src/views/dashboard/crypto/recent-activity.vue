<script>
import { ArrowDownCircleIcon,
 SendIcon,
 ArrowUpCircleIcon
  } from '@zhuowenli/vue-feather-icons'

export default {
  setup() {
    return {
      recentActivity: [
        { id: 1, date: "25 Dec 2021", isDate: true },
        {
          id: 2,
          feaIcon: "arrow-down-circle",
          feaIconClass: "success",
          label: "Bought Bitcoin",
          caption: "Visa Debit Card ***6",
          captionColor: "success",
          coinActivity: "+0.04025745",
          coinActivityClass: "success",
          coinName: "Btc",
          price: "+878.52",
        },
        {
          id: 3,
          feaIcon: "send",
          feaIconClass: "warning",
          label: "Sent Eathereum",
          caption: " Sofia Cunha",
          captionColor: "warning",
          coinActivity: "-0.09025182",
          coinActivityClass: "muted",
          coinName: "Eth",
          price: "-659.35",
        },
        { id: 4, date: "24 Dec 2021", isDate: true },
        {
          id: 5,
          feaIcon: "arrow-up-circle",
          feaIconClass: "danger",
          label: "Sell Dash",
          caption: "www.cryptomarket.com",
          captionColor: "danger",
          coinActivity: "-98.6025422",
          coinActivityClass: "danger",
          coinName: "Dash",
          price: "-1508.98",
        },
        {
          id: 6,
          feaIcon: "arrow-up-circle",
          feaIconClass: "danger",
          label: "Sell Dogecoin",
          caption: "www.coinmarket.com",
          captionColor: "success",
          coinActivity: "-1058.08025142",
          coinActivityClass: "danger",
          coinName: "Doge",
          price: "-89.3",
        },
        {
          id: 7,
          feaIcon: "arrow-up-circle",
          feaIconClass: "success",
          label: "Bought Litecoin",
          caption: "Payment via Wallet",
          captionColor: "warning",
          coinActivity: "+0.07225912",
          coinActivityClass: "success",
          coinName: "Ltc",
          price: "+759.45",
        },
        { id: 8, date: "20 Dec 2021", isDate: true },
        {
          id: 9,
          feaIcon: "send",
          feaIconClass: "warning",
          label: "Sent Eathereum",
          caption: " Sofia Cunha",
          captionColor: "warning",
          coinActivity: "-0.09025182",
          coinActivityClass: "muted",
          coinName: "Eth",
          price: "-659.35",
        },
        {
          id: 10,
          feaIcon: "arrow-down-circle",
          feaIconClass: "success",
          label: "Bought Bitcoin",
          caption: "Visa Debit Card ***6",
          captionColor: "success",
          coinActivity: "+0.04025745",
          coinActivityClass: "success",
          coinName: "Btc",
          price: "+878.52",
        },
      ],
    };
  },
  components: {
    ArrowDownCircleIcon,
    SendIcon,
    ArrowUpCircleIcon
  }
};
</script>

<template>
  <div class="card card-height-100">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">Recent Activity</h4>
      <div class="flex-shrink-0">
        <div class="dropdown card-header-dropdown">
          <a
            class="text-reset dropdown-btn"
            href="#"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <span class="fw-semibold text-uppercase fs-12">Sort by: </span
            ><span class="text-muted"
              >Current Week<i class="mdi mdi-chevron-down ms-1"></i
            ></span>
          </a>
          <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="#">Today</a>
            <a class="dropdown-item" href="#">Last Week</a>
            <a class="dropdown-item" href="#">Last Month</a>
            <a class="dropdown-item" href="#">Current Year</a>
          </div>
        </div>
      </div>
    </div>
    <!-- end card header -->
    <div class="card-body p-0">
      <div data-simplebar style="height: 390px">
        <div class="p-3">
         
          <template v-for="(item, index) of recentActivity" :key="index"> 
          <div class="d-flex align-items-center mb-3" v-if="item.isDate != true">
            <div class="avatar-xs flex-shrink-0">
              <span class="avatar-title bg-light rounded-circle shadow">
                <template v-if="item.feaIcon == 'arrow-up-circle'">
                  <ArrowUpCircleIcon  class="icon-dual-danger icon-sm">

                  </ArrowUpCircleIcon>
                </template>
                 <template v-if="item.feaIcon == 'arrow-down-circle'">
                <arrow-down-circle-icon
                  class="icon-dual-success icon-sm"
                ></arrow-down-circle-icon>
                 </template>
                 <template v-if="item.feaIcon == 'send'">
                   <SendIcon class="icon-dual-warning icon-sm">

                   </SendIcon>
                 </template>
              </span>
            </div>
            <div class="flex-grow-1 ms-3">
              <h6 class="fs-14 mb-1">{{item.label}}</h6>
              <p class="text-muted fs-12 mb-0">
                <i
                  class="mdi mdi-circle-medium text-success fs-15 align-middle"
                ></i>
                {{item.caption}}
              </p>
            </div>
            <div class="flex-shrink-0 text-end">
              <h6 :class="`mb-1 text-${item.coinActivityClass}`">
                {{item.coinActivity}}<span class="text-uppercase ms-1">{{item.coinName}}</span>
              </h6>
              <p class="text-muted fs-13 mb-0">{{item.price}} USD</p>
            </div>
          </div>
          <!-- end -->
        
<h6 v-if="item.isDate == true" class="text-muted text-uppercase mb-3 fs-11">{{item.date}}</h6></template>
          <div class="mt-3 text-center">
            <a
              href="javascript:void(0);"
              class="text-muted text-decoration-underline"
              >Load More</a
            >
          </div>
        </div>
      </div>
    </div>
    <!-- end cardbody -->
  </div>
  <!-- end card -->
</template>
