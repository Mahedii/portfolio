<script>
import Multiselect from "@vueform/multiselect";
import "@vueform/multiselect/themes/default.css";

import { CountTo } from "vue3-count-to";
import SwiperCore from "swiper";
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/swiper-bundle.css";

import Lottie from "@/components/widgets/lottie.vue";
import animationData from "@/components/widgets/fhtaantg.json";
import animationData1 from "@/components/widgets/qhviklyi.json";
import animationData2 from "@/components/widgets/msoeawqm.json";
import animationData3 from "@/components/widgets/yeallgsa.json";
import animationData4 from "@/components/widgets/vaeagfzc.json";

SwiperCore.use([]);

import Layout from "../../../layouts/main.vue";
import PageHeader from "@/components/page-header";
import appConfig from "../../../../app.config";

export default {
  components: {
    Layout,
    PageHeader,
    CountTo,
    Swiper,
    SwiperSlide,
    lottie: Lottie,
    Multiselect
  },
  page: {
    title: "Transactions",
    meta: [{ name: "description", content: appConfig.description }],
  },
  data() {
    return {
      title: "Transactions",
      items: [
        {
          text: "Velzon",
          href: "/",
        },
        {
          text: "Transactions",
          active: true,
        },
      ],
      value2: null,
      transactions: [
        {
          icon: "ri-arrow-right-up-fill",
          date: "24 Dec, 2021",
          time: "08:58AM",
          image: require("@/assets/images/svg/crypto-icons/btc.svg"),
          currency: "BTC",
          from: "Wallet",
          to: "Thomas Taylor",
          details: "Membership Fees",
          id: "16b1d9234b61e8778d9e3588f20",
          type: "Withdraw",
          amount: "-142.35 BTC",
          amount1: "$697.88k",
          status: "Processing",
        },
        {
          icon: "ri-arrow-left-down-fill",
          date: "16 Dec, 2021",
          time: "10:58AM",
          image: require("@/assets/images/svg/crypto-icons/eth.svg"),
          currency: "ETH",
          from: "Tonya Noble",
          to: "Wallet",
          details: "Spring Telephone Network",
          id: "0a4b5e0e15d70ce79809eabbe",
          type: "Deposit",
          amount: "+342.35 ETH",
          amount1: "$14565.35",
          status: "Success",
        },
        {
          icon: "ri-arrow-left-down-fill",
          date: "04 Jan, 2021",
          time: "10:58AM",
          image: require("@/assets/images/svg/crypto-icons/eur.svg"),
          currency: "EUR",
          from: "Nancy Martino",
          to: "Wallet",
          details: "Funding Purse with Payment Check",
          id: "cca3da2b7711985361825f615e9",
          type: "Deposit",
          amount: "+174.23 EUR",
          amount1: "$354.14",
          status: "Failed",
        },
        {
          icon: "ri-arrow-right-up-fill",
          date: "28 Oct, 2021",
          time: "11:42AM",
          image: require("@/assets/images/svg/crypto-icons/gbp.svg"),
          currency: "GBP",
          from: "Wallet",
          to: "Michael Morris",
          details: "British Pound Sterling Block",
          id: "062e0e0123f2b1e9862f659c28",
          type: "Withdraw",
          amount: "-365.00 GBP",
          amount1: "$7532.21",
          status: "Success",
        },
        {
          icon: "ri-arrow-left-down-fill",
          date: "14 Nov, 2021",
          time: "12:38PM",
          image: require("@/assets/images/svg/crypto-icons/jpy.svg"),
          currency: "JPY",
          from: "Alexis Clarke",
          to: "Wallet",
          details: "Platinum Business",
          id: "1deffa9713917ee0af26bbb5f272",
          type: "Deposit",
          amount: "+341.74 JPY",
          amount1: "$748.10",
          status: "Processing",
        },
        {
          icon: "ri-arrow-right-up-fill",
          date: "02 Jan, 2021",
          time: "08:58AM",
          image: require("@/assets/images/svg/crypto-icons/xrp.svg"),
          currency: "XRP",
          from: "Wallet",
          to: "Kevin Dawson",
          details: "Business Advantage Fundaments - Banking",
          id: "186aa96d8014061d994f025ac4",
          type: "Withdraw",
          amount: "-240.74 XRP",
          amount1: "$3254.20",
          status: "Failed",
        },
        {
          icon: "ri-arrow-left-down-fill",
          date: "17 Oct, 2021",
          time: "07:08PM",
          image: require("@/assets/images/svg/crypto-icons/ltc.svg"),
          currency: "LTC",
          from: "Tonya Noble",
          to: "Wallet",
          details: "Litecoin Sale",
          id: "c94b5581418c41c2c74448a5ec",
          type: "Deposit",
          amount: "+298.72 LTC",
          amount1: "$149.32",
          status: "Success",
        },
        {
          icon: "ri-arrow-right-up-fill",
          date: "27 Dec, 2021",
          time: "01:24PM",
          image: require("@/assets/images/svg/crypto-icons/xmr.svg"),
          currency: "XMR",
          from: "Wallet",
          to: "Mary Cousar",
          details: "Monero Purchase",
          id: "9a592451d1b0e0e5af6d4908f7",
          type: "Withdraw",
          amount: "-365.13 XMR",
          amount1: "$754.91",
          status: "Failed",
        },
        {
          icon: "ri-arrow-left-down-fill",
          date: "23 Dec, 2021",
          time: "01:47AM",
          image: require("@/assets/images/svg/crypto-icons/xpm.svg"),
          currency: "XPM",
          from: "Glen Matney",
          to: "Wallet",
          details: "British Pound Sterling Block",
          id: "c1bf44fd100fff59a5c64c28dfe0",
          type: "Deposit",
          amount: "+174.09 XPM",
          amount1: "$657.28",
          status: "Processing",
        },
        {
          icon: "ri-arrow-left-down-fill",
          date: "15 Dec, 2021",
          time: "08:58AM",
          image: require("@/assets/images/svg/crypto-icons/ppt.svg"),
          currency: "PPT",
          from: "Timothy Smith",
          to: "Wallet",
          details: "British Pound Sterling Block",
          id: "v98p141d5f4j145614sdsa78gh48t98",
          type: "Withdraw",
          amount: "-142.35 PPT",
          amount1: "$398.35",
          status: "Success",
        },
      ],
      page: 1,
      perPage: 9,
      pages: [],
      searchQuery: null,
      defaultOptions: { animationData: animationData },
      defaultOptions1: { animationData: animationData1 },
      defaultOptions2: { animationData: animationData2 },
      defaultOptions3: { animationData: animationData3 },
      defaultOptions4: { animationData: animationData4 }
    };
  },
  computed: {
    displayedPosts() {
      return this.paginate(this.transactions);
    },
    resultQuery() {
      if (this.searchQuery) {
        const search = this.searchQuery.toLowerCase();
        return this.displayedPosts.filter((data) => {
          return (
            data.date.toLowerCase().includes(search) ||
            data.time.toLowerCase().includes(search) ||
            data.from.toLowerCase().includes(search) ||
            data.to.toLowerCase().includes(search) ||
            data.details.toLowerCase().includes(search) ||
            data.amount.toLowerCase().includes(search) ||
            data.amount1.toLowerCase().includes(search) ||
            data.status.toLowerCase().includes(search) ||
            data.type.toLowerCase().includes(search)
          );
        });
      } else {
        return this.displayedPosts;
      }
    },
  },
  watch: {
    transactions() {
      this.setPages();
    },
  },
  created() {
    this.setPages();
  },
  filters: {
    trimWords(value) {
      return value.split(" ").splice(0, 20).join(" ") + "...";
    },
  },
  methods: {
    setPages() {
      let numberOfPages = Math.ceil(this.transactions.length / this.perPage);
      for (let index = 1; index <= numberOfPages; index++) {
        this.pages.push(index);
      }
    },
    paginate(transactions) {
      let page = this.page;
      let perPage = this.perPage;
      let from = page * perPage - perPage;
      let to = page * perPage;
      return transactions.slice(from, to);
    },
  },
};
</script>

<template>
  <Layout>
    <PageHeader :title="title" :items="items" />
    <div class="row">
      <div class="col-xxl-3 col-md-6">
        <div class="card card-animate">
          <div class="card-body">
            <div class="d-flex mb-3">
              <div class="flex-grow-1">
                <lottie
                  colors="primary:#405189,secondary:#0ab39c"
                  :options="defaultOptions"
                  :height="55"
                  :width="55"
                 class="me-auto m-0"
                />
              </div>
              <div class="flex-shrink-0">
                <a
                  href="javascript:void(0);"
                  class="badge badge-soft-warning badge-border"
                  >BTC</a
                >
                <a
                  href="javascript:void(0);"
                  class="badge badge-soft-info badge-border"
                  >ETH</a
                >
                <a
                  href="javascript:void(0);"
                  class="badge badge-soft-primary badge-border"
                  >USD</a
                >
                <a
                  href="javascript:void(0);"
                  class="badge badge-soft-danger badge-border"
                  >EUR</a
                >
              </div>
            </div>
            <h3 class="mb-2">
              $ <count-to
                      :duration="5000"
                      :startVal="0"
                      :endVal="74854"
                    ></count-to><small class="text-muted fs-13">.68k</small>
            </h3>
            <h6 class="text-muted mb-0">Available Balance (USD)</h6>
          </div>
        </div>
        <!--end card-->
      </div>
      <!--end col-->
      <div class="col-xxl-3 col-md-6">
        <div class="card card-animate">
          <div class="card-body">
            <div class="d-flex mb-3">
              <div class="flex-grow-1">
                <lottie
                  colors="primary:#405189,secondary:#0ab39c"
                  :options="defaultOptions1"
                  :height="55"
                  :width="55"
                  class="me-auto m-0"
                />
              </div>
              <div class="flex-shrink-0">
                <a
                  href="javascript:void(0);"
                  class="badge badge-soft-warning badge-border"
                  >BTC</a
                >
                <a
                  href="javascript:void(0);"
                  class="badge badge-soft-info badge-border"
                  >ETH</a
                >
                <a
                  href="javascript:void(0);"
                  class="badge badge-soft-primary badge-border"
                  >USD</a
                >
                <a
                  href="javascript:void(0);"
                  class="badge badge-soft-danger badge-border"
                  >EUR</a
                >
              </div>
            </div>
            <h3 class="mb-2">
              $<count-to
                      :duration="5000"
                      :startVal="0"
                      :endVal="74361"
                    ></count-to><small class="text-muted fs-13">.34k</small>
            </h3>
            <h6 class="text-muted mb-0">Send (Previous Month)</h6>
          </div>
        </div>
        <!--end card-->
      </div>
      <!--end col-->
      <div class="col-xxl-3 col-md-6">
        <div class="card card-animate">
          <div class="card-body">
            <div class="d-flex mb-3">
              <div class="flex-grow-1">
                  <lottie
                        colors="primary:#405189,secondary:#0ab39c"
                        :options="defaultOptions3"
                        :height="55"
                        :width="55"
                        class="me-auto m-0"
                        />
              </div>
              <div class="flex-shrink-0">
                <a
                  href="javascript:void(0);"
                  class="badge badge-soft-warning badge-border"
                  >BTC</a
                >
                <a
                  href="javascript:void(0);"
                  class="badge badge-soft-info badge-border"
                  >ETH</a
                >
                <a
                  href="javascript:void(0);"
                  class="badge badge-soft-primary badge-border"
                  >USD</a
                >
                <a
                  href="javascript:void(0);"
                  class="badge badge-soft-danger badge-border"
                  >EUR</a
                >
              </div>
            </div>
            <h3 class="mb-2">
              $<count-to
                      :duration="5000"
                      :startVal="0"
                      :endVal="97685"
                    ></count-to><small class="text-muted fs-13">.22k</small>
            </h3>
            <h6 class="text-muted mb-0">Receive (Previous Month)</h6>
          </div>
        </div>
        <!--end card-->
      </div>
      <!--end col-->
      <div class="col-xxl-3 col-md-6">
        <swiper class="swiper-wrapper">
          <swiper-slide>
            <div class="card card-animate">
              <div class="card-body bg-soft-warning">
                <div class="d-flex mb-3">
                  <div class="flex-grow-1">
                   <lottie
                        colors="primary:#405189,secondary:#0ab39c"
                        :options="defaultOptions4"
                        :height="55"
                        :width="55"
                        class="me-auto m-0"
                        />
                  </div>
                  <div class="flex-shrink-0">
                    <a href="javascript:void(0);" class="fw-medium"
                      >Bitcoin (BTC)</a
                    >
                  </div>
                </div>
                <h3 class="mb-2">
                  $245<small class="text-muted fs-13">.65k</small>
                </h3>
                <h6 class="text-muted mb-0">Send - Receive (Previous Month)</h6>
              </div>
            </div>
            <!--end card-->
          </swiper-slide>
          <swiper-slide>
            <div class="card card-animate">
              <div class="card-body bg-soft-warning">
                <div class="d-flex mb-3">
                  <div class="flex-grow-1">
                      <lottie
                        colors="primary:#405189,secondary:#0ab39c"
                        :options="defaultOptions4"
                        :height="55"
                        :width="55"
                        class="me-auto m-0"
                        />
                  </div>
                  <div class="flex-shrink-0">
                    <a href="javascript:void(0);" class="fw-medium"
                      >Ethereum (ETH)</a
                    >
                  </div>
                </div>
                <h3 class="mb-2">
                  $24<small class="text-muted fs-13">.74k</small>
                </h3>
                <h6 class="text-muted mb-0">Send - Receive (Previous Month)</h6>
              </div>
            </div>
            <!--end card-->
          </swiper-slide>
          <swiper-slide>
            <div class="card card-animate">
              <div class="card-body bg-soft-warning">
                <div class="d-flex mb-3">
                  <div class="flex-grow-1">
                    <lottie
                        colors="primary:#405189,secondary:#0ab39c"
                        :options="defaultOptions4"
                        :height="55"
                        :width="55"
                        class="me-auto m-0"
                        />
                  </div>
                  <div class="flex-shrink-0">
                    <a href="javascript:void(0);" class="fw-medium"
                      >Monero (XMR)</a
                    >
                  </div>
                </div>
                <h3 class="mb-2">
                  $124<small class="text-muted fs-13">.36k</small>
                </h3>
                <h6 class="text-muted mb-0">Send - Receive (Previous Month)</h6>
              </div>
            </div>
            <!--end card-->
          </swiper-slide>
        </swiper>
      </div>
      <!--end col-->
    </div>
    <!--end row-->

    <div class="row align-items-center mb-4 g-3">
      <div class="col-sm-3">
        <div class="d-flex align-items-center gap-2">
          <span class="text-muted flex-shrink-0">Sort by: </span>

          <Multiselect class="form-control"
                          v-model="value2"
                          :close-on-select="true"
                          :searchable="true"
                          :create-option="true"
                          :options="[
                            { value: 'All', label: 'All' },
                            { value: 'USD', label: 'USD' },
                            { value: 'ETH', label: 'ETH' },
                            { value: 'BTC', label: 'BTC' },
                            { value: 'EUR', label: 'EUR' },
                            { value: 'JPY', label: 'JPY' }
                          ]"
                        />
        </div>
      </div>
      <!--end col-->
      <div class="col-sm-auto ms-auto">
        <div class="d-flex gap-2">
          <a
            href="javascript:void(0);"
            data-bs-toggle="modal"
            class="btn btn-info"
            >Deposite</a
          >
          <a
            href="javascript:void(0);"
            data-bs-toggle="modal"
            class="btn btn-danger"
            >Withdraw</a
          >
        </div>
      </div>
      <!--end col-->
    </div>
    <!--end row-->

    <div class="card" id="contactList">
      <div class="card-header">
        <div class="row align-items-center g-3">
          <div class="col-md-3">
            <h5 class="card-title mb-0">All Transactions</h5>
          </div>
          <!--end col-->
          <div class="col-md-auto ms-auto">
            <div class="d-flex gap-2">
              <div class="search-box">
                <input
                  type="text"
                  class="form-control search"
                  placeholder="Search for transactions..."
                />
                <i class="ri-search-line search-icon"></i>
              </div>
              <button class="btn btn-success">
                <i class="ri-equalizer-line align-bottom me-1"></i> Filters
              </button>
            </div>
          </div>
          <!--end col-->
        </div>
        <!--end row-->
      </div>
      <!--end card-header-->
      <div class="card-body">
        <div class="table-responsive table-card">
          <table class="table align-middle table-nowrap" id="customerTable">
            <thead class="table-light text-muted">
              <tr>
                <th
                  class="sort"
                  data-sort="name"
                  scope="col"
                  style="width: 60px"
                ></th>
                <th class="sort" data-sort="date" scope="col">Timestamp</th>
                <th class="sort" data-sort="currency_name" scope="col">
                  Currency
                </th>
                <th class="sort" data-sort="form_name" scope="col">Form</th>
                <th class="sort" data-sort="to_name" scope="col">To</th>
                <th class="sort" data-sort="details" scope="col">Details</th>
                <th class="sort" data-sort="transaction_id" scope="col">
                  Transaction ID
                </th>
                <th class="sort" data-sort="type" scope="col">Type</th>
                <th class="sort" data-sort="amount" scope="col">Amount</th>
                <th class="sort" data-sort="status" scope="col">Status</th>
              </tr>
              <!--end tr-->
            </thead>
            <tbody class="list form-check-all">
              <tr v-for="(data, index) of resultQuery" :key="index">
                <td class="id" style="display: none">
                  <a href="javascript:void(0);" class="fw-medium link-primary"
                    >#VZ001</a
                  >
                </td>
                <td>
                  <div class="avatar-xs">
                    <div
                      class="avatar-title rounded-circle fs-16"
                      :class="{
                        'text-success bg-soft-success':
                          data.icon == 'ri-arrow-left-down-fill',
                        'bg-soft-danger text-danger':
                          data.icon == 'ri-arrow-right-up-fill',
                      }"
                    >
                      <i :class="data.icon"></i>
                    </div>
                  </div>
                </td>
                <td class="date">
                  {{ data.date }}
                  <small class="text-muted">{{ data.time }}</small>
                </td>
                <td class="currency_name">
                  <div class="d-flex align-items-center">
                    <img :src="data.image" alt="" class="avatar-xxs me-2 rounded-circle shadow" />
                    {{ data.currency }}
                  </div>
                </td>
                <td class="form_name">{{ data.from }}</td>
                <td class="to_name">{{ data.to }}</td>
                <td class="details">{{ data.details }}</td>
                <td class="transaction_id">{{ data.id }}</td>
                <td class="type">{{ data.type }}</td>
                <td>
                  <h6
                    class="mb-1 amount"
                    :class="{
                      'text-success': data.icon == 'ri-arrow-left-down-fill',
                      'text-danger': data.icon == 'ri-arrow-right-up-fill',
                    }"
                  >
                    {{ data.amount }}
                  </h6>
                  <p class="text-muted mb-0">{{ data.amount1 }}</p>
                </td>
                <td class="status">
                  <span
                    class="badge fs-11"
                    :class="{
                      'badge-soft-success': data.status == 'Success',
                      'badge-soft-danger': data.status == 'Failed',
                      'badge-soft-warning': data.status == 'Processing',
                    }"
                    ><i class="ri-time-line align-bottom"></i>
                    {{ data.status }}</span
                  >
                </td>
              </tr>
              <!--end tr-->
            </tbody>
          </table>
          <!--end table-->
          <div class="noresult" style="display: none">
            <div class="text-center">
                <lottie
                    colors="primary:#405189,secondary:#0ab39c"
                    :options="defaultOptions2"
                    :height="75"
                    :width="75"
                    />
              <h5 class="mt-2">Sorry! No Result Found</h5>
              <p class="text-muted mb-0">
                We've searched more than 150+ transactions We did not find any
                transactions for you search.
              </p>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-end mt-3">
          <div
            class="pagination-wrap hstack gap-2"
          >
            <a
              class="page-item pagination-prev disabled"
              href="#"
              v-if="page != 1"
              @click="page--"
            >
              Previous
            </a>
            <ul class="pagination listjs-pagination mb-0">
              <li
                 :class="{
                    active: pageNumber == page,
                    disabled: pageNumber == '...',
                  }"
                v-for="(pageNumber, index) in pages.slice(page - 1, page + 5)"
                :key="index"
                @click="page = pageNumber"
              >
                <a class="page" href="#">{{ pageNumber }}</a>
              </li>
            </ul>
            <a
              class="page-item pagination-next"
              href="#"
              @click="page++"
              v-if="page < pages.length"
            >
              Next
            </a>
          </div>
        </div>
      </div>
      <!--end card-body-->
    </div>
    <!--end card-->
  </Layout>
</template>
