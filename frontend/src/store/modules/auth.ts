// store/modules/auth.ts
import { ApolloClient, gql } from "@apollo/client/core";
import apolloClient from "@/apollo";

const LOGIN_MUTATION = gql`
    mutation Login($email: String!, $password: String!) {
        login(input: { email: $email, password: $password }) {
            user {
                name
                email
            }
            token
        }
    }
`;

// Load initial state from localStorage
const state = {
    user: JSON.parse(localStorage.getItem("user") || "{}"),
};

const getters = {
    authUser: (state: any) => state.user,
};

const mutations = {
    SET_USER_DETAILS: (state: any, user: any) => {
        state.user = user;
        localStorage.setItem("user", JSON.stringify(user));
    },
    CLEAR_USER_DETAILS: (state: any) => {
        state.user = null;
        localStorage.removeItem("user");
    },
};

const actions = {
    async loginUser(
        { commit }: any,
        { email, password }: { email: string; password: string }
    ) {
        const response = await apolloClient.mutate({
            mutation: LOGIN_MUTATION,
            variables: { email, password },
        });
        if (response.data && response.data.login) {
            commit("SET_USER_DETAILS", response.data.login.user);
        }
    },
    logoutUser({ commit }: any) {
        // Here, handle the logout process, you might need to call a logout endpoint
        // in your server to clear http-only cookies
        commit("CLEAR_USER_DETAILS");
    },
};

export default {
    state,
    getters,
    mutations,
    actions,
};
