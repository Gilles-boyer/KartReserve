import api from "./api";

export default {
  index() {
    return api.get(`mode-paiements`);
  },
  store(data) {
    return api.post(`mode-paiement`, data);
  },
  update(data) {
    return api.put(`mode-paiement/${data.id}`, data);
  },
  destroy(data) {
    return api.delete(`mode-paiement/${data.id}`);
  },
};