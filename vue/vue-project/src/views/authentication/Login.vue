<script>
    import Footer from "../authentication/layouts/Footer.vue"
    import jwtToken from '../../vuex/jwtToken'
    export default {
        components: { Footer },
        name: "Login",
        data() {
            return {
                email: "",
                password: "",
            };
        },
        created() {},
        methods: {
            async loginUser() {
                try {
                    this.isSubmitting = true
                    let payload = {
                        email: this.email,
                        password: this.password,
                    }

                    // axios.get('/api/admin/dashboard', {
                    //     headers: {
                    //         'Authorization': `Bearer ${storedToken}`, // Replace with the actual token
                    //     },
                    // })

                    this.axios.post('/user-signin', payload)
                    .then(response => {
                        // console.log(response);
                        if (response.data.success) {
                            const token = response.data.access_token;
                            // console.log(token);
                            // Set Token in Axios Headers
                            // this.axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

                            // Store token in local storage (optional)
                            localStorage.setItem('token', token);
                            // Example of storing token and expiration time in Vuex
                            const expiresIn = response.data.expires_in; // This is assumed to be the token expiration time in seconds
                            // console.log(expiresIn);
                            const expirationTime = new Date().getTime() + expiresIn * 60 * 1000; // Convert minutes to milliseconds
                            jwtToken.dispatch('loginUser', { token, expirationTime });
                            const getToken = localStorage.getItem('token');
                            this.$router.push("/");
                        } else {
                            alert("Authentication failed. Please check your credentials.");
                        }
                        // localStorage.setItem('token', response.data.token)
                        // this.$router.push('/dashboard')
                        // return response
                    })
                    .catch(error => {
                        this.isSubmitting = false
                        console.log(error)
                        // if (error.response.data.errors != undefined) {
                        //     this.validationErrors = error.response.data.errors
                        // }
                        return error
                    });
                } catch (error) {
                    console.error("An error occurred during authentication:", error);
                    alert("An error occurred. Please try again later.");
                }
            },
        },
    }
</script>

<template>
    <div class="auth-page-wrapper pt-5" style="width: 1280px;">
        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="../../../assets/images/logo-light.png" alt="" height="20">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">Premium Admin &amp; Dashboard Template</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4 card-bg-fill">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue to Velzon.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form @submit.prevent="loginUser">
                                    <!-- <form> -->
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input v-model="email" type="text" class="form-control" id="username" placeholder="Enter username">
                                        </div>

                                        <div class="mb-3">
                                            <div class="float-end">
                                                <a href="auth-pass-reset-basic.html" class="text-muted">Forgot password?</a>
                                            </div>
                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input v-model="password" type="password" class="form-control pe-5 password-input" placeholder="Enter password" id="password-input">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-primary w-100" type="submit">Sign In</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="fs-13 mb-4 title">Sign In with</h5>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-primary btn-icon waves-effect waves-light" style="margin: 0px 2px;"><i class="ri-facebook-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" style="margin: 0px 2px;"><i class="ri-google-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-dark btn-icon waves-effect waves-light" style="margin: 0px 2px;"><i class="ri-github-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-info btn-icon waves-effect waves-light" style="margin: 0px 2px;"><i class="ri-twitter-fill fs-16"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0">Don't have an account ? <a href="auth-signup-basic.html" class="fw-semibold text-primary text-decoration-underline"> Signup </a> </p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <Footer></Footer>
    </div>
</template>