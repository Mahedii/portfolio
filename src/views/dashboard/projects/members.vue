<script>
export default {
  setup() {
    return {
      teamMembers: [
        {
          id: 1,
          img: require("@/assets/images/users/avatar-1.jpg"),
          name: "Donald Risher",
          position: "Product Manager",
          hours: "110",
          tasks: "258",
          series: [50],
          chartsColor: "#4b38b3",
        },
        {
          id: 2,
          img: require("@/assets/images/users/avatar-2.jpg"),
          name: "Jansh Brown",
          position: "Lead Developer",
          hours: "83",
          tasks: "105",
          series: [45],
          chartsColor: "#4b38b3",
        },
        {
          id: 3,
          img: require("@/assets/images/users/avatar-7.jpg"),
          name: "Carroll Adams",
          position: "Lead Designer",
          hours: "58",
          tasks: "75",
          series: [75],
          chartsColor: "#4b38b3",
        },
        {
          id: 4,
          img: require("@/assets/images/users/avatar-4.jpg"),
          name: "William Pinto",
          position: "UI/UX Designer",
          hours: "96",
          tasks: "85",
          series: [25],
          chartsColor: "#ffbe0b",
        },
        {
          id: 5,
          img: require("@/assets/images/users/avatar-6.jpg"),
          name: "Garry Fournier",
          position: "Web Designer",
          hours: "76",
          tasks: "69",
          series: [60],
          chartsColor: "#4b38b3",
        },
        {
          id: 6,
          img: require("@/assets/images/users/avatar-5.jpg"),
          name: "Susan Denton",
          position: "Lead Designer",
          hours: "123",
          tasks: "658",
          series: [85],
          chartsColor: "#45CB85",
        },
        {
          id: 7,
          img: require("@/assets/images/users/avatar-3.jpg"),
          name: "Joseph Jackson",
          position: "React Developer",
          hours: "117",
          tasks: "125",
          series: [70],
          chartsColor: "#4b38b3",
        },
      ],

      chartOptions: {
        chart: {
          type: "radialBar",
          width: 36,
          height: 36,
          sparkline: {
            enabled: true,
          },
        },
        dataLabels: {
          enabled: false,
        },
        plotOptions: {
          radialBar: {
            hollow: {
              margin: 0,
              size: "50%",
            },
            track: {
              margin: 1,
            },
            dataLabels: {
              show: false,
            },
          },
        },
        colors: ["#4b38b3"],
      },
    };
  },
};
</script>

<template>
  <div class="card">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">Team Members</h4>
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
              >Last 30 Days<i class="mdi mdi-chevron-down ms-1"></i
            ></span>
          </a>
          <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="#">Today</a>
            <a class="dropdown-item" href="#">Yesterday</a>
            <a class="dropdown-item" href="#">Last 7 Days</a>
            <a class="dropdown-item" href="#">Last 30 Days</a>
            <a class="dropdown-item" href="#">This Month</a>
            <a class="dropdown-item" href="#">Last Month</a>
          </div>
        </div>
      </div>
    </div>
    <!-- end card header -->

    <div class="card-body">
      <div class="table-responsive table-card">
        <table class="table table-borderless table-nowrap align-middle mb-0">
          <thead class="table-light text-muted">
            <tr>
              <th scope="col">Member</th>
              <th scope="col">Hours</th>
              <th scope="col">Tasks</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item, index) of teamMembers" :key="index">
              <td class="d-flex">
                <img :src="item.img" alt="" class="avatar-xs rounded-3 shadow me-2" />
                <div>
                  <h5 class="fs-13 mb-0">{{ item.name }}</h5>
                  <p class="fs-12 mb-0 text-muted">{{ item.position }}</p>
                </div>
              </td>
              <td>
                <h6 class="mb-0">{{ item.hours }}
                : <span class="text-muted">150h</span></h6>
              </td>
              <td>
                {{ item.tasks }}
              </td>
              <td style="width: 5%">
                <apexchart
                  class="apex-charts"
                  height="36"
                  dir="ltr"
                  :series="item.series"
                  :options="{...chartOptions,...{colors:[item.chartsColor]}}"
                ></apexchart>

                <!-- <div
                  id="radialBar_chart_1"
                  data-colors='["--vz-primary"]'
                  data-chart-series="50"
                  class="apex-charts"
                  dir="ltr"
                ></div> -->
              </td>
            </tr>
            <!-- end tr -->
          </tbody>
          <!-- end tbody -->
        </table>
        <!-- end table -->
      </div>
    </div>
    <!-- end cardbody -->
  </div>
  <!-- end card -->
</template>
