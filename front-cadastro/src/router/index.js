import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import PessoaView from '../views/PessoaView.vue'
import AddPessoaView from '../views/AddPessoaView.vue'
import EnderecoView from '../views/EnderecoView.vue'
import HistoricoView from '../views/HistoricoView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: () => import('../views/PessoasView.vue')
    },
    { path: '/addpessoa', name: 'addpessoa', component: AddPessoaView },
    { path: '/historico/:id', name: 'historico', component: HistoricoView },
    { path: '/pessoa/:id', name: 'pessoa', component: PessoaView },
    { path: '/endereco/:id', name: 'endereco', component: EnderecoView },
  ]
})

export default router
