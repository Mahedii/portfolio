<script>
export default {
  setup() {
    return {
      currencies: [
        {
          id: 1,
          img: require("@/assets/images/svg/crypto-icons/btc.svg"),
          coinName: "Bitcoin",
          price: "48,568.025",
          iconClass: "success",
          icon: "mdi mdi-trending-up",
          change: "5.26",
          balance: "53,914.025",
          totalCoin: "1.25634801",
        },
        {
          id: 2,
          img: require("@/assets/images/svg/crypto-icons/ltc.svg"),
          coinName: "Litecoin",
          price: "87,142.027",
          iconClass: "danger",
          icon: "mdi mdi-trending-down",
          change: "3.07",
          balance: "75,854.127",
          totalCoin: "2.85472161",
        },
        {
          id: 3,
          img: require("@/assets/images/svg/crypto-icons/eth.svg"),
          coinName: "Eathereum",
          price: "33,847.961",
          iconClass: "success",
          icon: "mdi mdi-trending-up",
          change: "7.13",
          balance: "44,152.185",
          totalCoin: "1.45612347",
        },
        {
          id: 4,
          img: require("@/assets/images/svg/crypto-icons/bnb.svg"),
          coinName: "Binance",
          price: "73,654.421",
          iconClass: "success",
          icon: "mdi mdi-trending-up",
          change: "0.97",
          balance: "48,367.125",
          totalCoin: "0.35734601",
        },
        {
          id: 5,
          img: require("@/assets/images/svg/crypto-icons/usdt.svg"),
          coinName: "Tether",
          price: "66,742.077",
          iconClass: "danger",
          icon: "mdi mdi-trending-down",
          change: "1.08",
          balance: "53,487.083",
          totalCoin: "3.62912570",
        },
        {
          id: 6,
          img: require("@/assets/images/svg/crypto-icons/dash.svg"),
          coinName: "Dash",
          price: "34,736.209",
          iconClass: "success",
          icon: "mdi mdi-trending-up",
          change: "4.52",
          balance: "15,203.347",
          totalCoin: "1.85412740",
        },
        {
          id: 7,
          img: require("@/assets/images/svg/crypto-icons/neo.svg"),
          coinName: "Neo",
          price: "56,357.313",
          iconClass: "danger",
          icon: "mdi mdi-trending-down",
          change: "2.87",
          balance: "61,843.173",
          totalCoin: "1.87732061",
        },
        {
          id: 8,
          img: require("@/assets/images/svg/crypto-icons/doge.svg"),
          coinName: "Dogecoin",
          price: "62,357.649",
          iconClass: "success",
          icon: "mdi mdi-trending-up",
          change: "3.45",
          balance: "54,843.173",
          totalCoin: "0.95632087",
        },
      ],
    };
  },
};
</script>

<template>
  <div class="card">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">My Currencies</h4>
      <div class="flex-shrink-0">
        <button class="btn btn-soft-primary btn-sm shadow-none">24H</button>
      </div>
      <div class="flex-shrink-0 ms-2">
        <div class="dropdown card-header-dropdown">
          <a
            class="btn btn-soft-primary btn-sm shadow-none"
            role="button"
            href="#"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            Get Report<i class="mdi mdi-chevron-down align-middle ms-1"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="#">Download Report</a>
            <a class="dropdown-item" href="#">Export</a>
            <a class="dropdown-item" href="#">Import</a>
          </div>
        </div>
      </div>
    </div>
    <!-- end card header -->
    <div class="card-body">
      <div class="table-responsive table-card">
        <table
          class="table table-hover table-borderless table-centered align-middle table-nowrap mb-0"
        >
          <thead class="text-muted bg-soft-light">
            <tr>
              <th>Coin Name</th>
              <th>Price</th>
              <th>24h Change</th>
              <th>Total Balance</th>
              <th>Total Coin</th>
              <th>Actions</th>
            </tr>
          </thead>
          <!-- end thead -->
          <tbody>
            <tr v-for="(item, index) of currencies" :key="index">
              <td>
                <div class="d-flex align-items-center">
                  <div class="me-2">
                    <img
                      :src="item.img"
                      alt=""
                      class="avatar-xxs shadow rounded-circle"
                    />
                  </div>
                  <div>
                    <h6 class="fs-14 mb-0">{{item.coinName}}</h6>
                  </div>
                </div>
              </td>
              <td>${{item.price}}</td>
              <td>
                <h6 class="fs-14 mb-0" :class="'text-'+item.iconClass">
                  <i class="align-middle me-1" :class="item.icon"></i>{{item.change}}
                </h6>
              </td>
              <td>${{item.balance}}</td>
              <td>{{item.totalCoin}}</td>
              <td>
                <router-link
                  to="/crypto/buy-sell"
                  class="btn btn-sm btn-soft-secondary shadow-none"
                  >Trade</router-link
                >
              </td>
            </tr>
            <!-- end -->
            
          </tbody>
          <!-- end tbody -->
        </table>
        <!-- end table -->
      </div>
      <!-- end tbody -->
    </div>
    <!-- end cardbody -->
  </div>
  <!-- end card -->
</template>
