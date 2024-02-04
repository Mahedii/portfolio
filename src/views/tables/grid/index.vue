<script>
  import Layout from "../../../layouts/main.vue";
  import PageHeader from "@/components/page-header";
  import appConfig from "../../../../app.config";

  export default {
    page: {
      title: "Grid Js",
      meta: [{
        name: "description",
        content: appConfig.description
      }],
    },
    data() {
      return {
        title: "Grid Js",
        items: [{
            text: "Tables",
            href: "/",
          },
          {
            text: "Grid Js",
            active: true,
          },
        ],
        data: [{
            id: 1,
            name: "Janathan",
            email: "jonathan@example.com",
            position: "Senior Implementation Architect",
            company: "Koelpin - Goldner",
            country: "Vanuatu",
          },
          {
            id: 2,
            name: "Harold",
            email: "harold@example.com",
            position: "Forward Creative Coordinator",
            company: "Feeney, Langworth and Tremblay",
            country: "Niger",
          },
          {
            id: 3,
            name: "Shannan",
            email: "shannon@example.com",
            position: "Legacy Functionality Associate",
            company: "Streich Group",
            country: "Niue",
          },
          {
            id: 4,
            name: "Robert",
            email: "robert@example.com",
            position: "Product Accounts Technician",
            company: "Ebert, Schamberger and Johnston",
            country: "Mexico",
          },
          {
            id: 5,
            name: "Noel",
            email: "noel@example.com",
            position: "Customer Data Director",
            company: "Raynor, Rolfson and Daugherty",
            country: "Qatar",
          },
          {
            id: 6,
            name: "Tracl",
            email: "traci@example.com",
            position: "Corporate Identity Director",
            company: "Hauck Inc",
            country: "Holy See",
          },
          {
            id: 7,
            name: "Kerry",
            email: "kerry@example.com",
            position: "Lead Applications Associate",
            company: "Metz Inc",
            country: "Iran",
          },
          {
            id: 8,
            name: "Patsy",
            email: "patsy@example.com",
            position: "Dynamic Assurance Director",
            company: "Zemlak Group",
            country: "South Georgia",
          },
          {
            id: 9,

            name: "Cathy",
            email: "cathy@example.com",
            position: "Customer Data Director",
            company: "Hoeger",
            country: "San Marino",
          },
          {
            id: 10,
            name: "Tyrone",
            email: "yrone@example.com",
            position: "Senior Response Liaison",
            company: "Howell - Rippin",
            country: "Germany",
          },
        ],
        page: 1,
        perPage: 5,
        pages: [],
      };
    },
    name: "Widgets",
    components: {
      Layout,
      PageHeader,
    },
    computed: {
      displayedPosts() {
        return this.paginate(this.data);
      },
      resultQuery() {
        if (this.searchQuery) {
          const search = this.searchQuery.toLowerCase();
          return this.displayedPosts.filter((data) => {
            return (
              data.id.toLowerCase().includes(search) ||
              data.name.toLowerCase().includes(search) ||
              data.email.toLowerCase().includes(search) ||
              data.position.toLowerCase().includes(search) ||
              data.company.toLowerCase().includes(search) ||
              data.country.toLowerCase().includes(search)
            );
          });
        } else {
          return this.displayedPosts;
        }
      },
    },
    watch: {
      posts() {
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
        let numberOfPages = Math.ceil(this.data.length / this.perPage);
        for (let index = 1; index <= numberOfPages; index++) {
          this.pages.push(index);
        }
      },
      paginate(data) {
        let page = this.page;
        let perPage = this.perPage;
        let from = page * perPage - perPage;
        let to = page * perPage;
        return data.slice(from, to);
      },
    },
  };
</script>

<template>
  <Layout>
    <PageHeader :title="title" :items="items" />
    <div class="row">
      <div class="card card-body">
        <div class="card-body" id="hello">
          <div class="table-responsive table-card">
            <table class="table align-middle table-nowrap" id="customerTable">
              <thead class="table-light text-muted">
                <tr>
                  <th class="sort" data-sort="currency_name" scope="col">ID</th>
                  <th class="sort" data-sort="current_value" scope="col">
                    Name
                  </th>
                  <th class="sort" data-sort="pairs" scope="col">Email</th>
                  <th class="sort" data-sort="high" scope="col">Position</th>
                  <th class="sort" data-sort="low" scope="col">Company</th>
                  <th class="sort" data-sort="market_cap" scope="col">
                    Country
                  </th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <!--end thead-->
              <tbody class="list form-check-all">
                <tr v-for="(data, index) of resultQuery" :key="index">
                  <td class="id">
                    {{ data.id }}
                  </td>
                  <td>{{ data.name }}</td>
                  <td class="pairs">{{ data.email }}</td>
                  <td class="high">{{ data.position }}</td>
                  <td class="low">{{ data.company }}</td>
                  <td class="market_cap">{{ data.country }}</td>
                  <td>
                    <span><a href="#" class="text-reset text-decoration-underline">Details</a></span>
                  </td>
                </tr>
              </tbody>
              <!--end tbody-->
            </table>
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
  </Layout>
</template>