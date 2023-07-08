<template>
    <div id="cart">
        <h2 class="label">
            🛒 Cart
            <span class="tag is-black is-circle">{{ cartItems.length }}</span>
        </h2>
        <table v-if="cartItems.length > 0" class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Item</th>
                    <th>Qt.</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in cartItems" :key="item.id">
                    <td>
                        <button
                            class="button is-small"
                            title="Remove"
                            @click="removeFromCart(item)"
                        >
                            🗑️
                        </button>
                    </td>
                    <td>{{ item.name }}</td>
                    <td>x {{ item.quantity }}</td>
                    <td>{{ item.price * item.quantity }}</td>
                </tr>
            </tbody>
        </table>
        <div v-else>There are no items in your cart.</div>
        <button class="button is-black">Checkout</button>
        <div>and never pay!</div>
    </div>
</template>

<script lang="ts">
import { Options, Vue } from "vue-class-component";
import { mapGetters, mapActions } from "vuex";

@Options({
    computed: {
        ...mapGetters(["cartItems"]),
    },
    methods: {
        ...mapActions(["removeFromCart"]),
    },
})
export default class CartView extends Vue {}
</script>

<style scoped>
/* Add your styles here */
</style>
