<template>
    <v-container>
        <v-card elevation="0" max-width="1200" class="mx-auto">
            <ReservationDataTableVue />
        </v-card>
    </v-container>
</template>
  
<script>
import ReservationDataTableVue from '../components/reservation/ReservationDataTable.vue'

export default {
    name: 'client',

    components: {
        ReservationDataTableVue
    },
}
</script>