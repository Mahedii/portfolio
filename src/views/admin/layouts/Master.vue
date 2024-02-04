<script>
    import TopBar from "./TopBar.vue"
    import SideBar from "./SideBar.vue"
    import Footer from "./Footer.vue"
    import { RouterView } from 'vue-router'
    import jwtToken from '../../../vuex/jwtToken';
    import { toast } from 'vue3-toastify';
    import 'vue3-toastify/dist/index.css';

    export default {
        components: { TopBar, SideBar, Footer },
        name: "Master",
        data() {
            return {
                user: {},
            };
        },
        created() {
            const vuesxStoreToken = jwtToken.state.token;
            const expirationTime = jwtToken.state.expirationTime;
            // console.log(vuesxStoreToken);
            // console.log(expirationTime);

            // this.$toast.success("Order placed.")

            // toast("Wow so easy !", {
            //     autoClose: 3000,
            //     "theme": "colored", // light dark auto colored
            //     "type": "success",
            //     "transition": "zoom", // bounce flip slide zoom
            // }); 

            // this.getUser()
            if (vuesxStoreToken && expirationTime && new Date().getTime() < expirationTime) {
                this.getUser()
            }
        },
        methods: {
            async getUser() {
                axios.get('/user/details')
                .then((r) => {
                    // console.log(r);
                    this.user = r.data;
                    return r
                })
                .catch((e) => {
                    return e
                });
            },
        },
    }
</script>

<template>
    <div id="layout-wrapper">
        <TopBar :user="user"></TopBar>
        <!-- ========== App Menu ========== -->
        <SideBar></SideBar>
        <!-- Left Sidebar End -->

        <!-- <RouterView /> -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <router-view :user="user"></router-view>

            <Footer></Footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-primary btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
</template>

<style>
</style>
