import { createRouter, createWebHistory } from 'vue-router'
import routes from './routes';
import jwtToken from '../vuex/jwtToken';

const router = createRouter({
  // history: createWebHistory(import.meta.env.BASE_URL),
  history: createWebHistory(),
  routes,
});

let previousRoute = null;

router.beforeEach((to, from, next) => {
  const vuesxStoreToken = jwtToken.state.token;
  const expirationTime = jwtToken.state.expirationTime;
  // console.log(to.path)
  // console.log(vuesxStoreToken)
  // console.log(expirationTime)
  // console.log(new Date().getTime())
  if (to.path === '/login' && vuesxStoreToken && expirationTime && new Date().getTime() < expirationTime) {
    // console.log("jeje");
    if (history.length != null) {
      // history.go(-1)
      // window.history.back()
      router.back();
    }
  }

  if (to.matched.some(record => record.meta.requiresAuth)) {
    // console.log("hh");
    if ((vuesxStoreToken && expirationTime && new Date().getTime() > expirationTime) || (!vuesxStoreToken || !expirationTime)) {
      // console.log("gg");
      jwtToken.dispatch('logoutUser'); // Token has expired. Clear token and perform logout actions 
      previousRoute = to.path;
      next('/login');
    } else {
      // console.log("ff");
      next(); // Token is valid or no token present
    }
  } else {
    // console.log("dd");
    next();
  }
});

router.afterEach((to, from) => {
  if (to.name === '/' && previousRoute) {
    // Redirect to the previous route if the current route is Home and a previous route is stored
    router.replace(previousRoute);
    // Reset the previous route to null
    previousRoute = null;
  }
});

export default router
