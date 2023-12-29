<!-- <script setup>
import { RouterLink, RouterView } from 'vue-router'
// import HelloWorld from './components/HelloWorld.vue'

</script>

<template>
  <header>
    <img alt="Vue logo" class="logo" src="@/assets/logo.svg" width="125" height="125" />

    <div class="wrapper">

      <nav>
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/cargo/list">Cargo List</RouterLink>
      </nav>
    </div>
  </header>

  <RouterView />
</template> -->

<script>
  // import RouterView from 'vue-router'
  import Master from "./views/admin/layouts/Master.vue"
  import Login from "./views/authentication/Login.vue"

  // export default {
  //   name: 'App',
  // };
  
  // export default {
  //   components: { Master, Login },
  // }
</script>

<template>
 
  <router-view></router-view>
  <!-- <Master></Master> -->
  <!-- <RouterView /> -->
</template>
