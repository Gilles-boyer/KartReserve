<template>
  <v-dialog v-model="dialog" max-width="500px">
    <v-card>
      <v-card-title class="white--text" style="background-color: #F15A29">
        <span class="text-h5">{{ formTitle }}</span>
      </v-card-title>

      <v-card-text>
        <v-container>
          <v-form ref="formModePaiement" v-model="valid" lazy-validation>
            <v-row align="center" justify="center">
              <v-col cols="12" sm="12" md="12">
                <v-text-field :rules="NomRules" label="Name" v-model="getModePaiementEditedItem.Nom"
                  prepend-icon="mdi-cash"></v-text-field>
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
        <v-btn color="success darken-1" @click="saveModePaiement" :disabled="!valid">
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
        v => (v || 'aa' ).length >= 2 || 'Doit contenir au moins 3 caractères'
      ],

    }
  },

  created() {
    this.defineSET_ModalAddOrUpdateModePaiement(this);
  },

  computed: {
    ...mapGetters(['getModePaiementDialog', 'getModePaiementEditedIndex', 'getModePaiementEditedItem']),
    formTitle() {
      return this.getModePaiementEditedIndex === -1 ? "Création d'une mode de Paiement" : "Modifier une mode de Paiement"
    },

    dialog: {
      get() {
        return this.getModePaiementDialog;
      },
      set(value) {
        this.close();
      }
    }
  },

  methods: {
    ...mapActions(['closeDialogModePaiement', 'saveModePaiement', 'defineSET_ModalAddOrUpdateModePaiement']),
    close() {
      this.closeDialogModePaiement()
      this.$refs.formModePaiement.resetValidation()
    }
  }
}
</script>