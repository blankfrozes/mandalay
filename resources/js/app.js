import { createApp } from 'vue'
import App from './App.vue'
import router from './router/index'
import VueTransitions from '@morev/vue-transitions'
import '@morev/vue-transitions/styles'
import vClickOutside from 'click-outside-vue3'

createApp(App).use(router).use(VueTransitions).use(vClickOutside).mount('#app')
