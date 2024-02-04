import 'vue3-toastify/dist/index.css';
import { toast } from 'vue3-toastify';

export const customToastr = {
    toastrMessage(message = "Dummy Message", type = "success", time = 3000, theme = "colored", transition = "zoom") {
        toast(message, {
            autoClose: time,
            "theme": theme, // light dark auto colored
            "type": type,
            "transition": transition, // bounce flip slide zoom
        });
    },
};
