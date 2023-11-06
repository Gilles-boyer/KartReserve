import api from "./api";

export default {
  index() {
    return api.get(`formules`);
  },
  store(data) {
    return api.post(`formule`, data);
  },
  update(data) {
    return api.put(`formule/${data.id}`, data);
  },
  destroy(data) {
    return api.delete(`formule/${data.id}`);
  },
};