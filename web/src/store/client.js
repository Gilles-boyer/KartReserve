import apiClient from "../services/api/client";

export default {
  state: {
    clients: [],
    ClientDialog: false,
    ClientDialogDelete: false,
    ClientEditedIndex: -1,
    ModalAddOrUpdateClient: {},
    ClientEditedItem: {
      Nom: "",
      Tel: "",
      Email: "",
      Commentaire: "",
    },
    ClientDefaultItem: {
      Nom: "",
      Tel: "",
      Email: "",
      Commentaire: "",
    },
  },
  getters: {
    getClients(state) {
      return state.clients;
    },
    getClientDialog(state) {
      return state.ClientDialog;
    },
    getClientDialogDelete(state) {
      return state.ClientDialogDelete;
    },
    getClientEditedIndex(state) {
      return state.ClientEditedIndex;
    },
    getClientEditedItem(state) {
      return state.ClientEditedItem;
    },
    getClientMessageDelete(state) {
      return `Etes vous sure de vouloir supprimer : ${state.ClientEditedItem.Nom}`;
    },
  },
  mutations: {
    SET_ModalAddOrUpdateClient(state, data) {
      state.ModalAddOrUpdateClient = data;
    },

    SET_CLIENTS(state, data) {
      state.clients = data;
    },
    CLIENT_CLOSE_DELETE(state) {
      state.ClientDialogDelete = false;
      state.ClientEditedItem = Object.assign({}, state.ClientDefaultItem);
      state.ClientEditedIndex = -1;
    },
    CLIENT_DELETE_ITEM_CONFIRM(state) {
      apiClient
        .destroy(state.ClientEditedItem)
        .then((res) => {
          state.clients.splice(state.ClientEditedIndex, 1);
          this.commit("CLIENT_CLOSE_DELETE");
          this.commit("SET_SNACK", {
            text: "Client supprimé",
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
    CLIENT_DELETE_ITEM(state, data) {
      state.ClientEditedIndex = state.clients.indexOf(data);
      state.ClientEditedItem = Object.assign({}, data);
      state.ClientDialogDelete = true;
    },
    OPEN_CLIENT_DIALOG(state) {
      state.ClientDialog = true;
    },
    CLOSE_CLIENT_DIALOG(state) {
      state.ClientDialog = false;
      state.ClientEditedItem = Object.assign({}, state.ClientDefaultItem);
      state.ClientEditedIndex = -1;
      state.ModalAddOrUpdateClient.$refs.formClient.resetValidation();
    },
    UPDATE_DIALOG_CLIENT(state, data) {
      state.ClientEditedIndex = state.clients.indexOf(data);
      state.ClientEditedItem = Object.assign({}, data);
      state.ClientDialog = true;
    },
    SAVE_CLIENT(state) {
      if (state.ClientEditedIndex > -1) {
        apiClient
          .update(state.ClientEditedItem)
          .then((res) => {
            Object.assign(state.clients[state.ClientEditedIndex], res.data);
            this.commit("SET_SNACK", {
              text: "Client modifiée",
              color: "success",
              timeout: 2000,
            });
            this.commit("CLOSE_CLIENT_DIALOG");
          })
          .catch((err) => {
            this.commit("SET_SNACK", {
              text: err.message,
              color: "error",
              timeout: 2000,
            });
          });
      } else {
        apiClient
          .store(state.ClientEditedItem)
          .then((res) => {
            state.clients.push(res.data);
            this.commit("SET_SNACK", {
              text: "Client créé",
              color: "success",
              timeout: 2000,
            });
            this.commit("CLOSE_CLIENT_DIALOG");
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
    initClients({ commit }) {
      commit("OPEN_OVERLAY");
      apiClient
        .index()
        .then((res) => {
          commit("SET_CLIENTS", res.data.data);
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

    defineSET_ModalAddOrUpdateClient({ commit }, data) {
      commit("SET_ModalAddOrUpdateClient", data);
    },

    clientCloseDelete({ commit }) {
      commit("CLIENT_CLOSE_DELETE");
    },

    clientDeleteItemConfirm({ commit }) {
      commit("CLIENT_DELETE_ITEM_CONFIRM");
    },

    clientDeleteItem({ commit }, data) {
      commit("CLIENT_DELETE_ITEM", data);
    },

    openDialogClient({ commit }) {
      commit("OPEN_CLIENT_DIALOG");
    },

    closeDialogClient({ commit }) {
      commit("CLOSE_CLIENT_DIALOG");
    },

    updateDialogClient({ commit }, data) {
      commit("UPDATE_DIALOG_CLIENT", data);
    },

    saveClient({ commit }) {
      commit("SAVE_CLIENT");
    },
  },
};
