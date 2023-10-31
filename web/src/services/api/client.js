import api from "./api";

export default {
  index() {
    return api.get(`clients`);
  },
  store(data) {
    return api.post(`client`, data);
  },
  update(data) {
    return api.put(`client/${data.id}`, data);
  },
  destroy(data) {
    return api.delete(`client/${data.id}`);
  },
};