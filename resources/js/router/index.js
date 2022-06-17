import { createWebHistory, createRouter } from "vue-router";
import Home from '../pages/Home.vue'
import About from '../pages/About.vue'
import TailWindCSS from '../pages/TailWindCSS.vue'
import Category from '../pages/Category'


const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/about",
    name: "About",
    component: About,
  },
  {
    path: "/tailwind-css",
    name: "Tailwind",
    component: TailWindCSS,
  },
  {
    path: "/category",
    name: "Category",
    component: Category,
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
