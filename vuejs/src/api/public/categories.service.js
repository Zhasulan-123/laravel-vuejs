import httpUser from '@/api/http.user';

/**
 * Created by on 11/11/2023.
 */
const categoriesService = {
    get() {
        return httpUser.get('categories');
    },
};

export default categoriesService;
