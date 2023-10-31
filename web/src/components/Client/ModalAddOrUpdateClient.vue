<template>
  <v-dialog v-model="dialog" max-width="500px">
    <v-card>
      <v-card-title class="white--text" style="background-color: #F15A29">
        <span class="text-h5">{{ formTitle }}</span>
      </v-card-title>

      <v-card-text>
        <v-container>
          <v-form ref="formClient" v-model="valid" lazy-validation>
            <v-row align="center" justify="center">
              <v-col cols="12" sm="12" md="12">
                <v-text-field :rules="NomRules" label="Name" v-model="getClientEditedItem.Nom"
                  prepend-icon="mdi-account"></v-text-field>
              </v-col>

              <v-col cols="12" sm="12" md="12">
                <v-text-field :rules="TelRules" label="Tel" v-model="getClientEditedItem.Tel"
                  prepend-icon="mdi-phone"></v-text-field>
              </v-col>

              <v-col cols="12" sm="12" md="12">
                <v-text-field :rules="EmailRules" label="Email" v-model="getClientEditedItem.Email"
                  prepend-icon="mdi-email"></v-text-field>
              </v-col>

              <v-col cols="12" sm="12" md="12">
                <v-text-field :rules="CommentaireRules" label="Commentaire" v-model="getClientEditedItem.Commentaire"
                  prepend-icon="mdi-comment"></v-text-field>
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
        <v-btn color="success darken-1" @click="saveClient" :disabled="!valid">
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
      NomRules: [
        v => !!v || 'Ce champ est requis',
        v => typeof v === 'string' || 'Le contenu doit être une chaîne de caractères',
        v => (v || 'aaa' ).length >= 3 || 'Doit contenir au moins 3 caractères'
      ],
      TelRules: [
        v => !!v || 'Ce champ est requis',
        v => typeof v === 'string' || 'Le contenu doit être une chaîne de caractères',
        v => /^0\d{9}$/.test(v) || 'Doit être un numéro de téléphone valide commençant par 0 et contenant 10 chiffres',
      ],
      EmailRules: [
        v => !!v || 'Ce champ est requis',
        v => typeof v === 'string' || 'Le contenu doit être une chaîne de caractères',
        v => /.+@.+\..+/.test(v) || 'Doit être une adresse e-mail valide'
      ],
      CommentaireRules: [
        v => typeof v === 'string' || 'Le contenu doit être une chaîne de caractères',
      ],

    }
  },

  created() {
    this.defineSET_ModalAddOrUpdateClient(this);
  },

  computed: {
    ...mapGetters(['getClientDialog', 'getClientEditedIndex', 'getClientEditedItem']),
    formTitle() {
      return this.getClientEditedIndex === -1 ? "Création d'une client" : "Modifier une client"
    },

    dialog: {
      get() {
        return this.getClientDialog;
      },
      set(value) {
        this.close();
      }
    }
  },

  methods: {
    ...mapActions(['closeDialogClient', 'saveClient', 'defineSET_ModalAddOrUpdateClient']),
    close() {
      this.closeDialogClient()
      this.$refs.formClient.resetValidation()
    }
  }
}
</script>