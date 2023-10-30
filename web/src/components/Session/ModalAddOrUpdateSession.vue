<template>
  <v-dialog v-model="dialog" max-width="500px">
    <v-card>
      <v-card-title class="white--text" style="background-color: #F15A29">
        <span class="text-h5">{{ formTitle }}</span>
      </v-card-title>

      <v-card-text>
        <v-container>
          <v-form ref="formSession" v-model="valid" lazy-validation>
            <v-row align="center" justify="center">
              <v-col cols="12" sm="7" md="7">
                  <v-menu
                  ref="menu"
                  v-model="menu2"
                  :close-on-content-click="false"
                  :nudge-right="40"
                  :return-value.sync="getSessionEditedItem.heure_debut"
                  transition="scale-transition"
                  offset-y
                  max-width="290px"
                  min-width="290px"
                >
                  <template v-slot:activator="{ on, attrs }">
                    <v-text-field
                      :rules="timeRules"
                      v-model="getSessionEditedItem.heure_debut"
                      label="Picker in menu"
                      prepend-icon="mdi-clock-time-four-outline"
                      readonly
                      v-bind="attrs"
                      v-on="on"
                    ></v-text-field>
                  </template>
                  <v-time-picker
                    v-if="menu2"
                    v-model="getSessionEditedItem.heure_debut"
                    format="24hr"
                    @click:minute="$refs.menu.save(getSessionEditedItem.heure_debut)"
                  ></v-time-picker>
                </v-menu>
              </v-col>
            </v-row>
          </v-form>
        </v-container>
      </v-card-text>

      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="secondary darken-1" @click="close">
          Annuler
        </v-btn>
        <v-btn color="success darken-1" @click="saveSession" :disabled="!valid">
          Enregistrer
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>

import { mapGetters, mapActions } from 'vuex';

export default {
  data() {
    return {
      valid: true,
      menu2: false,
      timeRules: [
        v => !!v || 'Ce champ est requis',
        v => typeof v === 'string' || 'Le contenu doit être une chaîne de caractères',
        v => /^([01]\d|2[0-3]):([0-5]\d)$/.test(v) || 'Doit être une heure valide au format 00:00'
      ],
    }
  },

  created() {
    this.defineSET_ModalAddOrUpdateSession(this);
  },

  computed: {
    ...mapGetters(['getSessionDialog', 'getSessionEditedIndex', 'getSessionEditedItem']),
    formTitle() {
      return this.getSessionEditedIndex === -1 ? "Création d'une session" : "Modifier une session"
    },

    dialog: {
      get() {
        return this.getSessionDialog;
      },
      set(value) {
        this.close();
      }
    }
  },

  methods: {
    ...mapActions(['closeDialogSession', 'saveSession', 'defineSET_ModalAddOrUpdateSession']),
    close() {
      this.closeDialogSession()
      this.$refs.formSession.resetValidation()
    }
  }
}
</script>