import { createStore } from 'vuex';
import VuexPersister from 'vuex-persister'

const vuexPersister = new VuexPersister({
  //...
})

const jwtToken = createStore({
  state: {
    token: null,
    expirationTime: null,
  },
  mutations: {
    setToken(state, { token, expirationTime }) {
      state.token = token;
      state.expirationTime = expirationTime;
    },
    clearToken(state) {
      state.token = null;
      state.expirationTime = null;
    },
  },
  actions: {
    loginUser({ commit }, { token, expirationTime }) {
      // const expirationTime = new Date().getTime() + expiresIn * 1000; // Convert to milliseconds
      commit('setToken', { token, expirationTime });
    },
    logoutUser({ commit }) {
      commit('clearToken');
      // Other logout actions (if needed)
    },
  },
  plugins: [vuexPersister.persist]
});

export default jwtToken;
