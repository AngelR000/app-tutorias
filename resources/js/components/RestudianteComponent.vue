
<template>
 <div class="card">
                    <div class="card-body">
      <div class="panel panel-default">
                        <div class="row aling-items-start">
                            <form action="" method="POST" v-on:submit.prevent="nuevoEstudiante()">
                            <div class="panel-header h2">Registrar Estudiante</div>
                            <label for="" class="form-label col">Nombre del Estudiante</label>
                            <input type="text" name="Registrar" id="" class="form-control col" v-model="nombreE" required>
                            <label for="" class="form-label col">Email del Estudiante</label>
                            <input type="text" name="RegistrarE" id="" class="form-control col" v-model="emailE" required>
                            <label for="" class="form-label col">Codigo del Estudiante</label>
                            <input type="text" name="RegistrarC" id="" class="form-control col" v-model="codigoE" required>
                            <button type="submit" class="btn btn-primary" style="margin-top: 3%;">Registrar</button>
                        </form>
             </div>
        </div>
    </div>
 </div>
</template>

<script>
import axios from 'axios'
    export default {
        data(){
            return{
                nombreE:'',
                emailE: '',
                codigoE:'',
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
    methods:{
        nuevoEstudiante(){
            const params ={
                nombre: this.nombreE,
                email: this.emailE,
                codigoUDG: this.codigoE,
            };
            
            axios.post('estudiantes/store', params).then((response=>{
                const estudiante =response.data;
                 this.$emit('new', estudiante);
            })).catch(error => {
            console.log(error.response)
            });

            
           
         }
        }
    }
</script>
