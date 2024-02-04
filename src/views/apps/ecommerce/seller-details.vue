<script>
  import {
    CountTo
  } from "vue3-count-to";

  import SwiperCore from "swiper";
  import {
    Swiper,
    SwiperSlide
  } from "swiper/vue";
  import "swiper/swiper-bundle.css";

  SwiperCore.use([]);

  import Layout from "../../../layouts/main.vue";
  import appConfig from "../../../../app.config";
  import PageHeader from "@/components/page-header";

  export default {
    page: {
      title: "Seller Details",
      meta: [{
        name: "description",
        content: appConfig.description,
      }, ],
    },
    components: {
      CountTo,
      Layout,
      PageHeader,
      Swiper,
      SwiperSlide
    },
    data() {
      return {
        title: "Seller Details",
        items: [{
            text: "Ecommerce",
            href: "/",
          },
          {
            text: "Seller Details",
            active: true,
          },
        ],
        page: 1,
        perPage: 10,
        pages: [],
        series: [{
            name: "Orders",
            type: "area",
            data: [34, 65, 46, 68, 49, 61, 42, 44, 78, 52, 63, 67],
          },
          {
            name: "Earnings",
            type: "bar",
            data: [
              89.25, 98.58, 68.74, 108.87, 77.54, 84.03, 51.24, 28.57, 92.57,
              42.36, 88.51, 36.57,
            ],
          },
          {
            name: "Refunds",
            type: "line",
            data: [8, 12, 7, 17, 21, 11, 5, 9, 7, 29, 12, 35],
          },
        ],
        chartOptions: {
          chart: {
            height: 370,
            type: "line",
            toolbar: {
              show: false,
            },
          },
          stroke: {
            curve: "straight",
            dashArray: [0, 0, 8],
            width: [2, 0, 2.2],
          },
          fill: {
            opacity: [0.1, 0.9, 1],
          },
          markers: {
            size: [0, 0, 0],
            strokeWidth: 2,
            hover: {
              size: 4,
            },
          },
          xaxis: {
            categories: [
              "Jan",
              "Feb",
              "Mar",
              "Apr",
              "May",
              "Jun",
              "Jul",
              "Aug",
              "Sep",
              "Oct",
              "Nov",
              "Dec",
            ],
            axisTicks: {
              show: false,
            },
            axisBorder: {
              show: false,
            },
          },
          grid: {
            show: true,
            xaxis: {
              lines: {
                show: true,
              },
            },
            yaxis: {
              lines: {
                show: false,
              },
            },
            padding: {
              top: 0,
              right: -2,
              bottom: 15,
              left: 10,
            },
          },
          legend: {
            show: true,
            horizontalAlign: "center",
            offsetX: 0,
            offsetY: -5,
            markers: {
              width: 9,
              height: 9,
              radius: 6,
            },
            itemMargin: {
              horizontal: 10,
              vertical: 0,
            },
          },
          plotOptions: {
            bar: {
              columnWidth: "30%",
              barHeight: "70%",
            },
          },
          colors: ["#45CB85", "#4b38b3", "#f06548"],
          tooltip: {
            shared: true,
            y: [{
                formatter: function (y) {
                  if (typeof y !== "undefined") {
                    return y.toFixed(0);
                  }
                  return y;
                },
              },
              {
                formatter: function (y) {
                  if (typeof y !== "undefined") {
                    return "$" + y.toFixed(2) + "k";
                  }
                  return y;
                },
              },
              {
                formatter: function (y) {
                  if (typeof y !== "undefined") {
                    return y.toFixed(0) + " Sales";
                  }
                  return y;
                },
              },
            ],
          },
        },
        productsData: [{
            image: require("@/assets/images/products/img-1.png"),
            name: "Half Sleeve Round Neck T-Shirts",
            category: "Clothes",
            stock: "12",
            price: "$ 115.00",
            orders: "48",
            rating: "4.2",
            publishedDate: ["12 Oct, 2021", "10:05 AM"],
          },
          {
            image: require("@/assets/images/products/img-2.png"),
            name: "Urban Ladder Pashe Chair",
            category: "Furniture",
            stock: "06",
            price: "$ 160.00",
            orders: "30",
            rating: "4.3",
            publishedDate: ["06 Jan, 2021", "01:31 PM"],
          },
          {
            image: require("@/assets/images/products/img-3.png"),
            name: "350 ml Glass Grocery Container",
            category: "Kitchen Storage & Containers",
            stock: "10",
            price: "$ 25.00",
            orders: "48",
            rating: "4.5",
            publishedDate: ["26 Mar, 2021", "11:40 AM"],
          },
          {
            image: require("@/assets/images/products/img-4.png"),
            name: "Fabric Dual Tone Living Room Chair",
            category: "Furniture",
            stock: "15",
            price: "$ 140.00",
            orders: "40",
            rating: "4.2",
            publishedDate: ["19 Apr, 2021", "02:51 PM"],
          },
          {
            image: require("@/assets/images/products/img-5.png"),
            name: "Crux Motorsports Helmet",
            category: "Bike Accessories",
            stock: "08",
            price: "$ 135.00",
            orders: "55",
            rating: "4.4",
            publishedDate: ["30 Mar, 2021", "09:42 AM"],
          },
          {
            image: require("@/assets/images/products/img-6.png"),
            name: "Half Sleeve T-Shirts (Blue)",
            category: "Clothes",
            stock: "15",
            price: "$ 125.00",
            orders: "48",
            rating: "4.2",
            publishedDate: ["12 Oct, 2021", "04:55 PM"],
          },
          {
            image: require("@/assets/images/products/img-7.png"),
            name: "Noise Evolve Smartwatch",
            category: "Watches",
            stock: "12",
            price: "$ 95.00",
            orders: "45",
            rating: "4.3",
            publishedDate: ["15 May, 2021", "03:40 PM"],
          },
          {
            image: require("@/assets/images/products/img-8.png"),
            name: "Sweatshirt for Men (Pink)",
            category: "Clothes",
            stock: "20",
            price: "$ 120.00",
            orders: "48",
            rating: "4.2",
            publishedDate: ["21 Jun, 2021", "12:18 PM"],
          },
          {
            image: require("@/assets/images/products/img-9.png"),
            name: "Reusable Ecological Coffee Cup",
            category: "Tableware & Dinnerware",
            stock: "14",
            price: "$ 125.00",
            orders: "55",
            rating: "4.3",
            publishedDate: ["15 Jan, 2021", "10:29 AM"],
          },
          {
            image: require("@/assets/images/products/img-10.png"),
            name: "Travel Carrying Pouch Bag",
            category: "Bags, Wallets and Luggage",
            stock: "20",
            price: "$ 115.00",
            orders: "60",
            rating: "4.3",
            publishedDate: ["15 Jun, 2021", "03:51 Pm"],
          },
          {
            image: require("@/assets/images/products/img-1.png"),
            name: "Half Sleeve Round Neck T-Shirts",
            category: "Clothes",
            stock: "12",
            price: "$ 115.00",
            orders: "48",
            rating: "4.2",
            publishedDate: ["12 Oct, 2021", "10:05 AM"],
          },
          {
            image: require("@/assets/images/products/img-2.png"),
            name: "Urban Ladder Pashe Chair",
            category: "Furniture",
            stock: "06",
            price: "$ 160.00",
            orders: "30",
            rating: "4.3",
            publishedDate: ["06 Jan, 2021", "01:31 PM"],
          },
        ],
      };
    },
    computed: {
      displayedPosts() {
        return this.paginate(this.productsData);
      },
      resultQuery() {
        if (this.searchQuery) {
          const search = this.searchQuery.toLowerCase();
          return this.displayedPosts.filter((data) => {
            return (
              data.currency_name.toLowerCase().includes(search) ||
              data.price.includes(search) ||
              data.pairs.toLowerCase().includes(search) ||
              data.high.toLowerCase().includes(search) ||
              data.low.toLowerCase().includes(search) ||
              data.market.toLowerCase().includes(search) ||
              data.volume.toLowerCase().includes(search)
            );
          });
        } else {
          return this.displayedPosts;
        }
      },
    },
    watch: {
      productsData() {
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
        let numberOfPages = Math.ceil(this.productsData.length / this.perPage);
        for (let index = 1; index <= numberOfPages; index++) {
          this.pages.push(index);
        }
      },
      paginate(productsData) {
        let page = this.page;
        let perPage = this.perPage;
        let from = page * perPage - perPage;
        let to = page * perPage;
        return productsData.slice(from, to);
      },
    },
  };
</script>

<template>
  <Layout>
    <PageHeader :title="title" :items="items" />
    <div class="row">
      <div class="col-xxl-3">
        <div class="card">
          <div class="card-body p-4">
            <div>
              <div class="flex-shrink-0 avatar-md mx-auto">
                <div class="avatar-title bg-light rounded">
                  <img src="@/assets/images/companies/img-2.png" alt="" height="50" />
                </div>
              </div>
              <div class="mt-4 text-center">
                <h5 class="mb-1">Force Medicines</h5>
                <p class="text-muted">Since 1987</p>
              </div>
              <div class="table-responsive">
                <table class="table mb-0 table-borderless">
                  <tbody>
                    <tr>
                      <th><span class="fw-medium">Owner Name</span></th>
                      <td>David Marshall</td>
                    </tr>
                    <tr>
                      <th><span class="fw-medium">Company Type</span></th>
                      <td>Partnership</td>
                    </tr>
                    <tr>
                      <th><span class="fw-medium">Email</span></th>
                      <td>forcemedicines@gamil.com</td>
                    </tr>
                    <tr>
                      <th><span class="fw-medium">Website</span></th>
                      <td>
                        <a href="javascript:void(0);" class="link-primary">www.forcemedicines.com</a>
                      </td>
                    </tr>
                    <tr>
                      <th><span class="fw-medium">Contact No.</span></th>
                      <td>+(123) 9876 654 321</td>
                    </tr>
                    <tr>
                      <th><span class="fw-medium">Fax</span></th>
                      <td>+1 999 876 5432</td>
                    </tr>
                    <tr>
                      <th><span class="fw-medium">Location</span></th>
                      <td>United Kingdom</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!--end card-body-->
          <div class="card-body border-top border-top-dashed p-4">
            <div>
              <h6 class="text-muted text-uppercase fw-semibold mb-4">
                Customer Reviews
              </h6>
              <div>
                <div>
                  <div class="bg-light px-3 py-2 rounded-2 mb-2">
                    <div class="d-flex align-items-center">
                      <div class="flex-grow-1">
                        <div class="fs-16 align-middle text-warning">
                          <i class="ri-star-fill"></i>
                          <i class="ri-star-fill"></i>
                          <i class="ri-star-fill"></i>
                          <i class="ri-star-fill"></i>
                          <i class="ri-star-half-fill"></i>
                        </div>
                      </div>
                      <div class="flex-shrink-0">
                        <h6 class="mb-0">4.5 out of 5</h6>
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <div class="text-muted">
                      Total <span class="fw-medium">5.50k</span> reviews
                    </div>
                  </div>
                </div>

                <div class="mt-3">
                  <div class="row align-items-center g-2">
                    <div class="col-auto">
                      <div class="p-1">
                        <h6 class="mb-0">5 star</h6>
                      </div>
                    </div>
                    <div class="col">
                      <div class="p-1">
                        <div class="progress animated-progess progress-sm">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 50.16%"
                            aria-valuenow="50.16" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <div class="p-1">
                        <h6 class="mb-0 text-muted">2758</h6>
                      </div>
                    </div>
                  </div>
                  <!-- end row -->

                  <div class="row align-items-center g-2">
                    <div class="col-auto">
                      <div class="p-1">
                        <h6 class="mb-0">4 star</h6>
                      </div>
                    </div>
                    <div class="col">
                      <div class="p-1">
                        <div class="progress animated-progess progress-sm">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 29.32%"
                            aria-valuenow="29.32" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <div class="p-1">
                        <h6 class="mb-0 text-muted">1063</h6>
                      </div>
                    </div>
                  </div>
                  <!-- end row -->

                  <div class="row align-items-center g-2">
                    <div class="col-auto">
                      <div class="p-1">
                        <h6 class="mb-0">3 star</h6>
                      </div>
                    </div>
                    <div class="col">
                      <div class="p-1">
                        <div class="progress animated-progess progress-sm">
                          <div class="progress-bar bg-warning" role="progressbar" style="width: 18.12%"
                            aria-valuenow="18.12" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <div class="p-1">
                        <h6 class="mb-0 text-muted">997</h6>
                      </div>
                    </div>
                  </div>
                  <!-- end row -->

                  <div class="row align-items-center g-2">
                    <div class="col-auto">
                      <div class="p-1">
                        <h6 class="mb-0">2 star</h6>
                      </div>
                    </div>
                    <div class="col">
                      <div class="p-1">
                        <div class="progress animated-progess progress-sm">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 4.98%"
                            aria-valuenow="4.98" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <div class="p-1">
                        <h6 class="mb-0 text-muted">227</h6>
                      </div>
                    </div>
                  </div>
                  <!-- end row -->

                  <div class="row align-items-center g-2">
                    <div class="col-auto">
                      <div class="p-1">
                        <h6 class="mb-0">1 star</h6>
                      </div>
                    </div>
                    <div class="col">
                      <div class="p-1">
                        <div class="progress animated-progess progress-sm">
                          <div class="progress-bar bg-danger" role="progressbar" style="width: 7.42%"
                            aria-valuenow="7.42" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <div class="p-1">
                        <h6 class="mb-0 text-muted">408</h6>
                      </div>
                    </div>
                  </div>
                  <!-- end row -->
                </div>
              </div>
            </div>
          </div>
          <!--end card-body-->
          <div class="card-body p-4 border-top border-top-dashed">
            <h6 class="text-muted text-uppercase fw-semibold mb-4">
              Products Reviews
            </h6>
            <!-- Swiper -->
            <swiper class="vertical-swiper" :slidesPerView="2" :spaceBetween="10" :mousewheel="true" :loop="true"
              :direction="'vertical'" :autoplay="{
                delay: 2500,
                disableOnInteraction: false,
              }" style="height: 242px">
              <swiper-slide>
                <div class="swiper-slide">
                  <div class="card border border-dashed shadow-none">
                    <div class="card-body">
                      <div class="d-flex">
                        <div class="flex-shrink-0 avatar-sm">
                          <div class="avatar-title bg-light rounded">
                            <img src="@/assets/images/companies/img-1.png" alt="" height="30" />
                          </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <div>
                            <p class="text-muted mb-1 fst-italic text-truncate-two-lines">
                              " Great product and looks great, lots of features.
                              "
                            </p>
                            <div class="fs-11 align-middle text-warning">
                              <i class="ri-star-fill"></i>
                              <i class="ri-star-fill"></i>
                              <i class="ri-star-fill"></i>
                              <i class="ri-star-fill"></i>
                              <i class="ri-star-fill"></i>
                            </div>
                          </div>
                          <div class="text-end mb-0 text-muted">
                            - by
                            <cite title="Source Title">Force Medicines</cite>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </swiper-slide>
              <swiper-slide>
                <div class="swiper-slide">
                  <div class="card border border-dashed shadow-none">
                    <div class="card-body">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <img src="@/assets/images/users/avatar-3.jpg" alt="" class="avatar-sm rounded" />
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <div>
                            <p class="text-muted mb-1 fst-italic text-truncate-two-lines">
                              " Amazing template, very easy to understand and
                              manipulate. "
                            </p>
                            <div class="fs-11 align-middle text-warning">
                              <i class="ri-star-fill"></i>
                              <i class="ri-star-fill"></i>
                              <i class="ri-star-fill"></i>
                              <i class="ri-star-fill"></i>
                              <i class="ri-star-half-fill"></i>
                            </div>
                          </div>
                          <div class="text-end mb-0 text-muted">
                            - by
                            <cite title="Source Title">Henry Baird</cite>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </swiper-slide>
              <swiper-slide>
                <div class="swiper-slide">
                  <div class="card border border-dashed shadow-none">
                    <div class="card-body">
                      <div class="d-flex">
                        <div class="flex-shrink-0 avatar-sm">
                          <div class="avatar-title bg-light rounded">
                            <img src="@/assets/images/companies/img-8.png" alt="" height="30" />
                          </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <div>
                            <p class="text-muted mb-1 fst-italic text-truncate-two-lines">
                              "Very beautiful product and Very helpful customer
                              service."
                            </p>
                            <div class="fs-11 align-middle text-warning">
                              <i class="ri-star-fill"></i>
                              <i class="ri-star-fill"></i>
                              <i class="ri-star-fill"></i>
                              <i class="ri-star-line"></i>
                              <i class="ri-star-line"></i>
                            </div>
                          </div>
                          <div class="text-end mb-0 text-muted">
                            - by
                            <cite title="Source Title">Zoetic Fashion</cite>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </swiper-slide>
              <swiper-slide>
                <div class="swiper-slide">
                  <div class="card border border-dashed shadow-none">
                    <div class="card-body">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <img src="@/assets/images/users/avatar-2.jpg" alt="" class="avatar-sm rounded" />
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <div>
                            <p class="text-muted mb-1 fst-italic text-truncate-two-lines">
                              " The product is very beautiful. I like it. "
                            </p>
                            <div class="fs-11 align-middle text-warning">
                              <i class="ri-star-fill"></i>
                              <i class="ri-star-fill"></i>
                              <i class="ri-star-fill"></i>
                              <i class="ri-star-half-fill"></i>
                              <i class="ri-star-line"></i>
                            </div>
                          </div>
                          <div class="text-end mb-0 text-muted">
                            - by
                            <cite title="Source Title">Nancy Martino</cite>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </swiper-slide>
            </swiper>

            <div class="text-center mt-3">
              <a href="javascript:void(0)" class="link-primary">View All Reviews
                <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
            </div>
          </div>
          <div class="card-body p-4 border-top border-top-dashed">
            <h6 class="text-muted text-uppercase fw-semibold mb-4">
              Contact Support
            </h6>
            <form action="#">
              <div class="mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"
                  placeholder="Enter your messages..."></textarea>
              </div>
              <div class="text-end">
                <button type="submit" class="btn btn-primary">
                  <i class="ri-mail-send-line align-bottom me-1"></i> Send
                  Messages
                </button>
              </div>
            </form>
          </div>
          <!--end card-body-->
        </div>
        <!--end card-->
      </div>
      <!--end col-->

      <div class="col-xxl-9">
        <div class="card">
          <div class="card-header border-0 align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Revenue</h4>
            <div>
              <button type="button" class="btn btn-soft-secondary btn-sm me-1">
                ALL
              </button>
              <button type="button" class="btn btn-soft-secondary btn-sm me-1">
                1M
              </button>
              <button type="button" class="btn btn-soft-secondary btn-sm me-1">
                6M
              </button>
              <button type="button" class="btn btn-soft-primary btn-sm">
                1Y
              </button>
            </div>
          </div>
          <!-- end card header -->

          <div class="card-header p-0 border-0 bg-soft-light">
            <div class="row g-0 text-center">
              <div class="col-6 col-sm-3">
                <div class="p-3 border border-dashed border-start-0">
                  <h5 class="mb-1">
                    <count-to :duration="5000" :startVal="0" :endVal="7585"></count-to>
                  </h5>
                  <p class="text-muted mb-0">Orders</p>
                </div>
              </div>
              <!--end col-->
              <div class="col-6 col-sm-3">
                <div class="p-3 border border-dashed border-start-0">
                  <h5 class="mb-1">
                    $<count-to :duration="5000" :startVal="0" :endVal="22.89"></count-to>k
                  </h5>
                  <p class="text-muted mb-0">Earnings</p>
                </div>
              </div>
              <!--end col-->
              <div class="col-6 col-sm-3">
                <div class="p-3 border border-dashed border-start-0">
                  <h5 class="mb-1">
                    <count-to :duration="5000" :startVal="0" :endVal="367"></count-to>
                  </h5>
                  <p class="text-muted mb-0">Refunds</p>
                </div>
              </div>
              <!--end col-->
              <div class="col-6 col-sm-3">
                <div class="p-3 border border-dashed border-start-0 border-end-0">
                  <h5 class="mb-1 text-success">
                    <count-to :duration="5000" :startVal="0" :endVal="18.92"></count-to>%
                  </h5>
                  <p class="text-muted mb-0">Conversation Ratio</p>
                </div>
              </div>
              <!--end col-->
            </div>
          </div>
          <!-- end card header -->

          <div class="card-body p-0 pb-2">
            <div>
              <apexchart class="apex-charts" dir="ltr" :series="series" :options="chartOptions" height="370">
              </apexchart>
            </div>
          </div>
          <!-- end card body -->
        </div>
        <!-- end card -->

        <div class="row g-4 mb-3">
          <div class="col-sm-auto">
            <div>
              <router-link to="/ecommerce/add-product" class="btn btn-success"><i
                  class="ri-add-line align-bottom me-1"></i> Add New</router-link>
            </div>
          </div>
          <div class="col-sm">
            <div class="d-flex justify-content-sm-end">
              <div class="search-box ms-2">
                <input type="text" class="form-control" placeholder="Search Products..." />
                <i class="ri-search-line search-icon"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="table-card gridjs-border-none table-responsive">
              <table class="table align-middle table-nowrap mb-0" id="customerTable">
                <thead class="table-light">
                  <tr>
                    <th scope="col" style="width: 50px">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkAll" value="option" />
                      </div>
                    </th>
                    <th>
                      Product
                    </th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Orders</th>
                    <th>Rating</th>
                    <th>
                      Published
                    </th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="list form-check-all">
                  <tr class="gridjs-tr" v-for="(data, index) of resultQuery" :key="index">
                    <td data-column-id="productListAllCheckbox" class="gridjs-td">
                      <input type="checkbox" class="gridjs-checkbox" />
                    </td>
                    <td data-column-id="product" class="gridjs-td">
                      <span>
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar-sm bg-light rounded p-1">
                              <img :src="data.image" alt="" class="img-fluid d-block" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h5 class="fs-14 mb-1">
                              <router-link to="/ecommerce/product-details" class="text-dark">{{data.name}}</router-link>
                            </h5>
                            <p class="text-muted mb-0">
                              Category : <span class="fw-medium">{{data.category}}</span>
                            </p>
                          </div>
                        </div>
                      </span>
                    </td>
                    <td data-column-id="stock" class="gridjs-td">{{data.stock}}</td>
                    <td data-column-id="price" class="gridjs-td">{{data.price}}</td>
                    <td data-column-id="orders" class="gridjs-td">{{data.orders}}</td>
                    <td data-column-id="rating" class="gridjs-td">
                      <span><span class="badge bg-light text-body fs-12 fw-medium"><i
                            class="mdi mdi-star text-warning me-1"></i>{{data.rating}}</span></span>
                    </td>
                    <td data-column-id="published" class="gridjs-td">
                      <span>{{data.publishedDate[0]}}<small
                          class="text-muted ms-1">{{data.publishedDate[1]}}</small></span>
                    </td>
                    <td data-column-id="action" class="gridjs-td">
                      <span>
                        <div class="dropdown">
                          <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="ri-more-fill"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                              <router-link class="dropdown-item" to="/ecommerce/product-details"><i
                                  class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                View</router-link>
                            </li>
                            <li>
                              <router-link class="dropdown-item" to="/ecommerce/add-product"><i
                                  class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                Edit</router-link>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                              <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#removeItemModal"><i
                                  class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                Delete</a>
                            </li>
                          </ul>
                        </div>
                      </span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="d-flex justify-content-end m-3 pt-3">
              <div class="pagination-wrap hstack gap-2">
                <a class="page-item pagination-prev disabled" href="#" v-if="page != 1" @click="page--">
                  Previous
                </a>
                <ul class="pagination listjs-pagination mb-0">
                  <li class="active" v-for="(pageNumber, index) in pages.slice(page - 1, page + 5)" :key="index"
                    @click="page = pageNumber">
                    <a class="page" href="#">{{ pageNumber }}</a>
                  </li>
                </ul>
                <a class="page-item pagination-next" href="#" @click="page++" v-if="page < pages.length">
                  Next
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--end col-->
    </div>
    <!--end row-->
  </Layout>
</template>