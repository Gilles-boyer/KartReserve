import Vue from 'vue';
import Vuetify from 'vuetify/lib/framework';

Vue.use(Vuetify);

export default new Vuetify({
    theme: {
        themes: {
          light: {
            primary: "#04153B",
            secondary: "#A09F9F",
            special: "#F15A29",
            accent: "#FD801F",
            error: "#FE001A",
          },
        },
      },
});
