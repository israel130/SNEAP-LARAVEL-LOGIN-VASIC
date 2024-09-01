import { createRouter, createWebHistory } from 'vue-router'
import { routes } from './routes'

import axios from 'axios'


const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
})

router.beforeEach(async (to, from, next) => {
  
    const response = await axios.get('/usuarioactivo');
    const isAuthenticated = response.data;

    if ( isAuthenticated == false && to.path !== '/login' ) {
        next('/login'); 
    } else {
        next();
    }

});

export default function (app) {
  app.use(router)
}

export { router }
