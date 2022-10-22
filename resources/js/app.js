import './bootstrap';

import {createApp} from "vue/dist/vue.esm-bundler.js"
import AutoComplete from "./components/AutoComplete.vue";
const app = createApp({})
app.component('auto-complete', AutoComplete);
app.mount("#app");