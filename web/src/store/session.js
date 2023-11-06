import apiSession from "../services/api/session";

export default {
  state: {
    sessions: [],
    SessionDialog: false,
    SessionDialogDelete: false,
    SessionEditedIndex: -1,
    ModalAddOrUpdateSession: {},
    SessionEditedItem: {
      heure_debut: null,
    },
    SessionDefaultItem: {
      heure_debut: null,
    },
  },
  getters: {
    getSessions(state) {
      return state.sessions;
    },
    getSessionDialog(state) {
      return state.SessionDialog;
    },
    getSessionDialogDelete(state) {
      return state.SessionDialogDelete;
    },
    getSessionEditedIndex(state) {
      return state.SessionEditedIndex;
    },
    getSessionEditedItem(state) {
      return state.SessionEditedItem;
    },
    getSessionMessageDelete(state) {
      return `Etes vous sure de vouloir supprimer : ${state.SessionEditedItem.heure_debut}`;
    },
  },
  mutations: {
    SET_ModalAddOrUpdateSession(state, data) {
      state.ModalAddOrUpdateSession = data;
    },

    SET_SESSIONS(state, data) {
      state.sessions = data;
    },
    SESSION_CLOSE_DELETE(state) {
      state.SessionDialogDelete = false;
      state.SessionEditedItem = Object.assign({}, state.SessionDefaultItem);
      state.SessionEditedIndex = -1;
    },
    SESSION_DELETE_ITEM_CONFIRM(state) {
      apiSession
        .destroy(state.SessionEditedItem)
        .then((res) => {
          state.sessions.splice(state.SessionEditedIndex, 1);
          this.commit("SESSION_CLOSE_DELETE");
          this.commit("SET_SNACK", {
            text: "Session supprimé",
            color: "success",
            timeout: 2000,
          });
        })
        .catch((err) => {
          this.commit("SET_SNACK", {
            text: err.message,
            color: "error",
            timeout: 2000,
          });
        });
    },
    SESSION_DELETE_ITEM(state, data) {
      state.SessionEditedIndex = state.sessions.indexOf(data);
      state.SessionEditedItem = Object.assign({}, data);
      state.SessionDialogDelete = true;
    },
    OPEN_SESSION_DIALOG(state) {
      state.SessionDialog = true;
    },
    CLOSE_SESSION_DIALOG(state) {
      state.SessionDialog = false;
      state.SessionEditedItem = Object.assign({}, state.SessionDefaultItem);
      state.SessionEditedIndex = -1;
      state.ModalAddOrUpdateSession.$refs.formSession.resetValidation();
    },
    UPDATE_DIALOG_SESSION(state, data) {
      state.SessionEditedIndex = state.sessions.indexOf(data);
      state.SessionEditedItem = Object.assign({}, data);
      state.SessionDialog = true;
    },
    SAVE_SESSION(state) {
      if (state.SessionEditedIndex > -1) {
        apiSession
          .update(state.SessionEditedItem)
          .then((res) => {
            Object.assign(state.sessions[state.SessionEditedIndex], res.data);
            this.commit("SET_SNACK", {
              text: "Session modifiée",
              color: "success",
              timeout: 2000,
            });
            this.commit("CLOSE_SESSION_DIALOG");
          })
          .catch((err) => {
            this.commit("SET_SNACK", {
              text: err.message,
              color: "error",
              timeout: 2000,
            });
          });
      } else {
        apiSession
          .store(state.SessionEditedItem)
          .then((res) => {
            state.sessions.push(res.data);
            this.commit("SET_SNACK", {
              text: "Session créé",
              color: "success",
              timeout: 2000,
            });
            this.commit("CLOSE_SESSION_DIALOG");
          })
          .catch((err) => {
            this.commit("SET_SNACK", {
              text: err.message,
              color: "error",
              timeout: 2000,
            });
          });
      }
    },
  },
  actions: {
    initSessions({ commit }) {
      commit("OPEN_OVERLAY");
      apiSession
        .index()
        .then((res) => {
          commit("SET_SESSIONS", res.data.data);
          commit("CLOSE_OVERLAY");
        })
        .catch((err) => {
          commit("CLOSE_OVERLAY");
          commit("SET_SNACK", {
            text: err.message,
            color: "error",
            timeout: 2000,
          });
        });
    },

    changeStatutSession({ commit }, data) {
      apiSession
        .changeSessionStatut(data.sessions_reservation_id, {
          Statut: data.Statut,
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

    defineSET_ModalAddOrUpdateSession({ commit }, data) {
      commit("SET_ModalAddOrUpdateSession", data);
    },

    sessionCloseDelete({ commit }) {
      commit("SESSION_CLOSE_DELETE");
    },

    sessionDeleteItemConfirm({ commit }) {
      commit("SESSION_DELETE_ITEM_CONFIRM");
    },

    sessionDeleteItem({ commit }, data) {
      commit("SESSION_DELETE_ITEM", data);
    },

    openDialogSession({ commit }) {
      commit("OPEN_SESSION_DIALOG");
    },

    closeDialogSession({ commit }) {
      commit("CLOSE_SESSION_DIALOG");
    },

    updateDialogSession({ commit }, data) {
      commit("UPDATE_DIALOG_SESSION", data);
    },

    saveSession({ commit }) {
      commit("SAVE_SESSION");
    },
  },
};
