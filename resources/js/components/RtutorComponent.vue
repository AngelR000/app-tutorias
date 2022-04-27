
<template>
 <div class="card">
                    <div class="card-body">
      <div class="panel panel-default">
                        <div class="row aling-items-start">
                            <form action="" method="POST" v-on:submit.prevent="nuevoTutor()">
                            <div class="panel-header h2">Registrar Tutor</div>
                            <label for="" class="form-label col">Nombre del tutor</label>
                            <input type="text" name="Registrar" id="" class="form-control col" v-model="nombreT" required>
                            <label for="" class="form-label col">Email del tutor</label>
                            <input type="text" name="RegistrarE" id="" class="form-control col" v-model="emailT" required>
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
                nombreT:'',
                emailT: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
    methods:{
        nuevoTutor(){
            const params ={
                nombre: this.nombreT,
                email: this.emailT
            };
            
            axios.post('store', params).then((response=>{
                const tutor =response.data;
                 this.$emit('new', tutor);
            })).catch(error => {
            console.log(error.response)
            });

            
           
         }
        }
    }
</script>
