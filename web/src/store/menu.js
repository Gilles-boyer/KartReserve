export default {
  state: {
    menu: [
      { title: "Acceuil", icon: "mdi-home", link: "/" },
      { title: "Alerte", icon: "mdi-alert", link: "/alert" },
      { title: "Client", icon: "mdi-account", link: "/client" },
      { title: "Formule", icon: "mdi-ballot", link: "/formule" },
      { title: "Mode Paiement", icon: "mdi-cash", link: "/paiement" },
      { title: "Réservation", icon: "mdi-calendar", link: "/reservation" },
      { title: "Session", icon: "mdi-clock", link: "/session" },
    ],
  },
  getters: {
    getMenu(state) {
      return state.menu;
    },
  },
  mutations: {},
  actions: {},
};
