<template>
    <nav>
        <router-link to="/">Home</router-link>
        |
        <router-link to="/login">Login</router-link>
        <router-link to="/cart">
            <button class="button is-black">
                Cart
                <span class="tag is-black is-circle">{{
                    $store.getters.cartItems.length
                }}</span>
            </button>
        </router-link>
    </nav>
    <router-view />
</template>

<style></style>
