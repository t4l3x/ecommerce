import { ref } from "vue";
import { useStore } from "vuex";

export function useUserForm() {
    const store = useStore();
    const email = ref("");
    const password = ref("");
    const rememberMe = ref(false);
    const isLogin = ref(true);

    const submitForm = async () => {
        if (isLogin.value) {
            await store.dispatch("loginUser", {
                email: email.value,
                password: password.value,
            });
        } else {
            // handle registration here
        }
    };

    return { email, password, rememberMe, isLogin, submitForm };
}
