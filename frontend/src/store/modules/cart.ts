import Product from "@/models/Product";

const state = {
    items: [] as Product[],
};

const getters = {
    cartItems: (state: any) => state.items,
};

const mutations = {
    ADD_TO_CART: (state: any, product: Product) => state.items.push(product),
    REMOVE_FROM_CART: (state: any, product: Product) => {
        const index = state.items.findIndex(
            (p: Product) => p.id === product.id
        );
        if (index > -1) {
            state.items.splice(index, 1);
        }
    },
};

const actions = {
    addToCart: ({ commit }: any, product: Product) =>
        commit("ADD_TO_CART", product),
    removeFromCart: ({ commit }: any, product: Product) =>
        commit("REMOVE_FROM_CART", product),
};

export default {
    state,
    getters,
    mutations,
    actions,
};
