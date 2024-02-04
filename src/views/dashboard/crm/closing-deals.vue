<script>
export default {
  setup() {
    return {
      closingDeals: [
        {
          id: 1,
          dealName: "Acme Inc Install",
          img: require("@/assets/images/users/avatar-1.jpg"),
          salesRep: "Donald Risher",
          amount: "96",
          closeDate: "Today",
        },
        {
          id: 2,
          dealName: "Save lots Stores",
          img: require("@/assets/images/users/avatar-2.jpg"),
          salesRep: "Jansh Brown",
          amount: "55.7",
          closeDate: "30 Dec 2021",
        },
        {
          id: 3,
          dealName: "William PVT",
          img: require("@/assets/images/users/avatar-7.jpg"),
          salesRep: "Ayaan Hudda",
          amount: "102",
          closeDate: "25 Nov 2021",
        },
        {
          id: 4,
          dealName: "Raitech Soft",
          img: require("@/assets/images/users/avatar-4.jpg"),
          salesRep: "Julia William",
          amount: "89.5",
          closeDate: "20 Sep 2021",
        },
        {
          id: 5,
          dealName: "Absternet LLC",
          img: require("@/assets/images/users/avatar-4.jpg"),
          salesRep: "Vitoria Rodrigues",
          amount: "89.5",
          closeDate: "20 Sep 2021",
        },
      ],
    };
  },
};
</script>

<template>
  <div class="card card-height-100">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">Closing Deals</h4>
      <div class="flex-shrink-0">
        <select
          class="form-select form-select-sm"
          aria-label=".form-select-sm example"
        >
          <option selected="">Closed Deals</option>
          <option value="1">Active Deals</option>
          <option value="2">Paused Deals</option>
          <option value="3">Canceled Deals</option>
        </select>
      </div>
    </div>
    <!-- end card header -->

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-nowrap align-middle mb-0">
          <thead>
            <tr>
              <th scope="col" style="width: 30%">Deal Name</th>
              <th scope="col" style="width: 30%">Sales Rep</th>
              <th scope="col" style="width: 20%">Amount</th>
              <th scope="col" style="width: 20%">Close Date</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="(item, index) of closingDeals" :key="index">
              <td>{{item.dealName}}</td>
              <td>
                <img
                  :src="item.img"
                  alt=""
                  class="avatar-xs rounded-circle me-2 shadow"
                />
                <a href="#javascript: void(0);" class="text-body fw-medium"
                  >{{item.salesRep}}</a
                >
              </td>
              <td>${{item.amount}}</td>
              <td>{{item.closeDate}}</td>
            </tr>
          </tbody>
          <!-- end tbody -->
        </table>
        <!-- end table -->
      </div>
      <!-- end table responsive -->
    </div>
    <!-- end card body -->
  </div>
  <!-- end card -->
</template>
