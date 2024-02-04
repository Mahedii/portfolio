<script>
    // import axios from '@/axiosInstance.js'
    // import jwtToken from '../../vuex/jwtToken'
    export default {
        name: "Logout",
        created() {
            this.logoutUser()
        },
        methods: {
            async logoutUser() {
                try {
                    this.axios.get('/user/signout', {
                        headers: {
                            'Authorization': `Bearer ${sessionStorage.getItem('jwt-token')}`, // Replace with the actual token
                        },
                    })
                    .then(response => {
                        if (response.data.success) {
                            // sessionStorage.removeItem('jwt-token');
                            sessionStorage.clear()
                            // for (let key in sessionStorage) {
                            //     if (Object.hasOwnProperty.call(sessionStorage, key)) {
                            //         sessionStorage.removeItem(key);
                            //     }
                            // }
                            // jwtToken.dispatch('logoutUser');
                            this.$router.push('/login')
                        }
                    })
                    .catch(error => {
                        // console.log(error)
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
    <div></div>
</template>