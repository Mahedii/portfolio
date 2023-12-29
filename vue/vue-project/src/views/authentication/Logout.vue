<script>
    import jwtToken from '../../vuex/jwtToken'
    export default {
        name: "Logout",
        created() {
            this.logoutUser()
        },
        methods: {
            async logoutUser() {
                const storedToken = localStorage.getItem('token');
                try {
                    this.axios.get('/user/signout', {
                        headers: {
                            'Authorization': `Bearer ${storedToken}`, // Replace with the actual token
                        },
                    })
                    .then(response => {
                        if (response.data.success) {
                            localStorage.removeItem('token');
                            jwtToken.dispatch('logoutUser');
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
</template>