<template>
<div style="margin-top:5%">
    <center>
        <div>
          <form action="" method="get" v-on:submit.prevent="buscarTutor">
          <label for="" class="form-label ">Ingresa tu codigo de UDG: </label>
            <input type="text" v-model="Codigoa" id="" required> 
            <button type="submit" class="btn btn-primary">Buscar Tutor</button>
          </form>
        </div>

        <div class="row align-items-start">
        <div class="col">
        </div>
        <div class="col" v-for="estudiante in estudiantes" :key="estudiante.index">
          <strong>Hola {{estudiante.nombre}}, tu tutor es:</strong>
          <table class="table" >
            
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <tr >
      <td>{{estudiante.tutor}}</td>
      <td>{{estudiante.emailTutor}}</td>
    </tr>
  </tbody>
</table>
        </div>
        <div class="col">
        </div>
      </div>
</center>
        </div>
</template>

<script>
export default {
    data(){
        return{
            estudiantes: [],
            Codigoa: '',
        }
    },
    mounted(){
    },
    methods:{
  buscarTutor: function (event){
            axios.get(`estudiantes/showw/${this.Codigoa}`).then((response=>{
                            this.estudiantes = response.data;
                            console.log(this.estudiantes);
                        })).catch(error => {
                    console.log(error.response)
                    });
      }

    }
}
</script>
