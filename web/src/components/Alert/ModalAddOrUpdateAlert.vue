<template>
  <v-dialog v-model="dialog" max-width="500px">
    <v-card>
      <v-card-title class="white--text" style="background-color: #F15A29">
        <span class="text-h5">{{ formTitle }}</span>
      </v-card-title>

      <v-card-text>
        <v-container>
          <v-form ref="formAlert" v-model="valid" lazy-validation>
            <v-row align="center" justify="center">
              <v-col cols="12" sm="7" md="7">
                <v-text-field :rules="iconRules" v-model="getAlertEditedItem.icon" label="Icone MDI"
                  required></v-text-field>
              </v-col>
              <v-col cols="12" sm="4" md="4">
                <v-icon large :color="getAlertEditedItem.color"> {{ getAlertEditedItem.icon }}</v-icon>
              </v-col>
              <v-col cols="12" sm="12" md="12">
                <v-text-field :rules="messageRules" v-model="getAlertEditedItem.Message" label="Message"
                  required></v-text-field>
              </v-col>
              <v-col cols="12" sm="12" md="12">
                <v-color-picker :rules="colorRules" class="mx-auto" v-model="getAlertEditedItem.color" dot-size="25"
                  mode="hexa" swatches-max-height="200" required></v-color-picker>
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
        <v-btn color="success darken-1" @click="saveAlert" :disabled="!valid">
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
      iconRules: [
        v => !!v || 'Ce champ est requis',
        v => typeof v === 'string' || 'Le contenu doit être une chaîne de caractères',
        v => v.startsWith('mdi-') || 'Le texte doit commencer par "mdi-"'
      ],
      colorRules: [
        v => !!v || 'Ce champ est requis',
        v => typeof v === 'string' || 'Le contenu doit être une chaîne de caractères',
        v => /^#[0-9A-F]{6}$/i.test(v) || 'Doit être une couleur hexadécimale'
      ],
      messageRules: [
        v => !!v || 'Ce champ est requis',
        v => typeof v === 'string' || 'Le contenu doit être une chaîne de caractères',
        v => v.length <= 250 || 'Le texte est trop long'
      ]
    }
  },

  created() {
    this.defineSET_ModalAddOrUpdateAlert(this);
  },

  computed: {
    ...mapGetters(['getAlertDialog', 'getAlertEditedIndex', 'getAlertEditedItem']),
    formTitle() {
      return this.getAlertEditedIndex === -1 ? "Création d'une alerte" : "Modifier une alerte"
    },

    dialog: {
      get() {
        return this.getAlertDialog;
      },
      set(value) {
        this.close();
      }
    }
  },

  methods: {
    ...mapActions(['closeDialogAlert', 'saveAlert', 'defineSET_ModalAddOrUpdateAlert']),
    close() {
      this.closeDialogAlert()
      this.$refs.formAlert.resetValidation()
    }
  }
}
</script>