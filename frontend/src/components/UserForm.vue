<template>
    <form @submit.prevent="submitForm">
        <div class="field">
            <div class="control">
                <input
                    class="input"
                    type="text"
                    placeholder="Email"
                    v-model="email"
                />
            </div>
        </div>

        <div class="field">
            <div class="control">
                <input
                    class="input"
                    type="password"
                    placeholder="Password"
                    v-model="password"
                />
            </div>
        </div>

        <label class="checkbox">
            <input type="checkbox" v-model="rememberMe" /> Remember me for 2
            weeks on this device
        </label>
        <br /><br />

        <button type="submit" class="button is-black" @click="isLogin = true">
            Login
        </button>
        <button type="submit" class="button" @click="isLogin = false">
            Register
        </button>
    </form>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import { useUserForm } from "@/composables/useUserForm";

export default defineComponent({
    name: "UserForm",
    setup() {
        return useUserForm();
    },
});
</script>
