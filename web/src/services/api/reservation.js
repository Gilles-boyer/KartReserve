import api from "./api";

export default {
  getSessionByDate(date) {
    return api.get(`reservation-sessions/${date}`);
  },
  changeStatutPaiement(id, data) {
    return api.put(`reservation-formule-paiement/${id}`, data);
  },
  changeTypePersonSession(id, data) {
    return api.put(`reservation-formule-type-person/${id}`, data);
  },
};
