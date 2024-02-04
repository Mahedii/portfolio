<script>
  import Slider from "@vueform/slider";
  import Multiselect from "@vueform/multiselect";
  import Swal from "sweetalert2";
  import Layout from "../../../layouts/main.vue";
  import appConfig from "../../../../app.config";
  import "@vueform/multiselect/themes/default.css";
  import PageHeader from "@/components/page-header";
  import axios from 'axios';
  import animationData from "@/components/widgets/msoeawqm.json";
  import Lottie from "@/components/widgets/lottie.vue";

  export default {
    page: {
      title: "Products",
      meta: [{
        name: "description",
        content: appConfig.description,
      }, ],
    },
    data() {
      return {
        title: "Products",
        items: [{
            text: "Ecommerce",
            href: "/",
          },
          {
            text: "Products",
            active: true,
          },
        ],
        searchQuery: null,
        defaultOptions: {
          animationData: animationData
        },
        sliderCustomzie: [1000, 3000],
        productsData: [{
            id: 1,
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
            id: 2,
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
            id: 3,
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
            id: 4,
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
            id: 5,
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
            id: 6,
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
            id: 7,
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
            id: 8,
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
            id: 9,
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
            id: 10,
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
            id: 11,
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
            id: 12,
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
        pages: [],
        page: 1,
        perPage: 10,
        value: ["Watches", "Headset"],
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
              data.name.toLowerCase().includes(search) ||
              data.category.includes(search) ||
              data.stock.toLowerCase().includes(search) ||
              data.price.toLowerCase().includes(search) ||
              data.orders.toLowerCase().includes(search) ||
              data.rating.toLowerCase().includes(search) ||
              data.publishedDate[0].toLowerCase().includes(search)
            );
          });
        } else {
          return this.displayedPosts;
        }
      },
    },
    watch: {
      productsData(newValue) {
        this.setPages(newValue);
      },
      resultQuery() {
        if (this.searchQuery) this.setPages(this.displayedPosts);
        else this.setPages(this.productsData);
      },
    },
    created() {
      this.setPages(this.productsData);

    },
    filters: {
      trimWords(value) {
        return value.split(" ").splice(0, 20).join(" ") + "...";
      },
    },
    beforeMount() {
      axios.get('https://api-node.themesbrand.website/apps/product').then((data) => {
        this.productsData = [];
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep",
          "Oct", "Nov", "Dec"
        ];
        data.data.data.forEach(row => {
          var dd = new Date(row.publishedDate)
          row.publishedDate = dd.getDate() + " " + monthNames[dd.getMonth()] + ", " + dd.getFullYear();
          var hours = dd.getHours();
          var minutes = dd.getMinutes();
          var ampm = hours >= 12 ? 'PM' : 'AM';
          hours = hours % 12;
          hours = hours ? hours : 12; // the hour '0' should be '12'
          hours = hours < 10 ? '0' + hours : hours;
          minutes = minutes < 10 ? '0' + minutes : minutes;
          var strTime = hours + ':' + minutes + ' ' + ampm;
          row.publishedtime = strTime;
          row.image_src = 'https://api-node.themesbrand.website/images/products/' + row.image;
          // row.image_src = `@/assets/images/products/img-8.png`;
          this.productsData.push(row);
        })
      }).catch((er) => {
        console.log(er)
      });

    },

    methods: {
      deleteMultiple() {
        let ids_array = [];
        var items = document.getElementsByName("chk_child");
        items.forEach(function (ele) {
          if (ele.checked == true) {
            var trNode = ele.parentNode.parentNode;
            var id = trNode.querySelector(".id a").innerHTML;
            ids_array.push(id);
          }
        });
        if (typeof ids_array !== "undefined" && ids_array.length > 0) {
          if (confirm("Are you sure you want to delete this?")) {
            var cusList = this.productsData;
            ids_array.forEach(function (id) {
              cusList = cusList.filter(function (orders) {
                return orders.id != id;
              });
            });
            this.productsData = cusList;
            document.getElementById("checkAll").checked = false;
            var itemss = document.getElementsByName("chk_child");
            itemss.forEach(function (ele) {
              if (ele.checked == true) {
                ele.checked = false
                ele.closest("tr").classList.remove("table-active");
                document.getElementById('selection-element').style.display = 'none'
              }
            });
          } else {
            return false;
          }
        } else {
          Swal.fire({
            title: "Please select at least one checkbox",
            confirmButtonClass: "btn btn-info",
            buttonsStyling: false,
            showCloseButton: true,
          });
        }
      },
      setPages(data) {
        this.pages = [];
        let numberOfPages = Math.ceil(data.length / this.perPage);
        this.pages = [];
        for (let index = 1; index <= numberOfPages; index++) {
          this.pages.push(index);
        }
      },
      deletedata(event) {
        Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          cancelButtonColor: "#f46a6a",
          confirmButtonColor: "#34c38f",
          confirmButtonText: "Yes, delete it!",
        }).then((result) => {
          if (result.value) {
            this.productsData.splice(this.productsData.indexOf(event), 1);
            axios.delete(`https://api-node.themesbrand.website/apps/product/${event._id}`)
              .then(() => {

              }).catch((er) => {
                console.log(er)
              });
            Swal.fire("Deleted!", "Your file has been deleted.", "success");
          }
        });

      },
      paginate(productsData) {
        let page = this.page;
        let perPage = this.perPage;
        let from = page * perPage - perPage;
        let to = page * perPage;
        return productsData.slice(from, to);
      },
    },
    mounted() {
      var total = 0;
      var checkchild = document.querySelectorAll('.form-check-all input[type="checkbox"]');
      checkchild.forEach(function (checkbox) {
        checkbox.onclick = function () {
          total = 0
          checkchild.forEach(function (box) {
            if (box.checked == true) {
              total++;
            }
          })
          if (checkbox.checked == true) {
            checkbox.closest("tr").classList.add("table-active");
            document.getElementById('selection-element').style.display = 'block'
            document.getElementById('select-content').innerHTML = total;
          } else {
            if (total <= 0) {
              document.getElementById('selection-element').style.display = 'none'
            }
            checkbox.closest("tr").classList.remove("table-active");
            document.getElementById('select-content').innerHTML = total;
          }
        }
      })
      var checkAll = document.getElementById("checkAll");
      if (checkAll) {
        checkAll.onclick = function () {
          var checkboxes = document.querySelectorAll(
            '.form-check-all input[type="checkbox"]'
          );
          if (checkAll.checked == true) {
            checkboxes.forEach(function (checkbox) {
              checkbox.checked = true;
              document.getElementById('selection-element').style.display = 'block'
              document.getElementById('select-content').innerHTML = checkboxes.length;
              checkbox.closest("tr").classList.add("table-active");
            });
          } else {
            checkboxes.forEach(function (checkbox) {
              checkbox.checked = false;
              document.getElementById('selection-element').style.display = 'none'
              checkbox.closest("tr").classList.remove("table-active");
            });
          }
        };
      }
    },

    components: {
      Layout,
      PageHeader,
      lottie: Lottie,
      Slider,
      Multiselect,
    },
  };
</script>

<template>
  <Layout>
    <PageHeader :title="title" :items="items" />
    <div class="row">
      <div class="col-xl-3 col-lg-4">
        <div class="card">
          <div class="card-header">
            <div class="d-flex mb-3">
              <div class="flex-grow-1">
                <h5 class="fs-16">Filters</h5>
              </div>
              <div class="flex-shrink-0">
                <a href="#" class="text-decoration-underline">Clear All</a>
              </div>
            </div>

            <div class="filter-choices-input">
              <Multiselect v-model="value" mode="tags" :close-on-select="false" :searchable="true" :create-option="true"
                :options="[
                  { value: 'Watches', label: 'Watches' },
                  { value: 'Headset', label: 'Headset' },
                  { value: 'Sweatshirt', label: 'Sweatshirt' },
                  { value: '20% Off', label: '20% Off' },
                  { value: '4 Star', label: '4 Star' },
                ]" />
            </div>
          </div>

          <div class="accordion accordion-flush">
            <div class="card-body border-bottom">
              <div>
                <p class="text-muted text-uppercase fs-12 fw-medium mb-2">
                  Products
                </p>
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#" class="d-flex py-1">
                      <div class="flex-grow-1">
                        <h5 class="fs-13 mb-0">Grocery</h5>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a class="d-flex py-1" data-bs-toggle="collapse" href="#filterlist-fashion" role="button"
                      aria-expanded="true" aria-controls="filterlist-fashion">
                      <div class="flex-grow-1">
                        <h5 class="fs-13 mb-0">Fashion</h5>
                      </div>
                      <div class="flex-shrink-0 ms-2">
                        <span class="badge bg-light text-muted">5</span>
                      </div>
                    </a>

                    <div class="collapse show" id="filterlist-fashion">
                      <ul class="ps-4">
                        <li>
                          <a href="#" class="d-block py-1 text-muted">Men's Wear</a>
                        </li>
                        <li>
                          <a href="#" class="d-block py-1 text-muted">Women Western Wear</a>
                        </li>
                        <li>
                          <a href="#" class="d-block py-1 text-muted">Footwear</a>
                        </li>
                        <li>
                          <a href="#" class="d-block py-1 text-muted">Watches</a>
                        </li>
                        <li>
                          <a href="#" class="d-block py-1 text-muted">Kids</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li>
                    <a href="#" class="d-flex py-1">
                      <div class="flex-grow-1">
                        <h5 class="fs-13 mb-0">Mobiles</h5>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a class="d-flex py-1" data-bs-toggle="collapse" href="#filterlist-electronics" role="button"
                      aria-expanded="false" aria-controls="filterlist-electronics">
                      <div class="flex-grow-1">
                        <h5 class="fs-13 mb-0">Electronics</h5>
                      </div>
                      <div class="flex-shrink-0 ms-2">
                        <span class="badge bg-light text-muted">5</span>
                      </div>
                    </a>

                    <div class="collapse" id="filterlist-electronics">
                      <ul class="ps-4">
                        <li>
                          <a href="#" class="d-block py-1 text-muted">Audio</a>
                        </li>
                        <li>
                          <a href="#" class="d-block py-1 text-muted">Computer</a>
                        </li>
                        <li>
                          <a href="#" class="d-block py-1 text-muted">Laptop</a>
                        </li>
                        <li>
                          <a href="#" class="d-block py-1 text-muted">Gaming</a>
                        </li>
                        <li>
                          <a href="#" class="d-block py-1 text-muted">Tablets</a>
                        </li>
                      </ul>
                    </div>
                  </li>

                  <li>
                    <a class="d-flex py-1" data-bs-toggle="collapse" href="#filterlist-furniture" role="button"
                      aria-expanded="false" aria-controls="filterlist-furniture">
                      <div class="flex-grow-1">
                        <h5 class="fs-13 mb-0">Home & Furniture</h5>
                      </div>
                      <div class="flex-shrink-0 ms-2">
                        <span class="badge bg-light text-muted">6</span>
                      </div>
                    </a>

                    <div class="collapse" id="filterlist-furniture">
                      <ul class="ps-4">
                        <li>
                          <a href="#" class="d-block py-1 text-muted">Home Furnishing</a>
                        </li>
                        <li>
                          <a href="#" class="d-block py-1 text-muted">Living rooms</a>
                        </li>
                        <li>
                          <a href="#" class="d-block py-1 text-muted">Kitchen & Dining</a>
                        </li>
                        <li>
                          <a href="#" class="d-block py-1 text-muted">Bedroom Room</a>
                        </li>
                        <li>
                          <a href="#" class="d-block py-1 text-muted">Home Decor</a>
                        </li>
                        <li>
                          <a href="#" class="d-block py-1 text-muted">Tools & Utility</a>
                        </li>
                      </ul>
                    </div>
                  </li>

                  <li>
                    <a class="d-flex py-1" data-bs-toggle="collapse" href="#filterlist-appliances" role="button"
                      aria-expanded="false" aria-controls="filterlist-appliances">
                      <div class="flex-grow-1">
                        <h5 class="fs-13 mb-0">Appliances</h5>
                      </div>
                      <div class="flex-shrink-0 ms-2">
                        <span class="badge bg-light text-muted">7</span>
                      </div>
                    </a>

                    <div class="collapse" id="filterlist-appliances">
                      <ul class="ps-4">
                        <li>
                          <a href="#" class="d-block py-1 text-muted">Televisions</a>
                        </li>
                        <li>
                          <a href="#" class="d-block py-1 text-muted">Washing Machines</a>
                        </li>
                        <li>
                          <a href="#" class="d-block py-1 text-muted">Air Conditioners</a>
                        </li>
                        <li>
                          <a href="#" class="d-block py-1 text-muted">Refrigerator</a>
                        </li>
                        <li>
                          <a href="#" class="d-block py-1 text-muted">Kitchen Appliances</a>
                        </li>
                        <li>
                          <a href="#" class="d-block py-1 text-muted">Home Appliances</a>
                        </li>
                        <li>
                          <a href="#" class="d-block py-1 text-muted">Premium Appliances</a>
                        </li>
                      </ul>
                    </div>
                  </li>

                  <li>
                    <a href="#" class="d-flex py-1">
                      <div class="flex-grow-1">
                        <h5 class="fs-13 mb-0">Kids</h5>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>

            <div class="card-body border-bottom">
              <p class="text-muted text-uppercase fs-12 fw-medium mb-5">
                Price
              </p>

              <div id="product-price-range"></div>
              <Slider v-model="sliderCustomzie" :min="0" :max="5000" />
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingBrands">
                <button class="accordion-button bg-transparent shadow-none" type="button" data-bs-toggle="collapse"
                  data-bs-target="#flush-collapseBrands" aria-expanded="true" aria-controls="flush-collapseBrands">
                  <span class="text-muted text-uppercase fs-12 fw-medium">Brands</span>
                  <span class="badge bg-success rounded-pill align-middle ms-1">2</span>
                </button>
              </h2>

              <div id="flush-collapseBrands" class="accordion-collapse collapse show"
                aria-labelledby="flush-headingBrands">
                <div class="accordion-body text-body pt-0">
                  <div class="search-box search-box-sm">
                    <input type="text" class="form-control bg-light border-0" placeholder="Search Brands..." />
                    <i class="ri-search-line search-icon"></i>
                  </div>
                  <div class="d-flex flex-column gap-2 mt-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="productBrandRadio5" checked />
                      <label class="form-check-label" for="productBrandRadio5">Boat</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="productBrandRadio4" />
                      <label class="form-check-label" for="productBrandRadio4">OnePlus</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="productBrandRadio3" />
                      <label class="form-check-label" for="productBrandRadio3">Realme</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="productBrandRadio2" />
                      <label class="form-check-label" for="productBrandRadio2">Sony</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="productBrandRadio1" checked />
                      <label class="form-check-label" for="productBrandRadio1">JBL</label>
                    </div>

                    <div>
                      <button type="button"
                        class="btn btn-link text-decoration-none text-uppercase fw-medium p-0 shadow-none">
                        1,235 More
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end accordion-item -->

            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingDiscount">
                <button class="accordion-button bg-transparent shadow-none collapsed" type="button"
                  data-bs-toggle="collapse" data-bs-target="#flush-collapseDiscount" aria-expanded="true"
                  aria-controls="flush-collapseDiscount">
                  <span class="text-muted text-uppercase fs-12 fw-medium">Discount</span>
                  <span class="badge bg-success rounded-pill align-middle ms-1">1</span>
                </button>
              </h2>
              <div id="flush-collapseDiscount" class="accordion-collapse collapse"
                aria-labelledby="flush-headingDiscount">
                <div class="accordion-body text-body pt-1">
                  <div class="d-flex flex-column gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="productdiscountRadio6" />
                      <label class="form-check-label" for="productdiscountRadio6">
                        50% or more
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="productdiscountRadio5" />
                      <label class="form-check-label" for="productdiscountRadio5">
                        40% or more
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="productdiscountRadio4" />
                      <label class="form-check-label" for="productdiscountRadio4">
                        30% or more
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="productdiscountRadio3" checked />
                      <label class="form-check-label" for="productdiscountRadio3">
                        20% or more
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="productdiscountRadio2" />
                      <label class="form-check-label" for="productdiscountRadio2">
                        10% or more
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="productdiscountRadio1" />
                      <label class="form-check-label" for="productdiscountRadio1">
                        Less than 10%
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end accordion-item -->

            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingRating">
                <button class="accordion-button bg-transparent shadow-none collapsed" type="button"
                  data-bs-toggle="collapse" data-bs-target="#flush-collapseRating" aria-expanded="false"
                  aria-controls="flush-collapseRating">
                  <span class="text-muted text-uppercase fs-12 fw-medium">Rating</span>
                  <span class="badge bg-success rounded-pill align-middle ms-1">1</span>
                </button>
              </h2>

              <div id="flush-collapseRating" class="accordion-collapse collapse" aria-labelledby="flush-headingRating">
                <div class="accordion-body text-body">
                  <div class="d-flex flex-column gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="productratingRadio4" checked />
                      <label class="form-check-label" for="productratingRadio4">
                        <span class="text-muted">
                          <i class="mdi mdi-star text-warning"></i>
                          <i class="mdi mdi-star text-warning"></i>
                          <i class="mdi mdi-star text-warning"></i>
                          <i class="mdi mdi-star text-warning"></i>
                          <i class="mdi mdi-star"></i>
                        </span>
                        4 & Above
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="productratingRadio3" />
                      <label class="form-check-label" for="productratingRadio3">
                        <span class="text-muted">
                          <i class="mdi mdi-star text-warning"></i>
                          <i class="mdi mdi-star text-warning"></i>
                          <i class="mdi mdi-star text-warning"></i>
                          <i class="mdi mdi-star"></i>
                          <i class="mdi mdi-star"></i>
                        </span>
                        3 & Above
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="productratingRadio2" />
                      <label class="form-check-label" for="productratingRadio2">
                        <span class="text-muted">
                          <i class="mdi mdi-star text-warning"></i>
                          <i class="mdi mdi-star text-warning"></i>
                          <i class="mdi mdi-star"></i>
                          <i class="mdi mdi-star"></i>
                          <i class="mdi mdi-star"></i>
                        </span>
                        2 & Above
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="productratingRadio1" />
                      <label class="form-check-label" for="productratingRadio1">
                        <span class="text-muted">
                          <i class="mdi mdi-star text-warning"></i>
                          <i class="mdi mdi-star"></i>
                          <i class="mdi mdi-star"></i>
                          <i class="mdi mdi-star"></i>
                          <i class="mdi mdi-star"></i>
                        </span>
                        1
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end accordion-item -->
          </div>
        </div>
        <!-- end card -->
      </div>
      <!-- end col -->

      <div class="col-xl-9 col-lg-8">
        <div>
          <div class="card">
            <div class="card-header border-0">
              <div class="row g-4">
                <div class="col-sm-auto">
                  <div>
                    <router-link to="/ecommerce/add-product" class="btn btn-success"><i
                        class="ri-add-line align-bottom me-1"></i> Add
                      Product</router-link>
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
            </div>

            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#productnav-all" role="tab">
                        All
                        <span class="badge badge-soft-danger align-middle rounded-pill ms-1">12</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="col-auto">
                  <div id="selection-element">
                    <div class="my-n1 d-flex align-items-center text-muted">
                      Select
                      <div id="select-content" class="text-body fw-semibold px-1"></div>
                      Result
                      <button type="button" class="btn btn-link link-danger p-0 ms-3 shadow-none" data-bs-toggle="modal"
                        data-bs-target="#removeItemModal">
                        Remove
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end card header -->
            <div class="card-body">
              <div class="tab-content text-muted">
                <div class="tab-pane active" id="productnav-all" role="tabpanel">
                  <div id="table-product-list-all" class="table-card gridjs-border-none">
                    <table class="table align-middle table-nowrap mb-0" id="customerTable">
                      <thead class="table-light">
                        <tr>
                          <th scope="col" style="width: 50px">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="checkAll" value="option" />
                            </div>
                          </th>
                          <th>Product</th>
                          <th>Stock</th>
                          <th>Price</th>
                          <th>Orders</th>
                          <th>Rating</th>
                          <th>Published</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody class="list form-check-all">
                        <tr class="gridjs-tr" v-for="(data, index) of resultQuery" :key="index">
                          <td data-column-id="productListAllCheckbox" class="gridjs-td">
                            <input type="checkbox" name="chk_child" class="form-check-input" />
                          </td>
                          <td class="id" hidden>
                            <a href="">{{data.id}}</a>
                          </td>
                          <td data-column-id="product" class="gridjs-td">
                            <span>
                              <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                  <div class="avatar-sm bg-light rounded p-1">
                                    <img :src="data.image_src" alt="" class="img-fluid d-block" />
                                  </div>
                                </div>
                                <div class="flex-grow-1">
                                  <h5 class="fs-14 mb-1">
                                    <router-link to="/ecommerce/product-details" class="text-dark">{{ data.name }}
                                    </router-link>
                                  </h5>
                                  <p class="text-muted mb-0">
                                    Category :
                                    <span class="fw-medium">{{
                                      data.category
                                    }}</span>
                                  </p>
                                </div>
                              </div>
                            </span>
                          </td>
                          <td data-column-id="stock" class="gridjs-td">
                            {{ data.stock }}
                          </td>
                          <td data-column-id="price" class="gridjs-td">
                            $ {{ data.price }}.00
                          </td>
                          <td data-column-id="orders" class="gridjs-td">
                            {{ data.orders }}
                          </td>
                          <td data-column-id="rating" class="gridjs-td">
                            <span><span class="badge bg-light text-body fs-12 fw-medium"><i
                                  class="mdi mdi-star text-warning me-1"></i>{{ data.rating }}</span></span>
                          </td>
                          <td data-column-id="published" class="gridjs-td">
                            <span>{{ data.publishedDate
                              }}<small class="text-muted ms-1">{{
                                data.publishedtime
                              }}</small></span>
                          </td>
                          <td data-column-id="action" class="gridjs-td">
                            <span>
                              <div class="dropdown">
                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                  data-bs-toggle="dropdown" aria-expanded="false">
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
                                    <a class="dropdown-item" @click="deletedata(data)">
                                      <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                      Delete</a>
                                  </li>
                                </ul>
                              </div>
                            </span>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="d-flex justify-content-end m-3">
                      <div class="pagination-wrap hstack gap-2">
                        <a class="page-item pagination-prev disabled" href="#" v-if="page != 1" @click="page--">
                          Previous
                        </a>
                        <ul class="pagination listjs-pagination mb-0">
                          <li v-for="(pageNumber, index) in pages.slice(
                              page - 1,
                              page + 5
                            )" :key="index" @click="page = pageNumber" :class="{
                              active: pageNumber == page,
                              disabled: pageNumber == '...',
                            }">
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
                <!-- end tab pane -->

                <div class="tab-pane" id="productnav-published" role="tabpanel">
                  <div id="table-product-list-published" class="table-card gridjs-border-none"></div>
                </div>
                <!-- end tab pane -->

                <div class="tab-pane" id="productnav-draft" role="tabpanel">
                  <div class="py-4 text-center">
                    <div>
                      <lottie class="avatar-xl" colors="primary:#121331,secondary:#08a88a" :options="defaultOptions"
                        :height="75" :width="75" />
                    </div>

                    <div class="mt-4">
                      <h5>Sorry! No Result Found</h5>
                    </div>
                  </div>
                </div>
                <!-- end tab pane -->
              </div>
              <!-- end tab content -->
            </div>
            <!-- end card body -->
          </div>
          <!-- end card -->
        </div>
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->
  </Layout>
</template>