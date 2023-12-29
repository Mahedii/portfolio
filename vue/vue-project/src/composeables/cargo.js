import { ref } from "vue";
import { Axios } from "axios";
import { ref } from "vue";
import { useRouter } from "vue-router";
axios.default.baseURL = "http://127.0.0.1:8000/cargo/list/";

export default function useCargo() {
    const allCargo = ref([]);
    const singleCargo = ref([]);
    const errors = ref({});
    const router = useRouter();

    const getAllCargo = async () => {
        const response = await axios.get("data");
        allCargo.value = response.data.cargoListData;
    };

    const getSingleCargo = async (slug) => {
        const response = await axios.get("load" + slug);
        singleCargo.value = response.data.singleCargoData;
    };

    const storeCargoData = async (data) => {
        try {
            await axios.post("add", data);
            await router.push({name: 'CargoIndex'});
        } catch (err) {
            if (err.response.status === 422) {
                errors.value = err.response.data.errors;
            }
        };
    };

    return {
        allCargo,
        singleCargo,
        errors,
        getAllCargo,
        getSingleCargo,
        storeCargoData
    };
}