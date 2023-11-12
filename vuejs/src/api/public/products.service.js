import httpUser from "@/api/http.user";

/**
 * Created by on 11/11/2023.
 */
const productsService = {
    get() {
        return httpUser.get('products')
    },
    getSearch() {
        return httpUser.get(`products`)
    },
};

export default productsService;
