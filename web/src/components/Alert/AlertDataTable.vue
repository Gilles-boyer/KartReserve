<template>
  <v-data-table :headers="headers" :items="getAlertes" :search="search" class="elevation-0 orange-header white-text-span">
    <template v-slot:top>
      <v-toolbar flat class="mb-6">
        <v-row justify="space-around" class="mb-1">
          <v-col cols="11" sm="6" md="4" xl="4">
            <v-text-field color="special" v-model="search" append-icon="mdi-magnify" label="Search" single-line
              hide-details></v-text-field>
          </v-col>
          <v-divider class="mx-4" inset vertical></v-divider>

          <v-col cols="11" sm="5" md="7" xl="7" class="d-flex justify-end align-center">
            <v-btn color="success" @click="openDialogAlert">
              <v-icon class="mr-2" small>mdi-plus</v-icon>
              Ajouter une alerte
            </v-btn>
          </v-col>
        </v-row>

        <!-- Modal Alert -->
        <ModalDeleteAlert />
        <ModalAddOrUpdateAlert />

      </v-toolbar>
    </template>

    <template v-slot:item.icons="{ item }">
      <v-icon :color="item.color"> {{ item.icon }} </v-icon>
    </template>

    <template v-slot:item.actions="{ item }">
      <v-icon small class="mr-2" @click="updateDialogAlert(item)">
        mdi-pencil
      </v-icon>
      <v-icon color="error" small @click="alertDeleteItem(item)">
        mdi-delete
      </v-icon>
    </template>

    <template v-slot:no-data>
      <v-btn color="special" @click="initAlertes()">
        Reset
      </v-btn>
    </template>
  </v-data-table>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
import ModalDeleteAlert from './ModalDeleteAlert.vue';
import ModalAddOrUpdateAlert from './ModalAddOrUpdateAlert.vue';

export default {
  data: () => ({
    search: '',
    headers: [
      {
        text: 'Icone',
        align: 'start',
        sortable: false,
        value: 'icons',
      },
      { text: 'Message', value: 'Message', align: 'center', },
      { align: 'end', text: 'Actions', value: 'actions', sortable: false },
    ],
  }),

  components: {
    ModalDeleteAlert,
    ModalAddOrUpdateAlert
  },

  computed: {
    ...mapGetters(['getAlertes']),
  },

  created() {
    this.initAlertes()
  },

  methods: {
    ...mapActions(['initAlertes', 'alertDeleteItem', 'openDialogAlert', 'updateDialogAlert']),
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