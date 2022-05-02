<template>
<div>
    <center>
        <div>
          <form action="" method="get" v-on:submit.prevent="cargarTutor">
          <label for="" class="form-label">Seleccione tutor para generar tabla de tutorados</label>
            <select class="form-select" aria-label="size 3 select" name="" id="" v-model="tutorS" required>
            <option value="" selected>Seleccione un Tutor...</option>
            <option v-for="tutor in tutores" :key="tutor.id" :value="tutor.nombre">{{ tutor.nombre }} </option>
            </select> 
            <button type="submit" class="btn btn-primary">Generar Tabla</button>
          </form>
        </div>
        <table class="table">
            
  <thead>
    <tr>
      <th scope="col">Codigo</th>
      <th scope="col">Nombre</th>
      <th scope="col">Semestre</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="estudiante in estudiantes" :key="estudiante.index">
      <td>{{estudiante.codigoUDG}}</td>
      <td>{{estudiante.nombre}}</td>
      <td>{{estudiante.semestre}}</td>
    </tr>
  </tbody>
</table>
</center>
        </div>
</template>

<script>
export default {
    data(){
        return{
            estudiantes: [],
            tutores: [],
            tutorS: '',
            tutor: ''
        }
    },
    mounted(){
        axios.get('index').then(response=>{
            this.tutores = response.data;
        }).catch(error=>{
            console.log(error.response)
        });
        
    },
    methods:{

      cargarTutor: function (event){
            const params = {
                tutor: this.tutorS
            }
        
            axios.get(`estudiantes/show/${this.tutorS}`).then(response=>{
                this.estudiantes = response.data;

                console.log(this.estudiante.data);
            }).catch(error=>{
                console.log(error.response)
            });
      }

    }
}
</script>
