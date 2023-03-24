import { createRouter, createWebHistory} from 'vue-router';
import Home from '../pages/Home.vue';
import Search from '../pages/Search.vue';
import Live from '../pages/Live.vue';
import HowToPlay from '../pages/HowToPlay.vue';
import ContactUs from '../pages/ContactUs.vue';
import PageNotFound from '../pages/404.vue';
const routes = [
    {
        path: "/",
        name: "home",
        component: Home
    },
    {
        path: "/search",
        name: "search",
        component: Search
    },
    {
        path: "/live",
        name: "live",
        component: Live
    },
    {
        path: "/how-to-play",
        name: "how-to-play",
        component: HowToPlay
    },
    {
        path: "/contact-us",
        name: "contact-us",
        component: ContactUs
    },
    {
        path: "/:pathMatch(.*)*",
        name: "not found",
        component: PageNotFound
    },
];

const router = createRouter({
    history: createWebHistory("/"),
    routes
});

export default router;
