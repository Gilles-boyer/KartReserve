<template>
    <v-container>
        <v-card elevation="0" max-width="1200" class="mx-auto">
            <v-card-title primary-title class="justify-center primary--text mb-3">
                Gestion des clients
            </v-card-title>
            <ClientDataTableVue />
        </v-card>
    </v-container>
</template>
  
<script>
import ClientDataTableVue from '../components/Client/ClientDataTable.vue'

export default {
    name: 'client',

    components: {
        ClientDataTableVue
    },
}
</script>