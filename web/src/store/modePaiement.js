import apiModePaiement from "../services/api/modePaiement";

export default {
  state: {
    modePaiements: [],
    ModePaiementDialog: false,
    ModePaiementDialogDelete: false,
    ModePaiementEditedIndex: -1,
    ModalAddOrUpdateModePaiement: {},
    ModePaiementEditedItem: {
      Nom: "",
    },
    ModePaiementDefaultItem: {
      Nom: "",
    },
  },
  getters: {
    getModePaiements(state) {
      return state.modePaiements;
    },
    getModePaiementDialog(state) {
      return state.ModePaiementDialog;
    },
    getModePaiementDialogDelete(state) {
      return state.ModePaiementDialogDelete;
    },
    getModePaiementEditedIndex(state) {
      return state.ModePaiementEditedIndex;
    },
    getModePaiementEditedItem(state) {
      return state.ModePaiementEditedItem;
    },
    getModePaiementMessageDelete(state) {
      return `Etes vous sure de vouloir supprimer : ${state.ModePaiementEditedItem.Nom}`;
    },
  },
  mutations: {
    SET_ModalAddOrUpdateModePaiement(state, data) {
      state.ModalAddOrUpdateModePaiement = data;
    },

    SET_MODEPAIEMENTS(state, data) {
      state.modePaiements = data;
    },
    MODEPAIEMENT_CLOSE_DELETE(state) {
      state.ModePaiementDialogDelete = false;
      state.ModePaiementEditedItem = Object.assign({}, state.ModePaiementDefaultItem);
      state.ModePaiementEditedIndex = -1;
    },
    MODEPAIEMENT_DELETE_ITEM_CONFIRM(state) {
      apiModePaiement
        .destroy(state.ModePaiementEditedItem)
        .then((res) => {
          state.modePaiements.splice(state.ModePaiementEditedIndex, 1);
          this.commit("MODEPAIEMENT_CLOSE_DELETE");
          this.commit("SET_SNACK", {
            text: "Mode de Paiement supprimé",
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
    MODEPAIEMENT_DELETE_ITEM(state, data) {
      state.ModePaiementEditedIndex = state.modePaiements.indexOf(data);
      state.ModePaiementEditedItem = Object.assign({}, data);
      state.ModePaiementDialogDelete = true;
    },
    OPEN_MODEPAIEMENT_DIALOG(state) {
      state.ModePaiementDialog = true;
    },
    CLOSE_MODEPAIEMENT_DIALOG(state) {
      state.ModePaiementDialog = false;
      state.ModePaiementEditedItem = Object.assign({}, state.ModePaiementDefaultItem);
      state.ModePaiementEditedIndex = -1;
      state.ModalAddOrUpdateModePaiement.$refs.formModePaiement.resetValidation();
    },
    UPDATE_DIALOG_MODEPAIEMENT(state, data) {
      state.ModePaiementEditedIndex = state.modePaiements.indexOf(data);
      state.ModePaiementEditedItem = Object.assign({}, data);
      state.ModePaiementDialog = true;
    },
    SAVE_MODEPAIEMENT(state) {
      if (state.ModePaiementEditedIndex > -1) {
        apiModePaiement
          .update(state.ModePaiementEditedItem)
          .then((res) => {
            Object.assign(state.modePaiements[state.ModePaiementEditedIndex], res.data);
            this.commit("SET_SNACK", {
              text: "Mode de Paiement modifiée",
              color: "success",
              timeout: 2000,
            });
            this.commit("CLOSE_MODEPAIEMENT_DIALOG");
          })
          .catch((err) => {
            this.commit("SET_SNACK", {
              text: err.message,
              color: "error",
              timeout: 2000,
            });
          });
      } else {
        apiModePaiement
          .store(state.ModePaiementEditedItem)
          .then((res) => {
            state.modePaiements.push(res.data);
            this.commit("SET_SNACK", {
              text: "Mode de Paiement créé",
              color: "success",
              timeout: 2000,
            });
            this.commit("CLOSE_MODEPAIEMENT_DIALOG");
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
    initModePaiements({ commit }) {
      commit("OPEN_OVERLAY");
      apiModePaiement
        .index()
        .then((res) => {
          commit("SET_MODEPAIEMENTS", res.data.data);
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

    defineSET_ModalAddOrUpdateModePaiement({ commit }, data) {
      commit("SET_ModalAddOrUpdateModePaiement", data);
    },

    modePaiementCloseDelete({ commit }) {
      commit("MODEPAIEMENT_CLOSE_DELETE");
    },

    modePaiementDeleteItemConfirm({ commit }) {
      commit("MODEPAIEMENT_DELETE_ITEM_CONFIRM");
    },

    modePaiementDeleteItem({ commit }, data) {
      commit("MODEPAIEMENT_DELETE_ITEM", data);
    },

    openDialogModePaiement({ commit }) {
      commit("OPEN_MODEPAIEMENT_DIALOG");
    },

    closeDialogModePaiement({ commit }) {
      commit("CLOSE_MODEPAIEMENT_DIALOG");
    },

    updateDialogModePaiement({ commit }, data) {
      commit("UPDATE_DIALOG_MODEPAIEMENT", data);
    },

    saveModePaiement({ commit }) {
      commit("SAVE_MODEPAIEMENT");
    },
  },
};
