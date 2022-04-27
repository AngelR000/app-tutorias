<template>
      <div class="card">
                    <div class="card-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <label for="" v-if="editMode">Nombre: </label><br v-if="editMode">
                                <input v-if="editMode" type="text" name="" id="" v-model="estudiante.nombre" required>
                                <br v-if="editMode"><label for="" v-if="editMode">Email:</label><br v-if="editMode">
                                <input v-if="editMode" type="text" name="" id="" v-model="estudiante.email" required>
                                <br v-if="editMode"><label for="" v-if="editMode">Codigo:</label><br v-if="editMode">
                                <input v-if="editMode" type="text" name="" id="" v-model="estudiante.codigoUDG" required>
                                <p v-else>Nombre: {{estudiante.nombre}}  <br> Email: {{estudiante.email}} <br> Codigo: {{estudiante.codigoUDG}}</p><br v-if="editMode">
                                <button type="submit" class="btn btn-danger" v-on:click="deleteEstudiante()" style="margin-top: 1%;">Eliminar</button>
                                <button v-if="editMode" type="submit" class="btn btn-warning" v-on:click="updateE()" style="margin-top: 1%;">Guardar cambios</button>
                                <button v-else type="submit"  class="btn btn-warning" v-on:click="editEstudiante()" style="margin-top: 1%;">Editar</button>
                            </div>
                    </div>
                        </div>
                    </div>
</template>

<script>
    export default {
        props:['estudiante'],
        data(){
            return{
                editMode: false
            }
        },
        mounted() {
        },
        methods:{
            deleteEstudiante(){
                const params={
                    id: this.estudiante.index,
                }
                axios.delete(`estudiantes/destroy/${this.estudiante.id}`).then((response=>{
                            this.$emit('delete');
                        })).catch(error => {
                    console.log(error.response)
                    });
                
            },
            editEstudiante(){
                this.editMode=true;
            },
            updateE(){
                const params={
                    nombre: this.estudiante.nombre,
                    email: this.estudiante.email,
                    codigoUDG: this.estudiante.codigoUDG
                }
                axios.put(`estudiantes/update/${this.estudiante.id}`, params).then((response=>{
                this.editMode=false;
                const estudiante = response.data;
                this.$emit('update', estudiante);
                })).catch(error => {
            console.log(error.response)
            });
                
            }
        }
    }
</script>
