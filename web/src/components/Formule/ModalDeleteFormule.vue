<template>
    <v-dialog v-model="dialog" max-width="500px">
        <v-card align="center" justify="center">
          <v-card-title class="text-h6 white--text py-1" style="background-color: #F15A29">Supprimer une Formule</v-card-title>
          <v-card-text class="primary--text mt-2">{{ getFormuleMessageDelete }}</v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="secondary" class="primary--text" @click="formuleCloseDelete">Annuler</v-btn>
            <v-btn color="special" class="white--text"  @click="formuleDeleteItemConfirm">OK</v-btn>
            <v-spacer></v-spacer>
          </v-card-actions>
        </v-card>
      </v-dialog>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  computed: {
    ...mapGetters(['getFormuleDialogDelete', 'getFormuleMessageDelete']),
    dialog : {
      get() {
        return this.getFormuleDialogDelete;
      },
      set(value) {
        this.formuleCloseDelete();
      }
    }
  },
  methods: {
    ...mapActions(['formuleCloseDelete', 'formuleDeleteItemConfirm'])
  }
}
</script>