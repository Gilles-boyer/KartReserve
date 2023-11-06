import Vue from 'vue'
import Vuex from 'vuex'
import Menu from './menu.js'
import SnackBar from './snackbar.js'
import Overlay from './overlay.js'
import Alert from './alert.js'
import Session from './session.js'
import Client from './client.js'
import ModePaiement from './modePaiement.js'
import Formule from './formule.js'
import Reservation from './reservation.js'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    menu: Menu,
    snackbar: SnackBar,
    overlay: Overlay,
    alert: Alert,
    session: Session,
    client: Client,
    modePaiement: ModePaiement,
    formule: Formule,
    reservation: Reservation
  },
})
