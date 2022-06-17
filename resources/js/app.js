import './bootstrap';
import { createApp } from 'vue'
import HelloWorld from './components/Welcome'
import router from './router'
import * as Vue from 'vue' // in Vue 3
import axios from 'axios'
import VueAxios from 'vue-axios'

createApp(HelloWorld).use(
    router,VueAxios, axios).mount('#app')
