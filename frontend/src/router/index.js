import Vue from 'vue'
import Router from 'vue-router'
import testLog from '../middleware/testLog'
import axios from 'axios'
const lazyLoad = (view) => () => import(`@/vistas/${view}.vue`)

const renderView = (path, componente, nombre, titulo, props = false, auth = false) => {
  return {
    path: `${path}`,
    component: lazyLoad(`${componente}`),
    name: nombre,
    props: props,
    meta: {
      requiresAuth: auth,
      title: titulo,
      middleware: [testLog]
    }
  }
}
Vue.use(Router)

const refresh=()=>{
  axios.get('actualizar')
  .then(res=>{
    localStorage.setItem('token',JSON.stringify(res.data.access_token));
  })
};
const router = new Router({
  linkActiveClass: 'active',
  scrollBehavior: () => ({
    y: 0
  }),
  mode: 'history',
  routes: [
    renderView('/', 'Inicio/Inicio', 'inicio', 'Inicio'),
    renderView('/contacto', 'Contacto/Contacto', 'contacto', 'Contacto'),
    renderView('/login', 'Login/Login', 'login', 'Iniciar sesión'),
    // renderView('/logout', 'Logout/logout', 'logout', 'Cerrar sesión'),
    renderView('/register', 'Registrarse/Registrarse', 'registrarse', 'Registrarse'),
    renderView('/blog', 'Blog/Blog', 'blog', 'Blog'),
    renderView('/perfil', 'Perfil/Perfil', 'perfil', 'Perfil',true),
  ]
})
router.beforeEach((to, from, next) => {
  refresh();
  if (!to.meta.requiresAuth) {
    return next()
  }
  const middleware = to.meta.middleware
  const context = {
    to,
    from,
    next
  }
  return middleware[0]({
    ...context
  })
})



export default router;