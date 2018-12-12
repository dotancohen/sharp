import axios from 'axios';
import { API_PATH } from "./consts";

export const api = axios.create({ baseURL:API_PATH });

export function getDashboard({ dashboardKey, filters }) {
    return api.get(`dashboard/${dashboardKey}`, {
        params: { ...filters }
    }).then(response => response.data);
}

export function getEntityList({ entityKey, page, search, sort, dir, filters }) {
    return api.get(`list/${entityKey}`, {
        params: {
            page,
            search,
            sort,
            dir,
            ...filters,
        }
    }).then(response => response.data);
}