<template>
     <div class="card">
                    <div class="card-body">
           
                <div class="col align-self-center">
                    <restudiante-component @new="addEstudiante"></restudiante-component>

                    <p class="h2" style="margin-top:7%;">Estudiantes Registrados</p>
                    <estudiante-component v-for="(estudiante, index) in estudiantes" :key="estudiante.id" :estudiante="estudiante" @delete="deleteEstudiante(index)" @update="updateE(index,...arguments)"></estudiante-component>
                    </div>
                </div>
            </div>
</template>

<script>
    export default {
        data(){
            return {
                estudiantes:[]
            }
        },
        mounted() {
            axios.get('estudiantes/index').then((response=>{
                this.estudiantes = response.data;
            })).catch(error => {
            console.log(error.response)
            });
        },
        methods:{
            addEstudiante(estudiante){
                this.estudiantes.push(estudiante);
            },
            deleteEstudiante(index){
                this.estudiantes.splice(index, 1);
            },
            updateE(index, estudiante){
                this.estudiantes[index] = estudiante;
            }
        }
    }
</script>
