import Vue from 'vue'
import VueRouter from 'vue-router'
 
// 2.
import Example from './pages/Example.vue'
import Example2 from './pages/Example2.vue'
 
// 3.
Vue.use(VueRouter)
 
// 4.
const routes = [
  {
    path: '/',
    component: Example
  },
  {
    path: '/example2',
    component: Example2
  }
]
 
// 5.
const router = new VueRouter({
    mode: 'history',
    routes
})
 
// 6.
export default router