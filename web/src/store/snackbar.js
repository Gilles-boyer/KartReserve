export default {
  state: {
    snackbar: {
      snackbar: false,
      text: "test 1, 2, 3, ...",
      timeout: 2000,
      color: "primary",
    },
  },
  getters: {
    getSnackbar(state) {
      return state.snackbar;
    },
  },
  mutations: {
    SET_SNACK(state, data) {
      state.snackbar.text = data.text;
      state.snackbar.color = data.color;
      state.snackbar.snackbar = true;
      state.snackbar.timeout = data.timeout;
    },
    CLOSE_SNACK(state) {
      state.snackbar.snackbar = false;
    },
  },
  actions: {
    setSnack({ commit }, data) {
      commit("SET_SNACK", data);
    },
    closeSnack({ commit }) {
      commit("CLOSE_SNACK");
    },
  },
};
