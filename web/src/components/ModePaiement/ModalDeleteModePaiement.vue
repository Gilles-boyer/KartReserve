<template>
    <v-dialog v-model="dialog" max-width="500px">
        <v-card align="center" justify="center">
          <v-card-title class="text-h6 white--text py-1" style="background-color: #F15A29">Supprimer une Mode de Paiement</v-card-title>
          <v-card-text class="primary--text mt-2">{{ getModePaiementMessageDelete }}</v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="secondary" class="primary--text" @click="modePaiementCloseDelete">Annuler</v-btn>
            <v-btn color="special" class="white--text"  @click="modePaiementDeleteItemConfirm">OK</v-btn>
            <v-spacer></v-spacer>
          </v-card-actions>
        </v-card>
      </v-dialog>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  computed: {
    ...mapGetters(['getModePaiementDialogDelete', 'getModePaiementMessageDelete']),
    dialog : {
      get() {
        return this.getModePaiementDialogDelete;
      },
      set(value) {
        this.modePaiementCloseDelete();
      }
    }
  },
  methods: {
    ...mapActions(['modePaiementCloseDelete', 'modePaiementDeleteItemConfirm'])
  }
}
</script>