import apiFormule from "../services/api/formule";

export default {
  state: {
    formules: [],
    FormuleDialog: false,
    FormuleDialogDelete: false,
    FormuleEditedIndex: -1,
    ModalAddOrUpdateFormule: {},
    FormuleEditedItem: {
      Nom: "",
      Tel: "",
      Email: "",
      Commentaire: "",
    },
    FormuleDefaultItem: {
      Nom: "",
      Tel: "",
      Email: "",
      Commentaire: "",
    },
  },
  getters: {
    getFormules(state) {
      return state.formules;
    },
    getFormuleDialog(state) {
      return state.FormuleDialog;
    },
    getFormuleDialogDelete(state) {
      return state.FormuleDialogDelete;
    },
    getFormuleEditedIndex(state) {
      return state.FormuleEditedIndex;
    },
    getFormuleEditedItem(state) {
      return state.FormuleEditedItem;
    },
    getFormuleMessageDelete(state) {
      return `Etes vous sure de vouloir supprimer : ${state.FormuleEditedItem.Nom}`;
    },
  },
  mutations: {
    SET_ModalAddOrUpdateFormule(state, data) {
      state.ModalAddOrUpdateFormule = data;
    },

    SET_FORMULES(state, data) {
      state.formules = data;
    },
    FORMULE_CLOSE_DELETE(state) {
      state.FormuleDialogDelete = false;
      state.FormuleEditedItem = Object.assign({}, state.FormuleDefaultItem);
      state.FormuleEditedIndex = -1;
    },
    FORMULE_DELETE_ITEM_CONFIRM(state) {
      apiFormule
        .destroy(state.FormuleEditedItem)
        .then((res) => {
          state.formules.splice(state.FormuleEditedIndex, 1);
          this.commit("FORMULE_CLOSE_DELETE");
          this.commit("SET_SNACK", {
            text: "Formule supprimé",
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
    FORMULE_DELETE_ITEM(state, data) {
      state.FormuleEditedIndex = state.formules.indexOf(data);
      state.FormuleEditedItem = Object.assign({}, data);
      state.FormuleDialogDelete = true;
    },
    OPEN_FORMULE_DIALOG(state) {
      state.FormuleDialog = true;
    },
    CLOSE_FORMULE_DIALOG(state) {
      state.FormuleDialog = false;
      state.FormuleEditedItem = Object.assign({}, state.FormuleDefaultItem);
      state.FormuleEditedIndex = -1;
      state.ModalAddOrUpdateFormule.$refs.formFormule.resetValidation();
    },
    UPDATE_DIALOG_FORMULE(state, data) {
      state.FormuleEditedIndex = state.formules.indexOf(data);
      state.FormuleEditedItem = Object.assign({}, data);
      state.FormuleDialog = true;
    },
    SAVE_FORMULE(state) {
      if (state.FormuleEditedIndex > -1) {
        apiFormule
          .update(state.FormuleEditedItem)
          .then((res) => {
            Object.assign(state.formules[state.FormuleEditedIndex], res.data);
            this.commit("SET_SNACK", {
              text: "Formule modifiée",
              color: "success",
              timeout: 2000,
            });
            this.commit("CLOSE_FORMULE_DIALOG");
          })
          .catch((err) => {
            this.commit("SET_SNACK", {
              text: err.message,
              color: "error",
              timeout: 2000,
            });
          });
      } else {
        apiFormule
          .store(state.FormuleEditedItem)
          .then((res) => {
            state.formules.push(res.data);
            this.commit("SET_SNACK", {
              text: "Formule créé",
              color: "success",
              timeout: 2000,
            });
            this.commit("CLOSE_FORMULE_DIALOG");
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
    initFormules({ commit }) {
      commit("OPEN_OVERLAY");
      apiFormule
        .index()
        .then((res) => {
          commit("SET_FORMULES", res.data.data);
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

    defineSET_ModalAddOrUpdateFormule({ commit }, data) {
      commit("SET_ModalAddOrUpdateFormule", data);
    },

    formuleCloseDelete({ commit }) {
      commit("FORMULE_CLOSE_DELETE");
    },

    formuleDeleteItemConfirm({ commit }) {
      commit("FORMULE_DELETE_ITEM_CONFIRM");
    },

    formuleDeleteItem({ commit }, data) {
      commit("FORMULE_DELETE_ITEM", data);
    },

    openDialogFormule({ commit }) {
      commit("OPEN_FORMULE_DIALOG");
    },

    closeDialogFormule({ commit }) {
      commit("CLOSE_FORMULE_DIALOG");
    },

    updateDialogFormule({ commit }, data) {
      commit("UPDATE_DIALOG_FORMULE", data);
    },

    saveFormule({ commit }) {
      commit("SAVE_FORMULE");
    },
  },
};
