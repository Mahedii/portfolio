<script>
  import Multiselect from "@vueform/multiselect";
  import "@vueform/multiselect/themes/default.css";
  import flatPickr from "vue-flatpickr-component";
  import "flatpickr/dist/flatpickr.css";

  import Layout from "../../../layouts/main.vue";
  import PageHeader from "@/components/page-header";
  import appConfig from "../../../../app.config";

  import animationData from "@/components/widgets/msoeawqm.json";
  import animationData1 from "@/components/widgets/gsqxdxog.json";
  import Swal from "sweetalert2";
  import axios from 'axios';
  import Lottie from "@/components/widgets/lottie.vue";

  export default {
    page: {
      title: "Contacts",
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
      flatPickr
    },
    data() {
      return {
        title: "Contacts",
        items: [{
            text: "CRM",
            href: "/",
          },
          {
            text: "Contacts",
            active: true,
          },
        ],
        timeConfig: {
          enableTime: false,
          dateFormat: "d M, Y",
        },
        date2: null,
        defaultOptions: {
          animationData: animationData
        },
        defaultOptions1: {
          animationData: animationData1
        },
        searchQuery: null,
        page: 1,
        perPage: 8,
        pages: [],
        value: null,
        tagvalue: null,
        tagoption: [{
            value: 'Lead',
            label: 'Lead'
          },
          {
            value: 'Partner',
            label: 'Partner'
          },
          {
            value: 'Exiting',
            label: 'Exiting'
          },
          {
            value: 'Long-tern',
            label: 'Long-tern'
          },
        ],
        contactsList: [{
            id: 1,
            contactId: "#VZ001",
            name: "Tonya Noble",
            company: "Nesta Technologies",
            email: "tonyanoble@velzon.com",
            phone: "414-453-5725",
            score: "154",
            date: ["15 Dec, 2021", "08:58AM"],
          },
          {
            id: 2,
            contactId: "#VZ002",
            name: "Thomas Taylor",
            company: "iTest Factory",
            email: "thomastaylor@velzon.com",
            phone: "580-464-4694",
            score: "236",
            date: ["17 Dec, 2021", "10:32AM"],
          },
          {
            id: 3,
            contactId: "#VZ003",
            name: "Nancy Martino",
            company: "Force Medicines",
            email: "nancymartino@velzon.com",
            phone: "786-253-9927",
            score: "197",
            date: ["04 Dec, 2021", "01:36PM"],
          },
          {
            id: 4,
            contactId: "#VZ004",
            name: "Alexis Clarke",
            company: "Digitech Galaxy",
            email: "alexisclarke@velzon.com",
            phone: "515-395-1069",
            score: "369",
            date: ["27 Oct, 2021", "03:47PM"],
          },
          {
            id: 5,
            contactId: "#VZ005",
            name: "James Price",
            company: "Themesbrand",
            email: "jamesprice@velzon.com",
            phone: "646-276-2274",
            score: "81",
            date: ["23 Oct, 2021", "03:47PM"],
          },
          {
            id: 6,
            contactId: "#VZ006",
            name: "Mary Cousar",
            company: "Micro Design",
            email: "marycousar@velzon.com",
            phone: "540-575-0991",
            score: "643",
            date: ["18 Oct, 2021", "11:08AM"],
          },
          {
            id: 7,
            contactId: "#VZ007",
            name: "Herbert Stokes",
            company: "Themesbrand",
            email: "herbertstokes@velzon.com",
            phone: "949-791-0614",
            score: "784",
            date: ["01 Jan, 2022", "03:51PM"],
          },
          {
            id: 8,
            contactId: "#VZ008",
            name: "Michael Morris",
            company: "Syntyce Solutions",
            email: "michaelmorris@velzon.com",
            phone: "484-606-3104",
            score: "361",
            date: ["20 Sep, 2021", "07:55AM"],
          },
          {
            id: 9,
            contactId: "#VZ009",
            name: "Timothy Smith",
            company: "Digitech Galaxy",
            email: "timothysmith@velzon.com",
            phone: "231-480-8536",
            score: "732",
            date: ["02 Jan, 2022", "09:32AM"],
          },
          {
            id: 10,
            contactId: "#VZ0010",
            name: "Kevin Dawson",
            company: "Meta4Systems",
            email: "kevindawson@velzon.com",
            phone: "745-321-9874",
            score: "00",
            date: ["-", ""],
          },
        ],
      };
    },
    computed: {
      displayedPosts() {
        return this.paginate(this.contactsList);
      },
      resultQuery() {
        if (this.searchQuery) {
          const search = this.searchQuery.toLowerCase();
          return this.displayedPosts.filter((data) => {
            return (
              data.contactId.toLowerCase().includes(search) ||
              data.name.toLowerCase().includes(search) ||
              data.company.toLowerCase().includes(search) ||
              data.email.toLowerCase().includes(search) ||
              data.phone.toLowerCase().includes(search) ||
              data.score.toLowerCase().includes(search) ||
              data.date.toLowerCase().includes(search)
            );
          });
        } else {
          return this.displayedPosts;
        }
      },
    },
    watch: {
      contactsList() {
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
      showdetail(data) {
        document.getElementById('image').setAttribute('src', data.image_src)
        document.getElementById('name').innerHTML = data.name;
        document.getElementById('company').innerHTML = data.company;
        document.getElementById('designation').innerHTML = data.designation;
        document.getElementById('email').innerHTML = data.email;
        document.getElementById('phoneno').innerHTML = data.phone;
        document.getElementById('leadscoreno').innerHTML = data.lead_score;
        document.getElementById('tags').innerHTML = '';
        data.tags.forEach((tag) => {
          document.getElementById('tags').innerHTML += '&nbsp;<span class="badge badge-soft-primary">' + tag +
            '</span>';
        })
        document.getElementById('lastdate').innerHTML = data.last_contacted;
        document.getElementById('lasttime').innerHTML = data.time
      },

      setPages() {
        let numberOfPages = Math.ceil(this.contactsList.length / this.perPage);
        this.pages = [];
        for (let index = 1; index <= numberOfPages; index++) {
          this.pages.push(index);
        }
      },
      paginate(contactsList) {
        let page = this.page;
        let perPage = this.perPage;
        let from = page * perPage - perPage;
        let to = page * perPage;
        return contactsList.slice(from, to);
      },
      editdata(data) {
        document.getElementById('exampleModalLabel').innerHTML = "Edit Contact"
        let result = this.contactsList.findIndex(o => o._id == data._id)
        document.getElementById('id').value = this.contactsList[result]._id;
        document.getElementById('customername').value = this.contactsList[result].name;
        document.getElementById('companyname').value = this.contactsList[result].company;
        document.getElementById('emailid').value = this.contactsList[result].email;
        document.getElementById('phone').value = this.contactsList[result].phone;
        document.getElementById('leadscore').value = this.contactsList[result].lead_score;
        this.tagvalue = this.contactsList[result].tags;
        document.getElementById('date').value = this.contactsList[result].last_contacted;
        document.getElementById('edit-btn').style.display = 'block';
        document.getElementById('add-btn').style.display = 'none'
      },
      updateorder() {
        let result = this.contactsList.findIndex(o => o._id == document.getElementById('id').value)
        this.contactsList[result].name = document.getElementById('customername').value;
        this.contactsList[result].company = document.getElementById('companyname').value;
        this.contactsList[result].email = document.getElementById('emailid').value;
        this.contactsList[result].phone = document.getElementById('phone').value;
        this.contactsList[result].lead_score = document.getElementById('leadscore').value;
        this.contactsList[result].tags = this.tagvalue;
        this.contactsList[result].last_contacted = document.getElementById('date').value;
        document.getElementById('edtclosemodal').click();
        axios.patch(`https://api-node.themesbrand.website/apps/contact/${document.getElementById('id').value}`, this
            .contactsList[
              result])
          .then(() => {

          }).catch((er) => {
            console.log(er)
          });
      },
      addorder() {
        var id = this.contactsList.length + 1;
        var contactname = document.getElementById('customername').value;
        var companyname = document.getElementById('companyname').value;
        var emailid = document.getElementById('emailid').value;
        var phone = document.getElementById('phone').value;
        var leadscore = document.getElementById('leadscore').value;
        var date = document.getElementById('date').value;
        if (id != null && contactname != null && companyname != null && emailid != null && phone != null && leadscore !=
          null && date != null) {
          var data = {
            id: id,
            contactId: "#VZ001",
            name: contactname,
            company: companyname,
            email: emailid,
            phone: phone,
            lead_score: leadscore,
            tags: this.tagvalue,
            last_contacted: [date],
          };
          this.contactsList.push(data)
          axios.post(`https://api-node.themesbrand.website/apps/contact`, data)
            .then(() => {

            }).catch((er) => {
              console.log(er)
            });
        }
        document.getElementById('edtclosemodal').click();
        document.getElementById("addform").reset();
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
            this.contactsList.splice(this.contactsList.indexOf(event), 1);
            axios.delete(`https://api-node.themesbrand.website/apps/contact/${event._id}`)
              .then(() => {

              }).catch((er) => {
                console.log(er)
              });
            Swal.fire("Deleted!", "Your file has been deleted.", "success");
          }
        });
      },
      addnew() {
        document.getElementById("addform").reset();
        document.getElementById('exampleModalLabel').innerHTML = "Add Contact";
        document.getElementById('add-btn').style.display = 'block';
        document.getElementById('edit-btn').style.display = 'none';
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
            var cusList = this.contactsList;
            ids_array.forEach(function (id) {
              cusList = cusList.filter(function (customer) {
                return customer._id != id;
              });
            });
            this.contactsList = cusList;
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
    },
    beforeMount() {
      axios.get('https://api-node.themesbrand.website/apps/contact').then((data) => {
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep",
          "Oct", "Nov", "Dec"
        ];
        this.contactsList = [];
        data.data.data.forEach((row) => {
          var dd = new Date(row.last_contacted)
          row.last_contacted = dd.getDate() + " " + monthNames[dd.getMonth()] + ", " + dd.getFullYear();
          var hours = dd.getHours();
          var minutes = dd.getMinutes();
          var ampm = hours >= 12 ? 'PM' : 'AM';
          hours = hours % 12;
          hours = hours ? hours : 12; // the hour '0' should be '12'
          hours = hours < 10 ? '0' + hours : hours;
          minutes = minutes < 10 ? '0' + minutes : minutes;
          var strTime = hours + ':' + minutes + ' ' + ampm;
          row.time = strTime;
          row.image_src = 'https://api-node.themesbrand.website/images/users/' + row.image_src;
          this.contactsList.push(row)
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
                <button class="btn btn-info add-btn me-1" data-bs-toggle="modal" href="#showmodal" @click="addnew">
                  <i class="ri-add-fill me-1 align-bottom"></i> Add Contacts
                </button>
                <button class="btn btn-soft-danger" @click="deleteMultiple">
                  <i class="ri-delete-bin-2-line"></i>
                </button>
              </div>
              <div class="flex-shrink-0">
                <div class="hstack text-nowrap gap-2">
                  <button class="btn btn-danger" data-bs-toggle="modal">
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
        <div class="card" id="contactList">
          <div class="card-header">
            <div class="row g-3">
              <div class="col-md-4">
                <div class="search-box">
                  <input type="text" class="form-control search" placeholder="Search for contact..." />
                  <i class="ri-search-line search-icon"></i>
                </div>
              </div>
              <div class="col-md-auto ms-auto">
                <div class="d-flex align-items-center gap-2">
                  <span class="text-muted flex-shrink-0">Sort by: </span>
                  <Multiselect class="form-control" style="width:150px;" v-model="value" :close-on-select="true"
                    :searchable="true" :create-option="true" :options="[
                            { value: 'Name', label: 'Name' },
                            { value: 'Company', label: 'Company' },
                            { value: 'Lead', label: 'Lead' }
                           
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
                      <th class="sort" data-sort="name" scope="col">Name</th>
                      <th class="sort" data-sort="company_name" scope="col">
                        Company
                      </th>
                      <th class="sort" data-sort="email_id" scope="col">
                        Email ID
                      </th>
                      <th class="sort" data-sort="phone" scope="col">
                        Phone No
                      </th>
                      <th class="sort" data-sort="lead_score" scope="col">
                        Lead Score
                      </th>
                      <th class="sort" data-sort="Designation" scope="col">
                        Tags
                      </th>
                      <th class="sort" data-sort="date" scope="col">
                        Last Contacted
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
                      <td class="">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0"><img :src="data.image_src" alt=""
                              class="user_image avatar-xs rounded-circle">
                          </div>
                          <div class="flex-grow-1 ms-2 name">{{ data.name }}</div>
                        </div>
                      </td>
                      <td class="company_name">{{ data.company }}</td>
                      <td class="email_id">{{ data.email }}</td>
                      <td class="phone">{{ data.phone }}</td>
                      <td class="lead_score">{{ data.lead_score }}</td>
                      <td class="tags">
                        <span v-for="(tag, index) of data.tags" :key="index">
                          &nbsp;<span class="badge badge-soft-primary"> {{tag}}</span>
                        </span>
                      </td>
                      <td> <span class="date">{{ data.last_contacted }}</span>&nbsp;<small
                          class="text-muted time">{{ data.time }}</small> </td>
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
                          <li class="list-inline-item">
                            <div class="dropdown">
                              <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-more-fill align-middle"></i>
                              </button>
                              <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                  <a class="dropdown-item" href="javascript:void(0);" @click="showdetail(data)"><i
                                      class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                    View</a>
                                </li>
                                <li>
                                  <a class="dropdown-item edit-item-btn" data-bs-toggle="modal" href="#showmodal"
                                    @click="editdata(data)">
                                    <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                    Edit</a>
                                </li>
                                <li>
                                  <a class="dropdown-item remove-item-btn" @click="deletedata(data)">
                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                    Delete
                                  </a>
                                </li>
                              </ul>
                            </div>
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
              <div class="d-flex justify-content-end mt-3">
                <div class="pagination-wrap hstack gap-2">
                  <a class="page-item pagination-prev disabled" href="#" v-if="page != 1" @click="page--">
                    Previous
                  </a>
                  <ul class="pagination listjs-pagination mb-0">
                    <li :class="{
                              active: pageNumber == page,
                              disabled: pageNumber == '...',
                            }" v-for="(pageNumber, index) in pages.slice(page - 1, page + 5)" :key="index"
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
        <!--end card-->
      </div>
      <!--end col-->
      <div class="col-xxl-3">
        <div class="card" id="contact-view-detail">
          <div class="card-body text-center">
            <div class="position-relative d-inline-block">
              <img src="@/assets/images/users/avatar-10.jpg" id="image" alt=""
                class="avatar-lg rounded-circle img-thumbnail">
              <span class="contact-active position-absolute rounded-circle bg-success"><span
                  class="visually-hidden"></span></span>
            </div>
            <h5 class="mt-4 mb-1" id="name">Tonya Noble</h5>
            <p class="text-muted" id="company">Nesta Technologies</p>

            <ul class="list-inline mb-0">
              <li class="list-inline-item avatar-xs">
                <a href="javascript:void(0);" class="avatar-title bg-soft-success text-success fs-15 rounded">
                  <i class="ri-phone-line"></i>
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
            <h6 class="text-muted text-uppercase fw-semibold mb-3">Personal Information</h6>
            <p class="text-muted mb-4">Hello, I'm Tonya Noble, The most effective objective is
              one that is tailored to the job you are applying for. It states what kind of
              career you are seeking, and what skills and experiences.</p>
            <div class="table-responsive table-card">
              <table class="table table-borderless mb-0">
                <tbody>
                  <tr>
                    <td class="fw-medium" scope="row">Designation</td>
                    <td id="designation">Lead Designer / Developer</td>
                  </tr>
                  <tr>
                    <td class="fw-medium" scope="row">Email ID</td>
                    <td id="email">tonyanoble@velzon.com</td>
                  </tr>
                  <tr>
                    <td class="fw-medium" scope="row">Phone No</td>
                    <td id="phoneno">414-453-5725</td>
                  </tr>
                  <tr>
                    <td class="fw-medium" scope="row">Lead Score</td>
                    <td id="leadscoreno">154</td>
                  </tr>
                  <tr>
                    <td class="fw-medium" scope="row">Tags</td>
                    <td id="tags">
                      <span class="badge badge-soft-primary">Lead</span>
                      <span class="badge badge-soft-primary">Partner</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="fw-medium" scope="row">Last Contacted</td>
                    <td><span id="lastdate">15 Dec, 2021 </span><small class="text-muted" id="lasttime">08:58AM</small>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!--end card-->
      </div>
    </div>
    <!--end row-->
    <div class="modal fade" id="showmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="text" id="customername" class="form-control" placeholder="Enter name" required />
                  </div>
                </div>
                <div class="col-lg-12">
                  <div>
                    <label for="company_name-field" class="form-label">Company Name</label>
                    <input type="text" id="companyname" class="form-control" placeholder="Enter company name"
                      required />
                  </div>
                </div>
                <div class="col-lg-12">
                  <div>
                    <label for="designation-field" class="form-label">Last Contacted</label>
                    <flat-pickr placeholder="Select date" v-model="date2" :config="timeConfig"
                      class="form-control flatpickr-input" id="date"></flat-pickr>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div>
                    <label for="email_id-field" class="form-label">Email ID</label>
                    <input type="text" id="emailid" class="form-control" placeholder="Enter email" required />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div>
                    <label for="phone-field" class="form-label">Phone</label>
                    <input type="text" id="phone" class="form-control" placeholder="Enter phone no" required />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div>
                    <label for="lead_score-field" class="form-label">Lead Score</label>
                    <input type="text" id="leadscore" class="form-control" placeholder="Enter value" required />
                  </div>
                </div>
                <div>
                  <label for="" class="form-label">Tags</label>
                  <Multiselect v-model="tagvalue" mode="tags" :close-on-select="true" :searchable="true"
                    :create-option="false" :options="tagoption" />
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="hstack gap-2 justify-content-end">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal" id="edtclosemodal">Close</button>
                <button type="button" class="btn btn-success" id="add-btn" @click="addorder">Add Contact</button>
                <button type="button" class="btn btn-success" id="edit-btn" @click="updateorder()">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </Layout>
</template>