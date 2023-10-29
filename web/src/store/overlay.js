export default {
  state: {
    overlay: {
      value: false,
    },
  },
  getters: {
    getOverlayValue(state) {
      return state.overlay.value;
    },
  },
  mutations: {
    OPEN_OVERLAY(state) {
        state.overlay.value = true;
    },
    CLOSE_OVERLAY(state) {
        state.overlay.value = false;
    },
  },
  actions: {
    openOverlay({ commit }) {
      commit("OPEN_OVERLAY");
    },
    closeOverlay({ commit }) {
        commit("CLOSE_OVERLAY");
      },
  },
};
