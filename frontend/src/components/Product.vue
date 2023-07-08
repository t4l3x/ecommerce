<!-- src/components/Products.vue -->
<template>
    <div class="product">
        <figure>
            <img :src="product.image" :alt="product.name" width="150" />
        </figure>
        <div>
            <b>{{ product.name }}</b>
        </div>
        <div class="info">
            <span class="tag is-black">€{{ product.price }}</span>
            <span class="tag is-black">{{ product.quantity }} Left</span>
        </div>
        <button @click="addToCart" class="button">Add to cart</button>
    </div>
</template>

<script lang="ts">
import { Options, Vue } from "vue-class-component";
import Product from "@/models/Product";

@Options({
    props: {
        product: {
            type: Object as () => Product,
            required: true,
        },
    },
    methods: {
        addToCart() {
            // code to add product to cart
            this.$store.dispatch("addToCart", this.product);
        },
    },
})
export default class ProductComponent extends Vue {}
</script>
