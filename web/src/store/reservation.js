import apiReservation from "../services/api/reservation";

export default {
  state: {
    allSessions: [],
  },
  getters: {
    getAllSession(state) {
      return state.allSessions;
    },
  },
  mutations: {
    SET_ALL_SESSIONS(state, data) {
      state.allSessions = data;
    },
  },
  actions: {
    initAllSessionReservation({ commit }, date) {
      apiReservation.getSessionByDate(date).then((res) => {
        commit("SET_ALL_SESSIONS", res.data.data);
      });
    },

    changeStatutPaiement({ commit }, data) {
      apiReservation
        .changeStatutPaiement(data.reservation_formule_id, {
          payed: data.payed,
        })
        .then((res) => {
          commit("SET_SNACK", {
            text: "modifié",
            color: "success",
            timeout: 2000,
          });
        })
        .catch((err) => {
          commit("SET_SNACK", {
            text: err.message,
            color: "error",
            timeout: 2000,
          });
        });
    },

    changeTypePerson({ commit }, data) {
      apiReservation
        .changeTypePersonSession(data.reservation_formule_id, {
          Type_de_session: data.Type_de_session,
        })
        .then((res) => {
          commit("SET_SNACK", {
            text: "modifié",
            color: "success",
            timeout: 2000,
          });
        })
        .catch((err) => {
          commit("SET_SNACK", {
            text: err.message,
            color: "error",
            timeout: 2000,
          });
        });
    },
  },
};
