<template>
    <v-container>
        <v-card elevation="0" max-width="1200" class="mx-auto">
            <v-card-title primary-title class="justify-center primary--text mb-3">
                Gestion des sessions
            </v-card-title>
            <SessionDataTable />
        </v-card>
    </v-container>
</template>
  
<script>
import SessionDataTable from '../components/Session/SessionDataTable.vue'

export default {
    name: 'session',

    components: {
        SessionDataTable,
    },
}
</script>