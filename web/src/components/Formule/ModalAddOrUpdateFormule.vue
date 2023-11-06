<template>
  <v-dialog v-model="dialog" max-width="500px">
    <v-card>
      <v-card-title class="white--text" style="background-color: #F15A29">
        <span class="text-h5">{{ formTitle }}</span>
      </v-card-title>

      <v-card-text>
        <v-container>
          <v-form ref="formFormule" v-model="valid" lazy-validation>
            <v-row align="center" justify="center">
              <v-col cols="12" sm="12" md="12">
                <v-img v-if="getFormuleEditedItem.url_image" class="mx-auto" max-height="250" max-width="250"
                  :src="getFormuleEditedItem.url_image"></v-img>
                <v-text-field :rules="UrlRules" label="Image" v-model="getFormuleEditedItem.url_image"
                ></v-text-field>
              </v-col>

              <v-col cols="12" sm="12" md="12">
                <v-text-field :rules="NomRules" label="Name" v-model="getFormuleEditedItem.Nom"
                  prepend-icon="mdi-shopping"></v-text-field>
              </v-col>

              <v-col cols="12" sm="6" md="6">
                <v-text-field :rules="PriceRules" label="Prix" v-model="getFormuleEditedItem.Prix"
                  prepend-icon="mdi-cash"></v-text-field>
              </v-col>

              <v-col cols="12" sm="6" md="6">
                <v-text-field :rules="NbreSessionRules" label="Email" v-model="getFormuleEditedItem.nombre_de_session"
                  prepend-icon="mdi-counter"></v-text-field>
              </v-col>

              <v-col cols="12" sm="12" md="12">
                <v-textarea :rules="DescriptionRules" label="Commentaire" :value="getFormuleEditedItem.Description"
                  ></v-textarea>
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
        <v-btn color="success darken-1" @click="saveFormule" :disabled="!valid">
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
        v => (v || 'aaa').length >= 3 || 'Doit contenir au moins 3 caractères'
      ],
      UrlRules: [
        v => !!v || 'Ce champ est requis',
        v => typeof v === 'string' || 'Le contenu doit être une chaîne de caractères',
        v => /^.{3,254}$/.test(v) || 'Doit contenir min 3 caractères et au maximum 254 caractères',
      ],
      DescriptionRules: [
        v => !!v || 'Ce champ est requis',
        v => typeof v === 'string' || 'Le contenu doit être une chaîne de caractères',
        v => (v || 'aaa').length >= 3 || 'Doit contenir au moins 3 caractères'
      ],
      PriceRules: [
        v => !!v || 'Ce champ est requis',
        v => /^\d+(\.\d{1,2})?$/.test(v) || 'Doit être un prix valide'
      ],
      NbreSessionRules: [
        v => !!v || 'Ce champ est requis',
        v => /^\d+$/.test(v) || 'Doit être un entier valide'
      ],

    }
  },

  created() {
    this.defineSET_ModalAddOrUpdateFormule(this);
  },

  computed: {
    ...mapGetters(['getFormuleDialog', 'getFormuleEditedIndex', 'getFormuleEditedItem']),
    formTitle() {
      return this.getFormuleEditedIndex === -1 ? "Création d'une formule" : "Modifier une formule"
    },

    dialog: {
      get() {
        return this.getFormuleDialog;
      },
      set(value) {
        this.close();
      }
    }
  },

  methods: {
    ...mapActions(['closeDialogFormule', 'saveFormule', 'defineSET_ModalAddOrUpdateFormule']),
    close() {
      this.closeDialogFormule()
      this.$refs.formFormule.resetValidation()
    }
  }
}
</script>