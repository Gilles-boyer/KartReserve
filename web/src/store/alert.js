import apiAlert from "../services/api/alerte";

export default {
  state: {
    alertes: [],
    AlertDialog: false,
    AlertDialogDelete: false,
    AlertEditedIndex: -1,
    ModalAddOrUpdateAlert: {},
    AlertEditedItem: {
      id: 0,
      icon: "",
      Message: "",
      color: "",
    },
    AlertDefaultItem: {
      id: 0,
      icon: "",
      Message: "",
      color: "",
    },
  },
  getters: {
    getAlertes(state) {
      return state.alertes;
    },
    getAlertDialog(state) {
      return state.AlertDialog;
    },
    getAlertDialogDelete(state) {
      return state.AlertDialogDelete;
    },
    getAlertEditedIndex(state) {
      return state.AlertEditedIndex;
    },
    getAlertEditedItem(state) {
      return state.AlertEditedItem;
    },
    getAlertMessageDelete(state) {
      return `Etes vous sure de vouloir supprimer : ${state.AlertEditedItem.Message}`;
    },
  },
  mutations: {
    SET_ModalAddOrUpdateAlert(state, data) {
      state.ModalAddOrUpdateAlert = data;
    },

    SET_ALERTES(state, data) {
      state.alertes = data;
    },
    ALERT_CLOSE_DELETE(state) {
      state.AlertDialogDelete = false;
      state.AlertEditedItem = Object.assign({}, state.AlertDefaultItem);
      state.AlertEditedIndex = -1;
    },
    ALERT_DELETE_ITEM_CONFIRM(state) {
      apiAlert
        .destroy(state.AlertEditedItem)
        .then((res) => {
          state.alertes.splice(state.AlertEditedIndex, 1);
          this.commit("ALERT_CLOSE_DELETE");
          this.commit("SET_SNACK", {
            text: "Alerte supprimé",
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
    ALERT_DELETE_ITEM(state, data) {
      state.AlertEditedIndex = state.alertes.indexOf(data);
      state.AlertEditedItem = Object.assign({}, data);
      state.AlertDialogDelete = true;
    },
    OPEN_ALERT_DIALOG(state) {
      state.AlertDialog = true;
    },
    CLOSE_ALERT_DIALOG(state) {
      state.AlertDialog = false;
      state.AlertEditedItem = Object.assign({}, state.AlertDefaultItem);
      state.AlertEditedIndex = -1;
      state.ModalAddOrUpdateAlert.$refs.formAlert.resetValidation();
    },
    UPDATE_DIALOG_ALERT(state, data) {
      state.AlertEditedIndex = state.alertes.indexOf(data);
      state.AlertEditedItem = Object.assign({}, data);
      state.AlertDialog = true;
    },
    SAVE_ALERT(state) {
      if (state.AlertEditedIndex > -1) {
        apiAlert
          .update(state.AlertEditedItem)
          .then((res) => {
            Object.assign(state.alertes[state.AlertEditedIndex], res.data);
            this.commit("SET_SNACK", {
              text: "Alerte modifiée",
              color: "success",
              timeout: 2000,
            });
            this.commit("CLOSE_ALERT_DIALOG");
          })
          .catch((err) => {
            this.commit("SET_SNACK", {
              text: err.message,
              color: "error",
              timeout: 2000,
            });
          });
      } else {
        apiAlert
          .store(state.AlertEditedItem)
          .then((res) => {
            state.alertes.push(res.data);
            this.commit("SET_SNACK", {
              text: "Alerte créé",
              color: "success",
              timeout: 2000,
            });
            this.commit("CLOSE_ALERT_DIALOG");
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
    initAlertes({ commit }) {
      commit("OPEN_OVERLAY");
      apiAlert
        .index()
        .then((res) => {
          commit("SET_ALERTES", res.data.data);
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

    defineSET_ModalAddOrUpdateAlert({commit}, data) {
      commit("SET_ModalAddOrUpdateAlert", data)
    },

    alertCloseDelete({ commit }) {
      commit("ALERT_CLOSE_DELETE");
    },

    alertDeleteItemConfirm({ commit }) {
      commit("ALERT_DELETE_ITEM_CONFIRM");
    },

    alertDeleteItem({ commit }, data) {
      commit("ALERT_DELETE_ITEM", data);
    },

    openDialogAlert({ commit }) {
      commit("OPEN_ALERT_DIALOG");
    },

    closeDialogAlert({ commit }) {
      commit("CLOSE_ALERT_DIALOG");
    },

    updateDialogAlert({ commit }, data) {
      commit("UPDATE_DIALOG_ALERT", data);
    },

    saveAlert({ commit }) {
      commit("SAVE_ALERT");
    },
  },
};
