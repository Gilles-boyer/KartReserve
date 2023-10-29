<template>
    <v-snackbar v-model="getSnackbar.snackbar" :timeout="getSnackbar.timeout" :color="getSnackbar.color" app>
        {{ getSnackbar.text }}

        <template v-slot:action="{ attrs }">
            <v-btn class="white--text" color="special" v-bind="attrs" @click="closeSnack" small>
                Close
            </v-btn>
        </template>
    </v-snackbar>
</template>
  
<script>

import { mapGetters, mapActions } from "vuex";

export default {
    name: 'SnackBar',

    computed: {
        ...mapGetters(["getSnackbar"])
    },

    methods: {
        ...mapActions(["closeSnack"]),
    },
}
</script>