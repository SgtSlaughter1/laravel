import { createRouter, createWebHistory } from 'vue-router'
import EditTrainee from '@/views/EditTrainee.vue'
import CreateTrainee from '@/views/CreateTrainee.vue'
import ViewTrainee from '@/views/ViewTrainee.vue'
import HomeTrainee from '@/views/HomeTrainee.vue'
import AllTrainee from '@/views/AllTrainee.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeTrainee,
    },

    {
      path: '/alltrainee',
      name: 'alltrainee',
      component: AllTrainee,
    },

    {
      path: '/trainees/:id/edit',
      name: 'edit',
      component: EditTrainee,
    },  
    
    {
      path: '/create',
      name: 'create',
      component: CreateTrainee,
    },   
    
    {
      path: '/trainees/:id',
      name: 'view',
      component: ViewTrainee,
    },

  ],
})

export default router
