<template>
    <div class="column">
        <h2 class="label">🔑Account</h2>
        <UserForm />
    </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import UserForm from "../components/UserForm.vue";

export default defineComponent({
    name: "LoginView",
    components: {
        UserForm,
    },
});
</script>
