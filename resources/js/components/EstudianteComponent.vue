<template>
      <div class="card">
                    <div class="card-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <label for="" v-if="editMode" class="form-label col">Nombre: </label><br v-if="editMode">
                                <input v-if="editMode" class="form-control col" type="text" name="" id="" v-model="estudiante.nombre" required>
                                <select  v-if="editMode" class="form-select" size="3" aria-label="size 3 select" name="" id="" v-model="estudiante.tutor" required>
                                <option selected>Seleccione un Tutor...</option>
                                <option v-for="tutor in tutores" :key="tutor.id" :value="tutor.nombre">{{ tutor.nombre }} </option>
                                </select> 
                                <br v-if="editMode"><label for="" v-if="editMode" class="form-label col">Semestre:</label><br v-if="editMode">
                                <select  v-if="editMode" class="form-select"  aria-label="size 3" name="" id="" v-model="estudiante.semestre" required>
                                <option selected>Seleccione un Semestre...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                </select> 
                                <br v-if="editMode"><label for="" v-if="editMode" class="form-label col">Codigo:</label><br v-if="editMode">
                                <input v-if="editMode" class="form-control col" type="text" name="" id="" v-model="estudiante.codigoUDG" required>
                                <p v-else>Nombre: {{estudiante.nombre}} <br> Codigo: {{estudiante.codigoUDG}} <br> Semestre: {{estudiante.semestre}} <br> Tutor Asignado: {{estudiante.tutor}} </p><br v-if="editMode">
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
                editMode: false,
                tutores: [],
                tutor: ''
            }
        },
        mounted() {
            axios.get('index').then(response=>{
                this.tutores = response.data;
            });
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
                    tutor: this.estudiante.tutor,
                    codigoUDG: this.estudiante.codigoUDG,
                    semestre: this.estudiante.semestre
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
