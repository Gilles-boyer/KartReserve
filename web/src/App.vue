<template>
  <v-app>
    <v-app-bar app color="primary" dark>
      <v-app-bar-nav-icon @click="drawer = true"></v-app-bar-nav-icon>

      <v-toolbar-title class="shrink mt-1 hidden-sm-and-down">KartReserve</v-toolbar-title>

      <v-spacer></v-spacer>

      <div class="d-flex align-center">
        <v-img alt="kartreserve Logo" class="shrink mr-2" contain src="./assets/logo_blanc.png"
          transition="scale-transition" width="50" />
      </div>
    </v-app-bar>

    <v-navigation-drawer v-model="drawer" absolute temporary>
      <v-list nav dense>
        <v-list-item-group v-model="group" active-class="deep-orange--text text--accent-4">
          <v-list-item v-for="(menu, index) in getMenu" :key="index" link :to="menu.link" >
            <v-list-item-icon>
              <v-icon color="special">{{ menu.icon }}</v-icon>
            </v-list-item-icon>
            <v-list-item-title>{{ menu.title }}</v-list-item-title>
          </v-list-item>
        </v-list-item-group>
      </v-list>

      <template v-slot:append>
        <div class="pa-2">
          <v-btn block color="special" class="white--text">
            Logout
          </v-btn>
        </div>
      </template>
    </v-navigation-drawer>

    <v-main>
      <router-view />
    </v-main>

    <v-footer flat tile app class="pa-0">
      <v-col
        class="text-center pa-0 special--text"
        cols="12"
      >
        {{ new Date().getFullYear() }} — <strong>CFG</strong>
      </v-col>
    </v-footer>

    <SnackBar></SnackBar>

    <Overlay></Overlay>

  </v-app>
</template>

<script>
import { mapGetters } from "vuex"; 
import SnackBar from './components/SnackBar.vue';
import Overlay from './components/Overlay.vue';

export default {
  name: 'App',

  components: {
    SnackBar,
    Overlay
  },

  data: () => ({
    drawer: false,
    group: null,
  }),

  computed: {
        ...mapGetters(["getMenu"])
    },
};
</script>
