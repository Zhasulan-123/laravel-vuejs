import httpUser from "@/api/http.user";

/**
 * Created by on 10/11/2023.
 */
const orderService = {
    get(id) {
        return httpUser.get(`order/${id}`);
    },
    create(data) {
        return httpUser.post('order', data);
    },
    delete(userId) {
        return httpUser.delete(`order/delete/${userId}`);
    },
};

export default orderService;
