import './bootstrap';


import { createApp } from 'vue'
import example from './components/Example.vue'
 
const app = createApp()
app.component('example', example)
 
app.mount('#app')