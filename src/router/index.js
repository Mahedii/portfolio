import { createWebHistory, createRouter } from "vue-router";
// import axios from '@/axiosInstance.js'
import routes from './routes';
import appConfig from "../../app.config";
// import store from '@/state/store';

const router = createRouter({
  history: createWebHistory(),
  routes,
  // Use the HTML5 history API (i.e. normal-looking routes)
  // instead of routes with hashes (e.g. example.com/#/about).
  // This may require some server configuration in production:
  // https://router.vuejs.org/en/essentials/history-mode.html#example-server-configurations
  // mode: 'history',
  // Simulate native-like scroll behavior when navigating to a new
  // route and using back/forward buttons.
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition;
    } else {
      return { top: 0, left: 0 };
    }
  },
});

// API based Authentication
// Before each route evaluates...
router.beforeEach(async (routeTo, routeFrom, next) => {
    // const authRequired = routeTo.matched.some((route) => route.meta.authRequired);
    // const authRequired = false;
    const publicPages = ['/login', '/register', '/forgot-password'];
    const authpage = !publicPages.includes(routeTo.path);
    const jwtToken = sessionStorage.getItem('jwt-token')
    const jwtTokenExpiresIn = sessionStorage.getItem('jwt-token-expires-in')
    // axios.defaults.headers.common['authorization'] = 'Bearer ' + sessionStorage.getItem('jwt-token'); // for all requests

    if (authpage == false && jwtToken != null && new Date().getTime() < jwtTokenExpiresIn) {
        return router.back();
    } else if (authpage == false && !jwtToken) {
        next();
    } else if (authpage && jwtToken && new Date().getTime() > jwtTokenExpiresIn) {
        next();
    } else if (authpage && !jwtToken) {
        next('/login');
    } else {
      next();
    }

    // if (!authRequired && !jwtToken) {
    //     next();
    // } else {
    //     router.back();
    // }


    // await this.axios.get('/user/details').then((data) => {
    //   sessionStorage.setItem('userdata', JSON.stringify(data.data));
    //   sessionStorage.setItem('userid', data.data.id);
    //   sessionStorage.setItem('user', JSON.stringify(data.data));
    //   console.log(sessionStorage.getItem('user'))
    //   next();
    // }).catch(() => {
    //   console.log('user')
    //   next('/login');
    // });
    // next();
});

// router.afterEach((to, from) => {
//   let previousRoute = null;
//   if (to.name === '/' && previousRoute) {
//     // Redirect to the previous route if the current route is Home and a previous route is stored
//     router.replace(previousRoute);
//     // Reset the previous route to null
//     previousRoute = null;
//   }
// });

// router.beforeEach((routeTo, routeFrom, next) => {
//   if (process.env.VUE_APP_DEFAULT_AUTH === "firebase") {

//     // Check if auth is required on this route
//     // (including nested routes).
//     // const authRequired = routeTo.matched.some((route) => route.meta.authRequired);
//     const authRequired = false;

//     // If auth isn't required for the route, just continue.
//     if (!authRequired) return next();

//     // If auth is required and the user is logged in...
//     if (store.getters['auth/loggedIn']) {
//       // Validate the local user token...
//       return store.dispatch('auth/validate').then((validUser) => {
//         // Then continue if the token still represents a valid user,
//         // otherwise redirect to login.
//         validUser ? next() : redirectToLogin();
//       });
//     }

//     // If auth is required and the user is NOT currently logged in,
//     // redirect to login.
//     redirectToLogin();

//     // eslint-disable-next-line no-unused-vars
//     // eslint-disable-next-line no-inner-declarations
//     function redirectToLogin() {
//       // Pass the original route to the login component
//       next({ name: 'login', query: { redirectFrom: routeTo.fullPath } });
//     }
//   } else {
//     const publicPages = ['/login', '/register', '/forgot-password'];
//     const authpage = !publicPages.includes(routeTo.path);
//     const loggeduser = localStorage.getItem('user');

//     if (authpage && !loggeduser) {
//       return next('/login');
//     }

//     next();
//   }
// });

router.beforeResolve(async (routeTo, routeFrom, next) => {
  // Create a `beforeResolve` hook, which fires whenever
  // `beforeRouteEnter` and `beforeRouteUpdate` would. This
  // allows us to ensure data is fetched even when params change,
  // but the resolved route does not. We put it in `meta` to
  // indicate that it's a hook we created, rather than part of
  // Vue Router (yet?).
  try {
    // For each matched route...
    for (const route of routeTo.matched) {
      await new Promise((resolve, reject) => {
        // If a `beforeResolve` hook is defined, call it with
        // the same arguments as the `beforeEnter` hook.
        if (route.meta && route.meta.beforeResolve) {
          route.meta.beforeResolve(routeTo, routeFrom, (...args) => {
            // If the user chose to redirect...
            if (args.length) {
              // If redirecting to the same route we're coming from...
              // Complete the redirect.
              next(...args);
              reject(new Error('Redirected'));
            } else {
              resolve();
            }
          });
        } else {
          // Otherwise, continue resolving the route.
          resolve();
        }
      });
    }
    // If a `beforeResolve` hook chose to redirect, just return.
  } catch (error) {
    return;
  }
  document.title = routeTo.meta.title + ' | ' + appConfig.title;
  // If we reach this point, continue resolving the route.
  next();
});

export default router;
