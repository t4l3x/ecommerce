import {
    ApolloClient,
    createHttpLink,
    InMemoryCache,
    from,
} from "@apollo/client/core";
import { setContext } from "@apollo/client/link/context";

// HTTP connection to the API
const httpLink = createHttpLink({
    // You should use an absolute URL here
    uri: "http://localhost/graphql",
});

// Auth middleware that adds the Authorization header to each request
const authMiddleware = setContext((_, { headers }) => {
    // get the authentication token from local storage if it exists
    const token = localStorage.getItem("authToken");
    // return the headers to the context so httpLink can read them
    return {
        headers: {
            ...headers,
            authorization: token ? `Bearer ${token}` : "",
        },
    };
});

// Add the middleware to the http link
const link = from([authMiddleware, httpLink]);

// Cache implementation
const cache = new InMemoryCache();

// Create the apollo client
const apolloClient = new ApolloClient({
    link: link,
    cache,
});

export default apolloClient;
