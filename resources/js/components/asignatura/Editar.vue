<template>
 	    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Editar Asignatura</h4></div>
                <div class="card-body">
                    <form @submit.prevent="actualizar">
                         <div class="row">

                              <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Semestre</label>
                                    <input type="text" class="form-control" v-model="asignatura.semestre">
                                </div></div>
                                
                                <div class="col-12 mb-2">
                                 <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" v-model="asignatura.nombre">
                                </div></div>

                                <div class="col-12 mb-2">
                                 <div class="form-group">
                                    <label>Creditos</label>
                                    <input type="text" class="form-control" v-model="asignatura.creditos">
                                </div>
                                </div>

                                <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Docente</label>
                                    <input type="text" class="form-control" v-model="asignatura.docente">
                                </div></div>

                                 <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Prerrequisito</label>
                                    <input type="text" class="form-control" v-model="asignatura.prerrequisito">
                                </div></div>

                                 <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Horas trabajo autonomo</label>
                                    <input type="text" class="form-control" v-model="asignatura.horas_trabajo_autonomo">
                                </div>
                                </div> 
                                                                                 
                                <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Horas trabajo dirigido</label>
                                    <input type="text" class="form-control" v-model="asignatura.Horas_trabajo_dirigido">
                                </div>
                                
                                </div>  


                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>


                    </form>


                </div>
            </div>
            </div>
            </div>

</template>

<script>
export default {
    name:"editar-asignatura",
    data(){
        return {
            asignatura:{
        titulo: "",
        semestre: "",
        nombre: "",
        creditos: "",
        docente: "",
        prerrequisito: "",
        horas_trabajo_autonomo: "",
        Horas_trabajo_dirigido: ""
            }
        }
    },
    mounted(){
        this.mostrarAsignatura()
    },
    methods:{
        async mostrarAsignatura(){
            await this.axios.get(`/api/asignatura/${this.$route.params.id}`).then(response=>{
                const { titulo, contenido } = response.data
                this.asignatura.titulo = titulo
                this.asignatura.contenido = contenido
            }).catch(error=>{
                console.log(error)
            })
        },
        async actualizar(){
            await this.axios.put(`/api/asignatura/${this.$route.params.id}`,this.asignatura).then(response=>{
                this.$router.push({name:"mostrarAsignaturas"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>
