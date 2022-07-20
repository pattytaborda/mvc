const Home = ()=> import('./components/Home.vue')
const Contacto = ()=> import('./components/Contacto.vue')

//componentes para la asignatura
const Mostrar = ()=> import('./components/asignatura/Mostrar.vue')
const Crear = ()=> import('./components/asignatura/Crear.vue')
const Editar = ()=> import('./components/asignatura/Editar.vue')

export const routes =[
    {
        name:'home',
        path:'/',
        component:Home

},
{
        name:'contacto',
        path:'/contacto',
        component:Contacto

},
{
        name:'mostrarAsignaturas',
        path:'/asignaturas',
        component:Home

},
{
        name:'crearAsignaturas',
        path:'/crear',
        component:Home

},
{
        name:'editarAsignaturas',
        path:'/editar/:id',
        component:Home

},


];

