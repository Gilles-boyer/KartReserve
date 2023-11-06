<template>
  <v-data-table :headers="headers" :items="getAllSession" :search="search" :expanded.sync="expanded" item-key="id"
    :single-expand="singleExpand" show-expand class="elevation-0 orange-header white-text-span buton-span">
    <template v-slot:top>
      <v-toolbar flat class="mb-6">
        <v-row justify="space-around" class="mb-1">
          <v-col cols="11" sm="6" md="4" xl="4">
            <v-text-field color="special" v-model="search" append-icon="mdi-magnify" label="Search" single-line
              hide-details></v-text-field>
          </v-col>
          <v-divider class="mx-4" inset vertical></v-divider>

          <v-col cols="11" sm="5" md="7" xl="7" class="d-flex justify-end align-center">
            <v-btn color="success">
              <v-icon class="mr-2" color="white" small>mdi-plus</v-icon>
              <div class="white--text">Ajouter une session</div>
            </v-btn>
          </v-col>
        </v-row>

      </v-toolbar>
    </template>

    <template v-slot:expanded-item="{ headers, item }">
      <td :colspan="headers.length">
        <v-data-table :headers="headersReservation" :items="item.reservations" :items-per-page="5" class="elevation-0">
          <template v-slot:item.id="{ item }">
            {{ item.reservation.id }}
          </template>

          <template v-slot:item.payed="{ item }">
            <v-switch @change="changeStatutPayement(item)" color="success" v-model="item.payed"></v-switch>
          </template>

          <template v-slot:item.Statut="{ item }">
            <v-select @change="changeStatutSession(item)" style="width: 100px" :items="statuts" v-model="item.Statut"
              dense>
              <template v-slot:selection="{ item }">
                <v-chip small :color="getColorStatut(item)" class="mx-auto">
                  {{ item }}
                </v-chip>
              </template>
            </v-select>
          </template>

          <template v-slot:item.Type_de_session="{ item }">
            <v-select @change="changeTypeSession(item)" style="width: 100px" :items="type_sessions"
              v-model="item.Type_de_session" dense>
              <template v-slot:selection="{ item }">
                <v-chip small color="special" class="mx-auto">
                  {{ item }}
                </v-chip>
              </template>
            </v-select>
          </template>

          <template v-slot:item.alertes="{ item }">
            <v-icon color="primary" :color="alert.color" v-for="alert in item.reservation.alertes" :key="alert.id"
              @click="getAlertMessage(alert.Message)">
              {{ alert.icon }}
            </v-icon>
          </template>

        </v-data-table>
      </td>
    </template>

    <template v-slot:item.nbre_persons="{ item }">
      <v-chip :color="TotalPersonne(item.reservations).color">{{ TotalPersonne(item.reservations).total }}</v-chip>
    </template>

    <template v-slot:item.nbre_enfant="{ item }">
      <v-chip :color="TotalEnfant(item.reservations).color">{{ TotalEnfant(item.reservations).total }}</v-chip>
    </template>

    <template v-slot:item.nbre_biplace="{ item }">
      <v-chip :color="TotalBiplace(item.reservations).color">{{ TotalBiplace(item.reservations).total }}</v-chip>
    </template>

    <template v-slot:item.alert="{ item }">
      <v-chip :color="CheckIfAlert(item.reservations).color">{{ CheckIfAlert(item.reservations).text }}</v-chip>
    </template>

    <template v-slot:item.confirmed="{ item }">
      <v-chip :color="TotalConfirmed(item.reservations).color">{{ TotalConfirmed(item.reservations).total }}</v-chip>
    </template>

    <template v-slot:item.option="{ item }">
      <v-chip :color="TotalOption(item.reservations).color">{{ TotalOption(item.reservations).total }}</v-chip>
    </template>

    <template v-slot:no-data>
      <v-btn color="special" @click="initAllSessionReservation('2023-11-05')">
        Reset
      </v-btn>
    </template>
  </v-data-table>
</template>
  
<script>
import { mapGetters, mapActions } from 'vuex';

export default {
  data: () => ({
    search: '',
    expanded: [],
    singleExpand: false,
    type_sessions: [
      "adult",
      "enfant",
      "biplace"
    ],
    statuts: [
      'Prévu',
      'En cours',
      'Terminé'
    ],
    headers: [
      {
        text: 'Heure',
        align: 'start',
        sortable: false,
        value: 'heure_debut',
      },
      { text: 'Nbre Pers', value: 'nbre_persons', align: 'center', },
      { text: 'Enfant', value: 'nbre_enfant', align: 'center', },
      { text: 'Biplace', value: 'nbre_biplace', align: 'center', },
      { text: 'Alerte', value: 'alert', align: 'center', },
      { text: 'Confirmé', value: 'confirmed', align: 'center', },
      { text: 'Option', value: 'option', align: 'center', },
      { text: '', value: 'data-table-expand' },
    ],
    headersReservation: [
      {
        text: 'N°resa',
        align: 'start',
        sortable: false,
        value: 'id',
      },
      { text: 'Pilote', value: 'pilote', align: 'center', },
      { text: 'Session', value: 'Type_de_session', align: 'center', },
      { text: 'Payé', value: 'payed', align: 'center', },
      { text: 'Statut', value: 'Statut', align: 'center', },
      { text: 'Formule', value: 'formule.Nom', align: 'center', },
      { text: 'Alerte', value: 'alertes', align: 'center', },
      { text: 'Actions', value: 'actions', align: 'center', }
    ]
  }),

  components: {
  },

  computed: {
    ...mapGetters(['getAllSession']),


  },

  created() {
    this.initAllSessionReservation("2023-11-05")
  },

  methods: {
    ...mapActions(['initAllSessionReservation', 'changeStatutPaiement', 'changeStatutSession', 'changeTypePerson']),

    getColorStatut(statut) {
      if (statut == "En cours") {
        return "success";
      } else if (statut == "Terminé") {
        return "black";
      } else {
        return "#4A4A4A";
      }
    },

    getAlertMessage(alerte) {
      alert(alerte)
    },

    changeTypeSession(reservation) {
      this.changeTypePerson(reservation);
      this.getAllSession.forEach((session, i) => {
        session.reservations.forEach((resa, index) => {
          if (resa.reservation_formule_id === reservation.reservation_formule_id) {
            this.getAllSession[i].reservations[index].Type_de_session = reservation.Type_de_session;
          }
        });
      });
    },

    changeStatutPayement(reservation) {
      this.changeStatutPaiement(reservation);
      this.getAllSession.forEach((session, i) => {
        session.reservations.forEach((resa, index) => {
          if (resa.reservation_formule_id === reservation.reservation_formule_id) {
            this.getAllSession[i].reservations[index].payed = reservation.payed;
          }
        });
      });
    },

    TotalPersonne(reservations) {
      var color = "#4A4A4A";
      if (reservations.length >= 10) {
        color = "error";
      } else if (reservations.length > 7) {
        color = "orange";
      } else if (reservations.length > 0) {
        color = "success";
      }
      return {
        total: reservations.length,
        color: color
      }
    },

    TotalEnfant(reservations) {
      var total = 0;
      var color = "#4A4A4A";
      if (reservations.length > 0) {
        reservations.forEach(reservation => {
          if (reservation.Type_de_session === "enfant") {
            total++;
          }
        });
      }
      if (total >= 8) {
        color = "error";
      } else if (total > 5) {
        color = "orange";
      } else if (total > 0) {
        color = "success";
      }
      return {
        total: total,
        color: color
      }
    },

    TotalBiplace(reservations) {
      var total = 0
      var color = "#4A4A4A";
      if (reservations.length > 0) {
        reservations.forEach(reservation => {
          if (reservation.Type_de_session === "biplace") {
            total++;
          }
        });
      }
      if (total >= 2) {
        color = "error";
      } else if (total > 1) {
        color = "orange";
      }
      return {
        total: total,
        color: color
      }
    },

    TotalConfirmed(reservations) {
      var total = 0
      var color = "#4A4A4A";
      if (reservations.length > 0) {
        reservations.forEach(reservation => {
          if (reservation.reservation.Statut === "Réservé") {
            total++;
          }
        });
      }
      if (total > 0) {
        color = "success";
      }
      return { total: total, color: color }
    },

    TotalOption(reservations) {
      var total = 0;
      var color = "#4A4A4A";
      if (reservations.length > 0) {
        reservations.forEach(reservation => {
          if (reservation.reservation.Statut === "Option") {
            total++;
          }
        });
      }
      if (total > 0) {
        color = "special"
      }
      return { total: total, color: color }
    },

    CheckIfAlert(reservations) {
      var alert = {
        text: "non",
        color: "#4A4A4A"
      };
      if (reservations.length > 0) {
        reservations.forEach(reservation => {
          if (reservation.reservation.alertes.length > 0) {
            alert = {
              text: "oui",
              color: "orange"
            };
          }
        })
      }
      return alert;
    },

    getAlertMessage(message) {
      alert(message);
    }
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

.buton-span button span {
  color: #F15A29;
}
</style>