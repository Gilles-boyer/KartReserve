import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AlertView from '../views/AlertView.vue'
import ClientView from '../views/ClientView.vue'
import SessionView from '../views/SessionView.vue'
import ModePaiementView from '../views/ModePaiementView.vue'
import FormuleView from '../views/FormuleView.vue'
import LoginView from '../views/FormuleView.vue'
import ReservationView from '../views/ReservationView.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/alert',
    name: 'alert',
    component: AlertView
  },
  {
    path: '/reservation',
    name: 'reservation',
    component: ReservationView
  },
  {
    path: '/client',
    name: 'client',
    component: ClientView
  },
  {
    path: '/formule',
    name: 'formule',
    component: FormuleView
  },
  {
    path: '/login',
    name: 'login',
    component: LoginView
  },
  {
    path: '/mode-paiement',
    name: 'modePaiement',
    component: ModePaiementView
  },
  {
    path: '/session',
    name: 'session',
    component: SessionView
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
