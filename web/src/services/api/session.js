import api from "./api";

export default {
  index() {
    return api.get(`sessions`);
  },
  store(data) {
    return api.post(`session`, data);
  },
  update(data) {
    return api.put(`session/${data.id}`, data);
  },
  destroy(data) {
    return api.delete(`session/${data.id}`);
  },
  changeSessionStatut(id, data) {
    return api.put(`session-reservation-formule/${id}`, data);
  },
};
