<template>
  <v-data-table :headers="headers" :items="getClients" :search="search" class="elevation-0 orange-header white-text-span">
    <template v-slot:top>
      <v-toolbar flat class="mb-6">
        <v-row justify="space-around" class="mb-1">
          <v-col cols="11" sm="6" md="4" xl="4">
            <v-text-field color="special" v-model="search" append-icon="mdi-magnify" label="Search" single-line
              hide-details></v-text-field>
          </v-col>
          <v-divider class="mx-4" inset vertical></v-divider>

          <v-col cols="11" sm="5" md="7" xl="7" class="d-flex justify-end align-center">
            <v-btn color="success" @click="openDialogClient">
              <v-icon class="mr-2" small>mdi-plus</v-icon>
              Ajouter une client
            </v-btn>
          </v-col>
        </v-row>

        <!-- Modal Client -->
        <ModalDeleteClient />
        <ModalAddOrUpdateClient />

      </v-toolbar>
    </template>

    <template v-slot:item.actions="{ item }">
      <v-icon small class="mr-2" @click="updateDialogClient(item)">
        mdi-pencil
      </v-icon>
      <v-icon color="error" small @click="clientDeleteItem(item)">
        mdi-delete
      </v-icon>
    </template>

    <template v-slot:no-data>
      <v-btn color="special" @click="initClients()">
        Reset
      </v-btn>
    </template>
  </v-data-table>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
import ModalDeleteClient from './ModalDeleteClient.vue';
import ModalAddOrUpdateClient from './ModalAddOrUpdateClient.vue';

export default {
  data: () => ({
    search: '',
    headers: [
      {
        text: 'Id',
        align: 'start',
        sortable: false,
        value: 'id',
      },
      { text: 'Nom', value: 'Nom', align: 'center' },
      { text: 'Téléphone', value: 'Tel', align: 'center' },
      { text: 'Email', value: 'Email', align: 'center' },
      { align: 'end', text: 'Actions', value: 'actions', sortable: false },
    ],
  }),

  components: {
    ModalDeleteClient,
    ModalAddOrUpdateClient
  },

  computed: {
    ...mapGetters(['getClients']),
  },

  created() {
    this.initClients()
  },

  methods: {
    ...mapActions(['initClients', 'clientDeleteItem', 'openDialogClient', 'updateDialogClient']),
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