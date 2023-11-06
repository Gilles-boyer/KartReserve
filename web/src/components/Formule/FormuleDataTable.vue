<template>
  <v-data-table :headers="headers" :items="getFormules" :search="search"
    class="elevation-0 orange-header white-text-span">
    <template v-slot:top>
      <v-toolbar flat class="mb-6">
        <v-row justify="space-around" class="mb-1">
          <v-col cols="11" sm="6" md="4" xl="4">
            <v-text-field color="special" v-model="search" append-icon="mdi-magnify" label="Search" single-line
              hide-details></v-text-field>
          </v-col>
          <v-divider class="mx-4" inset vertical></v-divider>

          <v-col cols="11" sm="5" md="7" xl="7" class="d-flex justify-end align-center">
            <v-btn color="success" @click="openDialogFormule">
              <v-icon class="mr-2" small>mdi-plus</v-icon>
              Ajouter une formule
            </v-btn>
          </v-col>
        </v-row>

        <!-- Modal Formule -->
        <ModalDeleteFormule />
        <ModalAddOrUpdateFormule />

      </v-toolbar>
    </template>

    <template v-slot:item.url_image="{ item }">
      <v-avatar size="60" class="my-1">
        <img :src="item.url_image" alt="John">
      </v-avatar>
    </template>

    <template v-slot:item.actions="{ item }">
      <v-icon small class="mr-2" @click="updateDialogFormule(item)">
        mdi-pencil
      </v-icon>
      <v-icon color="error" small @click="formuleDeleteItem(item)">
        mdi-delete
      </v-icon>
    </template>

    <template v-slot:no-data>
      <v-btn color="special" @click="initFormules()">
        Reset
      </v-btn>
    </template>
  </v-data-table>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
import ModalDeleteFormule from './ModalDeleteFormule.vue';
import ModalAddOrUpdateFormule from './ModalAddOrUpdateFormule.vue';

export default {
  data: () => ({
    search: '',
    headers: [
      {
        text: 'Image',
        align: 'start',
        sortable: false,
        value: 'url_image',
      },
      { text: 'Nom', value: 'Nom', align: 'center' },
      { text: 'Prix', value: 'Prix', align: 'center' },
      { text: 'Nbre Session', value: 'nombre_de_session', align: 'center' },
      { align: 'end', text: 'Actions', value: 'actions', sortable: false },
    ],
  }),

  components: {
    ModalDeleteFormule,
    ModalAddOrUpdateFormule
  },

  computed: {
    ...mapGetters(['getFormules']),
  },

  created() {
    this.initFormules()
  },

  methods: {
    ...mapActions(['initFormules', 'formuleDeleteItem', 'openDialogFormule', 'updateDialogFormule']),
  },
}
</script>

<style>
.orange-header th {
  background-color: #F15A29;

}

.white-text-span span {
  color: white;
}
</style>