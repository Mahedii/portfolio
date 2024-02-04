<script>
  import Multiselect from "@vueform/multiselect";
  import "@vueform/multiselect/themes/default.css";

  import Layout from "../../../layouts/main.vue";
  import PageHeader from "@/components/page-header";
  import appConfig from "../../../../app.config";
  import Swal from "sweetalert2";

  import Lottie from "@/components/widgets/lottie.vue";
  import animationData from "@/components/widgets/msoeawqm.json";
  import axios from 'axios';
  import animationData1 from "@/components/widgets/gsqxdxog.json";

  export default {
    page: {
      title: "Companies",
      meta: [{
        name: "description",
        content: appConfig.description
      }],
    },
    components: {
      Layout,
      PageHeader,
      lottie: Lottie,
      Multiselect,
    },
    data() {
      return {
        title: "Companies",
        items: [{
            text: "CRM",
            href: "/",
          },
          {
            text: "Contacts",
            active: true,
          },
        ],
        value: null,
        page: 1,
        perPage: 8,
        pages: [],
        searchQuery: null,
        companies: [{
            id: "1",
            name: "Nesta Technologies",
            owner: "Tonya Noble",
            industry_type: "Computer Industry",
            star_value: "4.5",
            location: "Los Angeles, USA",
            employee: "10-30",
            website: "www.abcd.com",
            contact_email: "info@abcd.com",
            since: "1995",
            image_src: require("@/assets/images/brands/dribbble.png"),
          },
          {
            id: "2",
            name: "iTest Factory",
            owner: "Thomas Taylor",
            industry_type: "Chemical Industries",
            star_value: "3.8",
            location: "Berlin, Germany",
            employee: "10-15",
            website: "www.itesttech.com",
            contact_email: "info@itesttech.com",
            since: "2005",
            image_src: require("@/assets/images/brands/bitbucket.png")
          },
          {
            id: "3",
            name: "Force Medicines",
            owner: "Glen Matney",
            industry_type: "Health Services",
            star_value: "3.1",
            location: "Phoenix, USA",
            employee: "10-15",
            website: "www.forcemedicine.com",
            contact_email: "info@forcemedicine.com",
            since: "1998",
            image_src: require("@/assets/images/companies/img-8.png")
          },
          {
            id: "4",
            name: "Digitech Galaxy",
            owner: "Alexis Clarke",
            industry_type: "Telecommunications Services",
            star_value: "3.2",
            location: "Bogota, Colombia",
            employee: "10-25",
            website: "www.digitech.com",
            contact_email: "info@digitech.com",
            since: "1992",
            image_src: require("@/assets/images/companies/img-1.png")
          },
          {
            id: "5",
            name: "Zoetic Fashion",
            owner: "James Price",
            industry_type: "Textiles: Clothing, Footwear",
            star_value: "4.4",
            location: "Brasilia, Brazil",
            employee: "10-30",
            website: "www.zoetic.com",
            contact_email: "info@zoetic.com",
            since: "1993",
            image_src: require("@/assets/images/companies/img-6.png")
          },
          {
            id: "6",
            name: "Micro Design",
            owner: "Mary Cousar",
            industry_type: "Financial Services",
            star_value: "2.7",
            location: "Windhoek, Namibia",
            employee: "10-20",
            website: "www.microdesign.com",
            contact_email: "info@microdesign.com",
            since: "2005",
            image_src: require("@/assets/images/brands/dropbox.png")
          },
          {
            id: "7",
            name: "Syntyce Solutions",
            owner: "Michael Morris",
            industry_type: "Chemical Industries",
            star_value: "4.0",
            location: "Damascus, Syria",
            employee: "01-15",
            website: "www.syntycesolu.com",
            contact_email: "info@syntycesolu.com",
            since: "1991",
            image_src: require("@/assets/images/brands/mail_chimp.png")
          },
          {
            id: "8",
            name: "Meta4Systems",
            owner: "Nancy Martino",
            industry_type: "Computer Industry",
            star_value: "3.3",
            location: "London, UK",
            employee: "01-10",
            website: "www.meta4systems.com",
            contact_email: "info@meta4systems.com",
            since: "1989",
            image_src: require("@/assets/images/companies/img-3.png")
          },
          {
            id: "9",
            name: "Moetic Fashion",
            owner: "Timothy Smith",
            industry_type: "Textiles: Clothing, Footwear",
            star_value: "4.9",
            location: "Damascus, Syria",
            employee: "05-50",
            website: "www.moetic.com",
            contact_email: "info@moetic.com",
            since: "1975",
            image_src: require("@/assets/images/companies/img-4.png")
          },
          {
            id: "10",
            name: "Syntyce Solutions",
            owner: "Herbert Stokes",
            industry_type: "Health Services",
            star_value: "2.9",
            location: "Berlin, Germany",
            employee: "01-60",
            website: "www.syntyce.com",
            contact_email: "info@syntyce.com",
            since: "2009",
            image_src: require("@/assets/images/brands/slack.png")
          }
        ],
        defaultOptions: {
          animationData: animationData
        },
        defaultOptions1: {
          animationData: animationData1
        },
      };
    },
    computed: {
      displayedPosts() {
        return this.paginate(this.companies);
      },
      resultQuery() {
        if (this.searchQuery) {
          const search = this.searchQuery.toLowerCase();
          return this.displayedPosts.filter((data) => {
            return (
              data.compnayId.toLowerCase().includes(search) ||
              data.companyName.toLowerCase().includes(search) ||
              data.owner.toLowerCase().includes(search) ||
              data.industryType.toLowerCase().includes(search) ||
              data.rating.toLowerCase().includes(search) ||
              data.location.toLowerCase().includes(search)
            );
          });
        } else {
          return this.displayedPosts;
        }
      },
    },
    watch: {
      companies() {
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
      editdata(data) {
        document.getElementById('exampleModalLabel').innerHTML = "Edit Company"
        let result = this.companies.findIndex(o => o._id == data._id)
        document.getElementById('id').value = data._id
        document.getElementById('companyname').value = this.companies[result].name;
        document.getElementById('ownername').value = this.companies[result].owner;
        document.getElementById('industrytype').value = this.companies[result].industry_type;
        document.getElementById('starvalue').value = this.companies[result].star_value;
        document.getElementById('location').value = this.companies[result].location;
        document.getElementById('employee').value = this.companies[result].employee;
        document.getElementById('website').value = this.companies[result].website;
        document.getElementById('contactemail').value = this.companies[result].contact_email;
        document.getElementById('since').value = this.companies[result].since;

        document.getElementById('edit-btn').style.display = 'block';
        document.getElementById('add-btn').style.display = 'none'
      },
      updateorder() {
        let result = this.companies.findIndex(o => o._id == document.getElementById('id').value)
        this.companies[result].name = document.getElementById('companyname').value;
        this.companies[result].owner = document.getElementById('ownername').value;
        this.companies[result].industry_type = document.getElementById('industrytype').value;
        this.companies[result].star_value = document.getElementById('starvalue').value;
        this.companies[result].location = document.getElementById('location').value;
        this.companies[result].employee = document.getElementById('employee').value;
        this.companies[result].website = document.getElementById('website').value;
        this.companies[result].contact_email = document.getElementById('contactemail').value;
        this.companies[result].since = document.getElementById('since').value;
        document.getElementById('closemodal').click();
        axios.patch(`https://api-node.themesbrand.website/apps/company/${document.getElementById('id').value}`, this
            .companies[
              result])
          .then(() => {

          }).catch((er) => {
            console.log(er)
          });
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
            this.companies.splice(this.companies.indexOf(event), 1);
            axios.delete(`https://api-node.themesbrand.website/apps/company/${event._id}`)
              .then(() => {

              }).catch((er) => {
                console.log(er)
              });
            Swal.fire("Deleted!", "Your file has been deleted.", "success");
          }
        });
      },
      deleteMultiple() {
        let ids_array = [];
        var items = document.getElementsByName("chk_child");
        items.forEach(function (ele) {
          if (ele.checked == true) {
            var trNode = ele.parentNode.parentNode.parentNode;
            var id = trNode.querySelector(".id a").innerHTML;
            ids_array.push(id);
          }
        });
        if (typeof ids_array !== "undefined" && ids_array.length > 0) {
          if (confirm("Are you sure you want to delete this?")) {
            var cusList = this.companies;
            ids_array.forEach(function (id) {
              cusList = cusList.filter(function (orders) {
                return orders.id != id;
              });
            });
            this.companies = cusList;
            document.getElementById("checkAll").checked = false;
            var itemss = document.getElementsByName("chk_child");
            itemss.forEach(function (ele) {
              if (ele.checked == true) {
                ele.checked = false
                ele.closest("tr").classList.remove("table-active");
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
      addorder() {
        var id = this.companies.length + 1;
        var name = document.getElementById('companyname').value
        var owner = document.getElementById('ownername').value
        var industry_type = document.getElementById('industrytype').value
        var star_value = document.getElementById('starvalue').value
        var location = document.getElementById('location').value
        var employee = document.getElementById('employee').value
        var website = document.getElementById('website').value
        var contact_email = document.getElementById('contactemail').value
        var since = document.getElementById('since').value

        if (name != null && owner != null && industry_type != null && star_value != null && location != null &&
          employee != null && website != null && contact_email != null && since != null) {
          var data = {
            id: id,
            name: name,
            owner: owner,
            industry_type: industry_type,
            star_value: star_value,
            location: location,
            employee: employee,
            website: website,
            contact_email: contact_email,
            since: since,
            image_src: require("@/assets/images/brands/dribbble.png"),
          };
          this.companies.push(data)
          axios.post(`https://api-node.themesbrand.website/apps/company`, data)
            .then(() => {

            }).catch((er) => {
              console.log(er)
            });
        }
        document.getElementById('closemodal').click();
        document.getElementById("addform").reset();
      },
      addnew() {
        document.getElementById("addform").reset();
        document.getElementById('exampleModalLabel').innerHTML = "Add Company";
        document.getElementById('add-btn').style.display = 'block';
        document.getElementById('edit-btn').style.display = 'none';
      },
      showdetail(data) {
        document.getElementById('imageid').setAttribute('src', data.image_src)
        document.getElementById('cname').innerHTML = data.name;
        document.getElementById('oname').innerHTML = data.owner;
        document.getElementById('iname').innerHTML = data.industry_type;
        document.getElementById('rtng').innerHTML = data.star_value;
        document.getElementById('loc').innerHTML = data.location;
        document.getElementById('emp').innerHTML = data.employee;
        document.getElementById('webs').innerHTML = data.website;
        document.getElementById('eml').innerHTML = data.employee;
        document.getElementById('sic').innerHTML = data.since
      },
      setPages() {
        let numberOfPages = Math.ceil(this.companies.length / this.perPage);
        this.pages = [];
        for (let index = 1; index <= numberOfPages; index++) {
          this.pages.push(index);
        }
      },
      paginate(companies) {
        let page = this.page;
        let perPage = this.perPage;
        let from = page * perPage - perPage;
        let to = page * perPage;
        return companies.slice(from, to);
      },
    },
    beforeMount() {
      axios.get('https://api-node.themesbrand.website/apps/company').then((data) => {
        this.companies = [];
        data.data.data.forEach(row => {
          // row.image_src = `@/assets/images/products/img-8.png`;
          row.image_src = 'https://api-node.themesbrand.website/images/' + row.image_src;
          this.companies.push(row);
        })
      }).catch((er) => {
        console.log(er)
      });

    },

    mounted() {
      var checkAll = document.getElementById("checkAll");
      if (checkAll) {
        checkAll.onclick = function () {
          var checkboxes = document.querySelectorAll(
            '.form-check-all input[type="checkbox"]'
          );
          if (checkAll.checked == true) {
            checkboxes.forEach(function (checkbox) {
              checkbox.checked = true;
              checkbox.closest("tr").classList.add("table-active");
            });
          } else {
            checkboxes.forEach(function (checkbox) {
              checkbox.checked = false;
              checkbox.closest("tr").classList.remove("table-active");
            });
          }
        };
      }
    },
  };
</script>
<template>
  <Layout>
    <PageHeader :title="title" :items="items" />
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center flex-wrap gap-2">
              <div class="flex-grow-1">
                <button class="btn btn-info add-btn me-1" data-bs-toggle="modal" href="#showModal" @click="addnew">
                  <i class="ri-add-fill me-1 align-bottom"></i> Add Company
                </button>
                <button class="btn btn-soft-danger" @click="deleteMultiple">
                  <i class="ri-delete-bin-2-line"></i>
                </button>
              </div>
              <div class="flex-shrink-0">
                <div class="hstack text-nowrap gap-2">
                  <button class="btn btn-danger">
                    <i class="ri-filter-2-line me-1 align-bottom"></i> Filters
                  </button>
                  <button class="btn btn-soft-success shadow-none">Import</button>
                  <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"
                    class="btn btn-soft-info shadow-none">
                    <i class="ri-more-2-fill"></i>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                    <li><a class="dropdown-item" href="#">All</a></li>
                    <li><a class="dropdown-item" href="#">Last Week</a></li>
                    <li><a class="dropdown-item" href="#">Last Month</a></li>
                    <li><a class="dropdown-item" href="#">Last Year</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--end col-->
      <div class="col-xxl-9">
        <div class="card" id="companyList">
          <div class="card-header">
            <div class="row g-2">
              <div class="col-md-3">
                <div class="search-box">
                  <input type="text" class="form-control search" placeholder="Search for company..." />
                  <i class="ri-search-line search-icon"></i>
                </div>
              </div>
              <div class="col-md-auto ms-auto">
                <div class="d-flex align-items-center gap-2">
                  <span class="text-muted flex-shrink-0">Sort by: </span>

                  <Multiselect class="form-control" style="width:150px;" v-model="value" :close-on-select="true"
                    :searchable="true" :create-option="true" :options="[
                      { value: 'Owner', label: 'Owner' },
                      { value: 'Company', label: 'Company' },
                      { value: 'location', label: 'Location' },
                    ]" />
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div>
              <div class="table-responsive table-card mb-3">
                <table class="table align-middle table-nowrap mb-0" id="customerTable">
                  <thead class="table-light">
                    <tr>
                      <th scope="col" style="width: 50px">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="checkAll" value="option" />
                        </div>
                      </th>
                      <th class="sort" data-sort="name" scope="col">
                        Company Name
                      </th>
                      <th class="sort" data-sort="owner" scope="col">Owner</th>
                      <th class="sort" data-sort="industry_type" scope="col">
                        Industry Type
                      </th>
                      <th class="sort" data-sort="star_value" scope="col">
                        Rating
                      </th>
                      <th class="sort" data-sort="location" scope="col">
                        Location
                      </th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody class="list form-check-all">
                    <tr v-for="(data, index) of resultQuery" :key="index">
                      <th scope="row">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="chk_child" value="option1" />
                        </div>
                      </th>
                      <td class="id" style="display: none">
                        <a href="javascript:void(0);" class="fw-medium link-primary">{{ data._id }}</a>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0">
                            <img :src="data.image_src" alt="" class="avatar-xxs rounded-circle" />
                          </div>
                          <div class="flex-grow-1 ms-2 name">
                            {{data.name }}
                          </div>
                        </div>
                      </td>
                      <td class="owner">{{ data.owner }}</td>
                      <td class="industry_type">{{ data.industry_type }}</td>
                      <td>
                        <span class="star_value">{{ data.star_value }}</span>
                        <i class="ri-star-fill text-warning align-bottom"></i>
                      </td>
                      <td class="location">{{ data.location }}</td>
                      <td>
                        <ul class="list-inline hstack gap-2 mb-0">
                          <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-placement="top" title="Call">
                            <a href="javascript:void(0);" class="text-muted d-inline-block">
                              <i class="ri-phone-line fs-16"></i>
                            </a>
                          </li>
                          <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-placement="top" title="Message">
                            <a href="javascript:void(0);" class="text-muted d-inline-block">
                              <i class="ri-question-answer-line fs-16"></i>
                            </a>
                          </li>
                          <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-placement="top" title="View" @click="showdetail(data)">
                            <a href="javascript:void(0);"><i class="ri-eye-fill align-bottom text-muted"></i></a>
                          </li>
                          <li class="list-inline-item" data-bs-toggle="modal" data-bs-trigger="hover"
                            data-bs-placement="top" title="Edit" href="#showModal" @click="editdata(data)">
                            <a class="edit-item-btn"><i class="ri-pencil-fill align-bottom text-muted"></i></a>
                          </li>
                          <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-placement="top" title="Delete" @click="deletedata(data)">
                            <a class="remove-item-btn">
                              <i class="ri-delete-bin-fill align-bottom text-muted"></i>
                            </a>
                          </li>
                        </ul>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="noresult" style="display: none">
                  <div class="text-center">
                    <lottie class="avatar-xl" colors="primary:#121331,secondary:#08a88a" :options="defaultOptions"
                      :height="75" :width="75" />
                    <h5 class="mt-2">Sorry! No Result Found</h5>
                    <p class="text-muted mb-0">
                      We've searched more than 150+ Orders We did not find any
                      orders for you search.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex justify-content-end mt-3">
              <div class="pagination-wrap hstack gap-2">
                <a class="page-item pagination-prev disabled" href="#" v-if="page != 1" @click="page--">
                  Previous
                </a>
                <ul class="pagination listjs-pagination mb-0">
                  <li :class="{
                              active: pageNumber == page,
                              disabled: pageNumber == '...',
                            }" v-for="(pageNumber, index) in pages.slice(
                      page - 1,
                      page + 5
                    )" :key="index" @click="page = pageNumber">
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
        <!--end card-->
      </div>
      <!--end col-->
      <div class="col-xxl-3">
        <div class="card">
          <div class="card-body text-center">
            <div class="position-relative d-inline-block">
              <div class="avatar-md">
                <div class="avatar-title bg-light rounded-circle">
                  <img src="@/assets/images/brands/mail_chimp.png" alt="" class="avatar-xs" id="imageid" />
                </div>
              </div>
            </div>
            <h5 class="mt-3 mb-1" id="cname">Syntyce Solution</h5>
            <p class="text-muted" id="oname">Michael Morris</p>

            <ul class="list-inline mb-0">
              <li class="list-inline-item avatar-xs">
                <a href="javascript:void(0);" class="avatar-title bg-soft-success text-success fs-15 rounded">
                  <i class="ri-global-line"></i>
                </a>
              </li>
              <li class="list-inline-item avatar-xs">
                <a href="javascript:void(0);" class="avatar-title bg-soft-danger text-danger fs-15 rounded">
                  <i class="ri-mail-line"></i>
                </a>
              </li>
              <li class="list-inline-item avatar-xs">
                <a href="javascript:void(0);" class="avatar-title bg-soft-warning text-warning fs-15 rounded">
                  <i class="ri-question-answer-line"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <h6 class="text-muted text-uppercase fw-semibold mb-3">
              Information
            </h6>
            <p class="text-muted mb-4">
              A company incurs fixed and variable costs such as the purchase of
              raw materials, salaries and overhead, as explained by
              AccountingTools, Inc. Business owners have the discretion to
              determine the actions.
            </p>
            <div class="table-responsive table-card">
              <table class="table table-borderless mb-0">
                <tbody>
                  <tr>
                    <td class="fw-medium" scope="row">Industry Type</td>
                    <td id="iname">Chemical Industries</td>
                  </tr>
                  <tr>
                    <td class="fw-medium" scope="row">Location</td>
                    <td id="loc">Damascus, Syria</td>
                  </tr>
                  <tr>
                    <td class="fw-medium" scope="row">Employee</td>
                    <td id="emp">10-50</td>
                  </tr>
                  <tr>
                    <td class="fw-medium" scope="row">Rating</td>
                    <td>
                      <span id="rtng">4.0</span> <i class="ri-star-fill text-warning align-bottom"></i>
                    </td>
                  </tr>
                  <tr>
                    <td class="fw-medium" scope="row">Website</td>
                    <td>
                      <a href="javascript:void(0);" class="link-primary text-decoration-underline"
                        id="webs">www.syntycesolution.com</a>
                    </td>
                  </tr>
                  <tr>
                    <td class="fw-medium" scope="row">Contact Email</td>
                    <td id="eml">info@syntycesolution.com</td>
                  </tr>
                  <tr>
                    <td class="fw-medium" scope="row">Since</td>
                    <td id="sic">1995</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!--end card-->
      </div>
      <!--end col-->
    </div>
    <!--end row-->
    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
          <div class="modal-header bg-soft-info p-3">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
              id="close-modal"></button>
          </div>
          <form action="" id="addform">
            <div class="modal-body">
              <input type="hidden" id="id" />
              <div class="row g-3">
                <div class="col-lg-12">
                  <div>
                    <label for="name-field" class="form-label">Name</label>
                    <input type="text" id="companyname" class="form-control" placeholder="Enter company name"
                      required />
                  </div>
                </div>
                <div class="col-lg-12">
                  <div>
                    <label for="owner-field" class="form-label">Owner Name</label>
                    <input type="text" id="ownername" class="form-control" placeholder="Enter owner name" required />
                  </div>
                </div>
                <div class="col-lg-12">
                  <div>
                    <label for="industry_type-field" class="form-label">Industry Type</label>
                    <select class="form-control" id="industrytype">
                      <option value="">Select industry type</option>
                      <option value="Computer Industry">Computer Industry</option>
                      <option value="Chemical Industries">Chemical Industries</option>
                      <option value="Health Services">Health Services</option>
                      <option value="Telecommunications Services">Telecommunications Services</option>
                      <option value="Textiles: Clothing, Footwear">Textiles: Clothing, Footwear</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div>
                    <label for="star_value-field" class="form-label">Rating</label>
                    <input type="text" id="starvalue" class="form-control" placeholder="Enter rating" required />
                  </div>
                </div>
                <div class="col-lg-12">
                  <div>
                    <label for="location-field" class="form-label">location</label>
                    <input type="text" id="location" class="form-control" placeholder="Enter location" required />
                  </div>
                </div>
                <div class="col-lg-12">
                  <div>
                    <label for="employee-field" class="form-label">Employee</label>
                    <input type="text" id="employee" class="form-control" placeholder="Enter employee" required />
                  </div>
                </div>
                <div class="col-lg-12">
                  <div>
                    <label for="website-field" class="form-label">Website</label>
                    <input type="text" id="website" class="form-control" placeholder="Enter website" required />
                  </div>
                </div>
                <div class="col-lg-12">
                  <div>
                    <label for="contact_email-field" class="form-label">Contact Email</label>
                    <input type="text" id="contactemail" class="form-control" placeholder="Enter contact email"
                      required />
                  </div>
                </div>
                <div class="col-lg-12">
                  <div>
                    <label for="since-field" class="form-label">Since</label>
                    <input type="text" id="since" class="form-control" placeholder="Enter since" required />
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="hstack gap-2 justify-content-end">
                <button type="button" class="btn btn-light" id="closemodal" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" id="add-btn" @click="addorder">Add Company</button>
                <button type="button" class="btn btn-success" id="edit-btn" @click="updateorder">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </Layout>
</template>