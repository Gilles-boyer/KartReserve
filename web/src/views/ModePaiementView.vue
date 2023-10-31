<template>
    <v-container>
        <v-card elevation="0" max-width="1200" class="mx-auto">
            <v-card-title primary-title class="justify-center primary--text mb-3">
                Gestion des modes de paiement
            </v-card-title>
            <ModePaiementDataTableVue />
        </v-card>
    </v-container>
</template>
  
<script>
import ModePaiementDataTableVue from '../components/ModePaiement/ModePaiementDataTable.vue'

export default {
    name: 'modePaiement',

    components: {
        ModePaiementDataTableVue
    },
}
</script>