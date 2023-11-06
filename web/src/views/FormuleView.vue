<template>
    <v-container>
        <v-card elevation="0" max-width="1200" class="mx-auto">
            <v-card-title primary-title class="justify-center primary--text mb-3">
                Gestion des formules
            </v-card-title>
            <FormuleDataTableVue />
        </v-card>
    </v-container>
</template>
  
<script>
import FormuleDataTableVue from '../components/Formule/FormuleDataTable.vue'

export default {
    name: 'client',

    components: {
        FormuleDataTableVue
    },
}
</script>