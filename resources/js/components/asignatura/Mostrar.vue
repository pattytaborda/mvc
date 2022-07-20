<template>
    <div class="row">
        <div class="col-12 mb-2">
            <!-- llamamos al componente para Crear   -->
            <router-link :to='{name:"crearAsignatura"}' class="btn btn-success"><i class="fas fa-plus-circle"></i></router-link>
        </div>
        <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Semestre</th>
                                    <th>Nombre</th>
                                    <th>Creditos</th>
                                    <th>Docente</th>
                                    <th>Prerequisito</th>
                                    <th>Horas trabajo autonomo</th>
                                    <th>Horas trabajo dirigido</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="asignatura in asignaturas" :key="asignatura.id">
                                    <td>{{ asignatura.semestre}}</td>
                                    <td>{{ asignatura.nombre }}</td>
                                    <td>{{ asignatura.creditos }}</td>
                                    <td>{{ asignatura.docente }}</td>
                                    <td>{{ asignatura.prerrequisito }}</td>
                                    <td>{{ horas_trabajo_autonomo}}</td>
                                    <td>{{ Horas_trabajo_dirigido }}</td>
                                    <td>
                                        <!-- llamamos al componente para Editar     -->
                                        <router-link :to='{name:"editarasignatura",params:{id:asignatura.id}}' class="btn btn-info"><i class="fas fa-edit"></i></router-link>
                                        <a type="button" @click="borrarAsignatura(asignatura.id)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"asignaturas",
    data(){
        return {
            asignaturas:[]
        }
    },
    mounted(){
        this.mostrarAsignaturas()
    },
    methods:{
        async mostrarAsignaturas(){
            await this.axios.get('/api/asignatura').then(response=>{
                this.asignaturas = response.data
            }).catch(error=>{
                console.log(error)
                this.asignaturas = []
            })
        },
        borrarAsignatura(id){
            if(confirm("¿Confirma eliminar el registro?")){
                this.axios.delete(`/api/asignatura/${id}`).then(response=>{
                    this.mostrarAsignaturas()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>
