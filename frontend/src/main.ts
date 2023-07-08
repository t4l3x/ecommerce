import { createApp } from "vue";
import { createApolloProvider } from "@vue/apollo-option";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import apolloClient from "./apollo";
import "./registerServiceWorker";
import "./assets/styles.css";
const apolloProvider = createApolloProvider({
    defaultClient: apolloClient,
});

createApp(App).use(store).use(router).use(apolloProvider).mount("#app");
