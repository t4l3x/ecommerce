<!-- src/views/HomeView.vue -->
<template>
    <div class="home">
        <Product
            v-for="product in products"
            :key="product.id"
            :product="product"
        />
    </div>
</template>

<script lang="ts">
import { Options, Vue } from "vue-class-component";
import Product from "@/models/Product";
import ProductComponent from "@/components/Product.vue";

@Options({
    components: {
        Product: ProductComponent,
    },
    data() {
        return {
            products: [
                new Product(
                    1,
                    "Products I",
                    4.2,
                    "https://via.placeholder.com/150",
                    4
                ),
                new Product(
                    2,
                    "Products II",
                    9.6,
                    "https://via.placeholder.com/150",
                    2
                ),
                // add more products as needed
            ],
        };
    },
})
export default class HomeView extends Vue {}
</script>
