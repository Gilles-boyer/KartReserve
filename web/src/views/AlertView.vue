<template>
    <v-container>
        <v-card elevation="0" max-width="1200" class="mx-auto">
            <v-card-title primary-title class="justify-center primary--text mb-3">
                Gestion des alertes
            </v-card-title>
            <AlertDataTableVue />
        </v-card>
    </v-container>
</template>
  
<script>
import AlertDataTableVue from '../components/Alert/AlertDataTable.vue'

export default {
    name: 'alert',

    components: {
        AlertDataTableVue,
    },
}
</script>
  