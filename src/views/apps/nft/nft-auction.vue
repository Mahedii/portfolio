<script>
import Layout from "../../../layouts/main.vue";
import PageHeader from "@/components/page-header";

export default {
    data() {
        return {
            title: "LIVE AUCTION",
            items: [{
                text: "NFT Marketplace",
                href: "/",
            },
            {
                text: "Live Auction",
                active: true,
            },
            ],
        };
    },
    components: {
        Layout,
        PageHeader,
    },
    methods: {
        startCountDownDate(dateVal) {
            var countDownDate = new Date(dateVal).getTime();
            return countDownDate;
        },
        // countDownTimer(start, targetDOM) {
        //     // Get todays date and time

        // }
    },
    mounted() {
        var setEndDate1 = "March 19, 2024 6:0:0";
        var setEndDate2 = "April 16, 2023 5:3:1";
        var setEndDate3 = "Dec 01, 2023 1:0:1";
        var setEndDate4 = "Nov 26, 2024 1:2:1";
        var setEndDate5 = "May 27, 2023 1:6:6";
        var setEndDate6 = "May 20, 2023 2:5:5";
        var setEndDate7 = "June 10, 2023 5:1:4";
        var setEndDate8 = "June 25, 2023 1:6:3";
        var setEndDate9 = "July 08, 2023 1:5:2";

        var cdd1 = this.startCountDownDate(setEndDate1);
        var cdd2 = this.startCountDownDate(setEndDate2);
        var cdd3 = this.startCountDownDate(setEndDate3);
        var cdd4 = this.startCountDownDate(setEndDate4);
        var cdd5 = this.startCountDownDate(setEndDate5);
        var cdd6 = this.startCountDownDate(setEndDate6);
        var cdd7 = this.startCountDownDate(setEndDate7);
        var cdd8 = this.startCountDownDate(setEndDate8);
        var cdd9 = this.startCountDownDate(setEndDate9);

        if (document.getElementById("auction-time-1"))
            setInterval(function () {
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = cdd1 - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor(
                    (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
                );
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // add 0 at the beginning if days, hours, minutes, seconds values are less than 10
                days = days < 10 ? "0" + days : days;
                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                // Output the result in an element with auction-item-x"
                document.querySelector("#" + "auction-time-1") ? document.querySelector("#" + "auction-time-1").textContent =
                    days + " : " + hours + " : " + minutes + " : " + seconds : "";

                // If the count down is over, write some text
                if (distance < 0) {
                    // clearInterval();
                    document.querySelector("#" + "auction-time-1").textContent = "00 : 00 : 00 : 00";
                }
            }, 1000);
        if (document.getElementById("auction-time-2"))
            setInterval(function () {
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = cdd2 - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor(
                    (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
                );
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // add 0 at the beginning if days, hours, minutes, seconds values are less than 10
                days = days < 10 ? "0" + days : days;
                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                // Output the result in an element with auction-item-x"
                document.querySelector("#" + "auction-time-2") ? document.querySelector("#" + "auction-time-2").textContent =
                    days + " : " + hours + " : " + minutes + " : " + seconds : "";

                // If the count down is over, write some text
                if (distance < 0) {
                    // clearInterval();
                    document.querySelector("#" + "auction-time-2").textContent = "00 : 00 : 00 : 00";
                }
            }, 1000);
        if (document.getElementById("auction-time-3"))
            setInterval(function () {
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = cdd3 - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor(
                    (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
                );
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // add 0 at the beginning if days, hours, minutes, seconds values are less than 10
                days = days < 10 ? "0" + days : days;
                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                // Output the result in an element with auction-item-x"
                document.querySelector("#" + "auction-time-3") ? document.querySelector("#" + "auction-time-3").textContent =
                    days + " : " + hours + " : " + minutes + " : " + seconds : "";

                // If the count down is over, write some text
                if (distance < 0) {
                    // clearInterval();
                    document.querySelector("#" + "auction-time-3").textContent = "00 : 00 : 00 : 00";
                }
            }, 1000);
        if (document.getElementById("auction-time-4"))
            setInterval(function () {
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = cdd4 - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor(
                    (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
                );
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // add 0 at the beginning if days, hours, minutes, seconds values are less than 10
                days = days < 10 ? "0" + days : days;
                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                // Output the result in an element with auction-item-x"
                document.querySelector("#" + "auction-time-4") ? document.querySelector("#" + "auction-time-4").textContent =
                    days + " : " + hours + " : " + minutes + " : " + seconds : "";

                // If the count down is over, write some text
                if (distance < 0) {
                    // clearInterval();
                    document.querySelector("#" + "auction-time-4").textContent = "00 : 00 : 00 : 00";
                }
            }, 1000);
        if (document.getElementById("auction-time-5"))
            setInterval(function () {
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = cdd5 - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor(
                    (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
                );
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // add 0 at the beginning if days, hours, minutes, seconds values are less than 10
                days = days < 10 ? "0" + days : days;
                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                // Output the result in an element with auction-item-x"
                document.querySelector("#" + "auction-time-5") ? document.querySelector("#" + "auction-time-5").textContent =
                    days + " : " + hours + " : " + minutes + " : " + seconds : "";

                // If the count down is over, write some text
                if (distance < 0) {
                    // clearInterval();
                    document.querySelector("#" + "auction-time-5").textContent = "00 : 00 : 00 : 00";
                }
            }, 1000);
        if (document.getElementById("auction-time-6"))
            setInterval(function () {
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = cdd6 - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor(
                    (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
                );
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // add 0 at the beginning if days, hours, minutes, seconds values are less than 10
                days = days < 10 ? "0" + days : days;
                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                // Output the result in an element with auction-item-x"
                document.querySelector("#" + "auction-time-6") ? document.querySelector("#" + "auction-time-6").textContent =
                    days + " : " + hours + " : " + minutes + " : " + seconds : "";

                // If the count down is over, write some text
                if (distance < 0) {
                    // clearInterval();
                    document.querySelector("#" + "auction-time-6").textContent = "00 : 00 : 00 : 00";
                }
            }, 1000);
        if (document.getElementById("auction-time-7"))
            setInterval(function () {
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = cdd7 - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor(
                    (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
                );
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // add 0 at the beginning if days, hours, minutes, seconds values are less than 10
                days = days < 10 ? "0" + days : days;
                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                // Output the result in an element with auction-item-x"
                document.querySelector("#" + "auction-time-7") ? document.querySelector("#" + "auction-time-7").textContent =
                    days + " : " + hours + " : " + minutes + " : " + seconds : "";

                // If the count down is over, write some text
                if (distance < 0) {
                    // clearInterval();
                    document.querySelector("#" + "auction-time-7").textContent = "00 : 00 : 00 : 00";
                }
            }, 1000);
        if (document.getElementById("auction-time-8"))
            setInterval(function () {
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = cdd8 - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor(
                    (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
                );
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // add 0 at the beginning if days, hours, minutes, seconds values are less than 10
                days = days < 10 ? "0" + days : days;
                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                // Output the result in an element with auction-item-x"
                document.querySelector("#" + "auction-time-8") ? document.querySelector("#" + "auction-time-8").textContent =
                    days + " : " + hours + " : " + minutes + " : " + seconds : "";

                // If the count down is over, write some text
                if (distance < 0) {
                    // clearInterval();
                    document.querySelector("#" + "auction-time-8").textContent = "00 : 00 : 00 : 00";
                }
            }, 1000);
        if (document.getElementById("auction-time-9"))
            setInterval(function () {
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = cdd9 - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor(
                    (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
                );
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // add 0 at the beginning if days, hours, minutes, seconds values are less than 10
                days = days < 10 ? "0" + days : days;
                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                // Output the result in an element with auction-item-x"
                document.querySelector("#" + "auction-time-9") ? document.querySelector("#" + "auction-time-9").textContent =
                    days + " : " + hours + " : " + minutes + " : " + seconds : "";

                // If the count down is over, write some text
                if (distance < 0) {
                    // clearInterval();
                    document.querySelector("#" + "auction-time-9").textContent = "00 : 00 : 00 : 00";
                }
            }, 1000);
        // filter btn
        var filterBtns = document.querySelectorAll(".filter-btns .nav-link");
        var productItems = document.querySelectorAll(".product-item");

        filterBtns.forEach(function (button) {
            button.addEventListener("click", function (e) {
                e.preventDefault();

                for (var i = 0; i < filterBtns.length; i++) {
                    filterBtns[i].classList.remove("active");
                }
                this.classList.add("active");

                var filter = e.target.dataset.filter;

                productItems.forEach(function (item) {
                    if (filter === "all") {
                        item.style.display = "block";
                    } else {
                        if (item.classList.contains(filter)) {
                            item.style.display = "block";
                        } else {
                            item.style.display = "none";
                        }
                    }
                });
            });
        });

    },
};
</script>

<template>
    <Layout>
        <PageHeader :title="title" :items="items" />
        <div class="row">
            <div class="col-xxl-9">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-lg-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-0">Live Auction</h5>
                            </div>
                            <div class="flex-shrink-0 mt-4 mt-lg-0">
                                <ul class="nav nav-pills filter-btns" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link fw-medium active" type="button" data-filter="all">All
                                            Items</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link fw-medium" type="button" data-filter="upto-15">Up to
                                            15%</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link fw-medium" type="button" data-filter="upto-30">Up to
                                            30%</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link fw-medium" type="button" data-filter="upto-40">Up to
                                            40%</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-3 col-lg-4 col-md-6 product-item upto-15">
                        <div class="card explore-box card-animate">
                            <div class="position-relative rounded overflow-hidden">
                                <img src="@/assets/images/nft/img-01.jpg" alt="" class="card-img-top explore-img">
                                <div class="discount-time">
                                    <h5 id="auction-time-1" class="mb-0 text-white"></h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="fw-medium mb-0 float-end"><i
                                        class="mdi mdi-heart text-danger align-middle"></i> 19.29k </p>
                                <h5 class="text-success"><i class="mdi mdi-ethereum"></i> 97.8 ETH </h5>
                                <h6 class="fs-16 mb-3">
                                    <b-link href="/apps/nft-item-detail">Abstract face painting</b-link>
                                </h6>
                                <div>
                                    <span class="text-muted float-end">Available: 436</span>
                                    <span class="text-muted">Sold: 4187</span>
                                    <div class="progress progress-sm mt-2">
                                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar"
                                            style="width: 67%;" aria-valuenow="67" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xxl-3 col-lg-4 col-md-6 product-item upto-30">
                        <div class="card explore-box card-animate">
                            <div class="position-relative rounded overflow-hidden">
                                <img src="@/assets/images/nft/gif/img-1.gif" alt="" class="card-img-top explore-img">
                                <div class="discount-time">
                                    <h5 id="auction-time-2" class="mb-0 text-white"></h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="fw-medium mb-0 float-end"><i
                                        class="mdi mdi-heart text-danger align-middle"></i> 8.42k </p>
                                <h5 class="text-success"><i class="mdi mdi-ethereum"></i> 245.23ETH </h5>
                                <h6 class="fs-16 mb-3">
                                    <b-link href="/apps/nft-item-detail">Patterns arts & culture</b-link>
                                </h6>
                                <div>
                                    <span class="text-muted float-end">Available: 8974</span>
                                    <span class="text-muted">Sold: 13</span>
                                    <div class="progress progress-sm mt-2">
                                        <div class="progress-bar progress-bar-striped bg-primary" role="progressbar"
                                            style="width: 10%;" aria-valuenow="10" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xxl-3 col-lg-4 col-md-6 product-item upto-40">
                        <div class="card explore-box card-animate">
                            <div class="position-relative rounded overflow-hidden">
                                <img src="@/assets/images/nft/img-03.jpg" alt="" class="card-img-top explore-img">
                                <div class="discount-time">
                                    <h5 id="auction-time-3" class="mb-0 text-white"></h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="fw-medium mb-0 float-end"><i
                                        class="mdi mdi-heart text-danger align-middle"></i> 19.29k </p>
                                <h5 class="text-success"><i class="mdi mdi-ethereum"></i> 67.36 ETH </h5>
                                <h6 class="fs-16 mb-3">
                                    <b-link href="/apps/nft-item-detail">Creative filtered
                                        portrait</b-link>
                                </h6>
                                <div>
                                    <span class="text-muted float-end">Available: 3620</span>
                                    <span class="text-muted">Sold: 345</span>
                                    <div class="progress progress-sm mt-2">
                                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar"
                                            style="width: 45%;" aria-valuenow="45" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xxl-3 col-lg-4 col-md-6 product-item upto-15">
                        <div class="card explore-box card-animate">
                            <div class="position-relative rounded overflow-hidden">
                                <img src="@/assets/images/nft/img-04.jpg" alt="" class="card-img-top explore-img">
                                <div class="discount-time">
                                    <h5 id="auction-time-4" class="mb-0 text-white"></h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="fw-medium mb-0 float-end"><i
                                        class="mdi mdi-heart text-danger align-middle"></i> 34.12k </p>
                                <h5 class="text-success"><i class="mdi mdi-ethereum"></i> 34.81 ETH </h5>
                                <h6 class="fs-16 mb-3">
                                    <b-link href="/apps/nft-item-detail">Smillevers Crypto</b-link>
                                </h6>
                                <div>
                                    <span class="text-muted float-end">Available: 3521</span>
                                    <span class="text-muted">Sold: 1457</span>
                                    <div class="progress progress-sm mt-2">
                                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar"
                                            style="width: 67%;" aria-valuenow="67" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xxl-3 col-lg-4 col-md-6 product-item upto-40">
                        <div class="card explore-box card-animate">
                            <div class="position-relative rounded overflow-hidden">
                                <img src="@/assets/images/nft/gif/img-5.gif" alt="" class="card-img-top explore-img">
                                <div class="discount-time">
                                    <h5 id="auction-time-5" class="mb-0 text-white"></h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="fw-medium mb-0 float-end"><i
                                        class="mdi mdi-heart text-danger align-middle"></i> 47.12k </p>
                                <h5 class="text-success"><i class="mdi mdi-ethereum"></i> 245.23ETH </h5>
                                <h6 class="fs-16 mb-3">
                                    <b-link href="/apps/nft-item-detail">Long-tailed macaque</b-link>
                                </h6>
                                <div>
                                    <span class="text-muted float-end">Available: 30</span>
                                    <span class="text-muted">Sold: 1369</span>
                                    <div class="progress progress-sm mt-2">
                                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar"
                                            style="width: 95%;" aria-valuenow="95" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xxl-3 col-lg-4 col-md-6 product-item upto-15">
                        <div class="card explore-box card-animate">
                            <div class="position-relative rounded overflow-hidden">
                                <img src="@/assets/images/nft/img-02.jpg" alt="" class="card-img-top explore-img">
                                <div class="discount-time">
                                    <h5 id="auction-time-6" class="mb-0 text-white"></h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="fw-medium mb-0 float-end"><i
                                        class="mdi mdi-heart text-danger align-middle"></i> 23.63k </p>
                                <h5 class="text-success"><i class="mdi mdi-ethereum"></i> 394.7 ETH </h5>
                                <h6 class="fs-16 mb-3">
                                    <b-link href="/apps/nft-item-detail">The Chirstoper</b-link>
                                </h6>
                                <div>
                                    <span class="text-muted float-end">Available: 1474</span>
                                    <span class="text-muted">Sold: 7451</span>
                                    <div class="progress progress-sm mt-2">
                                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar"
                                            style="width: 83%;" aria-valuenow="83" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xxl-3 col-lg-4 col-md-6 product-item upto-30">
                        <div class="card explore-box card-animate">
                            <div class="position-relative rounded overflow-hidden">
                                <img src="@/assets/images/nft/img-06.jpg" alt="" class="card-img-top explore-img">
                                <div class="discount-time">
                                    <h5 id="auction-time-7" class="mb-0 text-white"></h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="fw-medium mb-0 float-end"><i
                                        class="mdi mdi-heart text-danger align-middle"></i> 36.42k </p>
                                <h5 class="text-success"><i class="mdi mdi-ethereum"></i> 745.14 ETH </h5>
                                <h6 class="fs-16 mb-3">
                                    <b-link href="/apps/nft-item-detail">Robotic Body Art</b-link>
                                </h6>
                                <div>
                                    <span class="text-muted float-end">Available: 4563</span>
                                    <span class="text-muted">Sold: 1024</span>
                                    <div class="progress progress-sm mt-2">
                                        <div class="progress-bar progress-bar-striped bg-primary" role="progressbar"
                                            style="width: 24%;" aria-valuenow="24" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xxl-3 col-lg-4 col-md-6 product-item upto-15">
                        <div class="card explore-box card-animate">
                            <div class="position-relative rounded overflow-hidden">
                                <img src="@/assets/images/nft/gif/img-4.gif" alt="" class="card-img-top explore-img">
                                <div class="discount-time">
                                    <h5 id="auction-time-8" class="mb-0 text-white"></h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="fw-medium mb-0 float-end"><i
                                        class="mdi mdi-heart text-danger align-middle"></i> 94.1k </p>
                                <h5 class="text-success"><i class="mdi mdi-ethereum"></i> 245.23ETH </h5>
                                <h6 class="fs-16 mb-3">
                                    <b-link href="/apps/nft-item-detail">Evolved Reality</b-link>
                                </h6>
                                <div>
                                    <span class="text-muted float-end">Available: 26</span>
                                    <span class="text-muted">Sold: 9974</span>
                                    <div class="progress progress-sm mt-2">
                                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar"
                                            style="width: 97%;" aria-valuenow="97" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-3">
                            <button class="btn btn-link text-success mt-2"><i
                                    class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load more </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
            <div class="col-xxl-3">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h6 class="card-title mb-0 flex-grow-1">Top Drop</h6>
                        <a class="text-muted" href="#">
                            See All <i class="ri-arrow-right-line align-bottom"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-borderless align-middle">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="@/assets/images/nft/img-03.jpg" alt=""
                                                    class="avatar-sm object-cover rounded-circle">
                                                <div class="ms-2">
                                                    <b-link href="/apps/nft-item-detail">
                                                        <h6 class="fs-15 mb-1">Creative filtered portrait</h6>
                                                    </b-link>
                                                    <p class="mb-0 text-muted">Sold at 34.81 ETH</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><small>Just Now</small></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="@/assets/images/nft/gif/img-4.gif" alt=""
                                                    class="avatar-sm object-cover rounded-circle">
                                                <div class="ms-2">
                                                    <b-link href="/apps/nft-item-detail">
                                                        <h6 class="fs-15 mb-1">Patterns arts & culture</h6>
                                                    </b-link>
                                                    <p class="mb-0 text-muted">Sold at 147.83 ETH</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><small>3 sec ago</small></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="@/assets/images/nft/gif/img-3.gif" alt=""
                                                    class="avatar-sm object-cover rounded-circle">
                                                <div class="ms-2">
                                                    <b-link href="/apps/nft-item-detail">
                                                        <h6 class="fs-15 mb-1">Evolved Reality</h6>
                                                    </b-link>
                                                    <p class="mb-0 text-muted">Sold at 34.81 ETH</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><small>2 min ago</small></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="@/assets/images/nft/img-04.jpg" alt=""
                                                    class="avatar-sm object-cover rounded-circle">
                                                <div class="ms-2">
                                                    <b-link href="/apps/nft-item-detail">
                                                        <h6 class="fs-15 mb-1">Smillevers Crypto</h6>
                                                    </b-link>
                                                    <p class="mb-0 text-muted">Sold at 47.9 ETH</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><small>26 min ago</small></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="@/assets/images/nft/img-05.jpg" alt=""
                                                    class="avatar-sm object-cover rounded-circle">
                                                <div class="ms-2">
                                                    <b-link href="/apps/nft-item-detail">
                                                        <h6 class="fs-15 mb-1">Robotic Body Art</h6>
                                                    </b-link>
                                                    <p class="mb-0 text-muted">Sold at 134.32 ETH</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><small>1 hrs ago</small></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="@/assets/images/nft/img-02.jpg" alt=""
                                                    class="avatar-sm object-cover rounded-circle">
                                                <div class="ms-2">
                                                    <b-link href="/apps/nft-item-detail">
                                                        <h6 class="fs-15 mb-1">Trendy fashion portraits</h6>
                                                    </b-link>
                                                    <p class="mb-0 text-muted">Sold at 643.19 ETH</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><small>3 hrs ago</small></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h6 class="card-title mb-0 flex-grow-1">Top Creator</h6>
                        <b-link class="text-muted" href="/apps/nft-item-detail">
                            See All <i class="ri-arrow-right-line align-bottom"></i>
                        </b-link>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-borderless align-middle">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="@/assets/images/users/avatar-1.jpg" alt=""
                                                    class="avatar-sm object-cover rounded-circle">
                                                <div class="ms-2">
                                                    <a href="#!">
                                                        <h6 class="fs-15 mb-1">Herbert Stokes</h6>
                                                    </a>
                                                    <p class="mb-0 text-muted">23 Products</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><button class="btn btn-success btn-sm">Follow</button></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="@/assets/images/users/avatar-3.jpg" alt=""
                                                    class="avatar-sm object-cover rounded-circle">
                                                <div class="ms-2">
                                                    <a href="#!">
                                                        <h6 class="fs-15 mb-1">Thomas Taylor</h6>
                                                    </a>
                                                    <p class="mb-0 text-muted">123 Products</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><button class="btn btn-soft-success btn-sm">Unfllow</button></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="@/assets/images/users/avatar-5.jpg" alt=""
                                                    class="avatar-sm object-cover rounded-circle">
                                                <div class="ms-2">
                                                    <a href="#!">
                                                        <h6 class="fs-15 mb-1">Henry Baird</h6>
                                                    </a>
                                                    <p class="mb-0 text-muted">46 Products</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><button class="btn btn-success btn-sm">Follow</button></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="@/assets/images/users/avatar-10.jpg" alt=""
                                                    class="avatar-sm object-cover rounded-circle">
                                                <div class="ms-2">
                                                    <a href="#!">
                                                        <h6 class="fs-15 mb-1">Nancy Martino</h6>
                                                    </a>
                                                    <p class="mb-0 text-muted">845 Products</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><button class="btn btn-success btn-sm">Follow</button></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="@/assets/images/users/avatar-8.jpg" alt=""
                                                    class="avatar-sm object-cover rounded-circle">
                                                <div class="ms-2">
                                                    <a href="#!">
                                                        <h6 class="fs-15 mb-1">James Price</h6>
                                                    </a>
                                                    <p class="mb-0 text-muted">318 Products</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><button class="btn btn-soft-success btn-sm">Unfllow</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </Layout>
</template>