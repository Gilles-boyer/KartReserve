<template>
    <v-overlay :value="getOverlayValue">
        <v-progress-circular indeterminate size="64"></v-progress-circular>
    </v-overlay>
</template>
<script>
import { mapGetters } from "vuex";
export default {

    computed: {
        ...mapGetters(["getOverlayValue"])
    },
}
</script>