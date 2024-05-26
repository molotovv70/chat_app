import { createApp } from 'vue'
import '@/assets/styles/style.css';
import router from './router/index.js'
import App from './App.vue'

// UI Library
import { createVuestic } from "vuestic-ui";
import "vuestic-ui/css";
// Icons
import "material-design-icons-iconfont/dist/material-design-icons.min.css";

createApp(App)
    .use(router)
    .use(createVuestic())
    .mount('#app')
