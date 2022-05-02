
<template>
 <div class="card">
                    <div class="card-body">
      <div class="panel panel-default">
                        <div class="row aling-items-start">
                            <form action="" method="POST" v-on:submit.prevent="nuevoEstudiante()">
                            <div class="panel-header h2">Registrar Estudiante</div>
                            <label for="" class="form-label col">Nombre del Estudiante</label>
                            <input type="text" name="Registrar" id="" class="form-control col" v-model="nombreE" required>
                            <label for="" class="form-label col" style="margin-top: 3%;">Codigo del Estudiante</label>
                            <input type="text" name="RegistrarC" id="" class="form-control col" v-model="codigoE" required>
                            <br>
                            <label for="" class="form-label">Semestre</label><br>
                            <select name="" id="" v-model="semestre" class="form-select" aria-label="size 3 select">
                                <option value="" selected>Seleccione un Semestre...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select><br>
                            <label for="" class="form-label" style="margin-top: 3%;">Tutor del Estudiante</label><br>
                            <select class="form-select" aria-label="size 3 select" name="" id="" v-model="tutorE" required>
                            <option value="" selected>Seleccione un Tutor...</option>
                            <option v-for="tutor in tutores" :key="tutor.id" :value="tutor.nombre">{{ tutor.nombre }} </option>
                            </select> <br>
                            
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
                codigoE:'',
                tutores: [],
                tutor: '',
                tutorE: '',
                semestre: ''
            }
        },
        mounted() {
                axios.get('index').then(response=>{
                this.tutores = response.data;
            });
        },
    methods:{
        nuevoEstudiante(){
            const params ={
                nombre: this.nombreE,
                tutor: this.tutorE,
                codigoUDG: this.codigoE,
                semestre: this.semestre
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
