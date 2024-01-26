import About from '../views/admin/pages/About.vue'
import Master from '../views/admin/layouts/Master.vue'

function removeQueryParams(to) {
    if (Object.keys(to.query).length)
    return { path: to.path, query: {}, hash: to.hash }
}

function removeHash(to) {
    if (to.hash) return { path: to.path, query: to.query, hash: '' }
}

const routes = [
    // {
    //   path: '/',
    //   name: 'home',
    //   component: HomeView
    // },
    {
      path: '/',
      name: 'Master',
      component: Master,
      meta: {
        requiresAuth: true
      },
      children: [
        {
          path: '',
          name: 'Home',
          component: () => import('../views/admin/pages/Home.vue').then(module => module.default),
          meta: {
            requiresAuth: true
          },
        },
        {
          path: '/about',
          name: 'About',
          component: () => About,
        },
        {
          path: '/category',
          name: 'Category',
          component: () => import('../views/admin/pages/Category.vue').then(module => module.default),
        },
        {
          path: '/sub-category',
          name: 'SubCategory',
          component: () => import('../views/admin/pages/SubCategory.vue').then(module => module.default),
        },
        {
          path: '/expenses',
          name: 'Expenses',
          component: () => import('../views/admin/pages/Expenses.vue').then(module => module.default),
        },
        {
          path: '/payment-methods',
          name: 'Payment Methods',
          component: () => import('../views/admin/pages/Payment/PaymentMethods.vue').then(module => module.default),
        },
        {
          path: '/units',
          name: 'Measurement Units',
          component: () => import('../views/admin/pages/Measurement/Units.vue').then(module => module.default),
        },
      ],
    },
    {
      path: '/login',
      name: 'Login',
      component: () => import('../views/authentication/Login.vue').then(module => module.default),
      beforeEnter: [removeQueryParams],
    },
    {
      path: '/logout',
      name: 'logout',
      component: () => import('../views/authentication/Logout.vue').then(module => module.default),
    },
    // {
    //   path: '/cargo/list',
    //   name: 'CargoIndex',
    //   component: () => import('../views/cargo/list/Index.vue')
    // },
    // {
    //   path: '/cargo/list/create',
    //   name: 'CreateCargo',
    //   component: () => import('../views/cargo/list/CreateCargo.vue')
    // }
]

export default routes
