import api from "./api";

export default {
    index() {
        return api.get(`alertes`);
    },
    store(data) {
        return api.post(`alert`, data);
    },
    update(data) {
        return api.put(`alert/${data.id}`, data);
    },
    destroy(data) {
        return api.delete(`alert/${data.id}`);
    }
}
