<template>
      <div class="card">
                    <div class="card-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <input v-if="editMode" type="text" name="" id="" v-model="tutor.nombre" required>
                                <input v-if="editMode" type="text" name="" id="" v-model="tutor.email" required>
                                <p v-else>{{tutor.nombre}}  <br> Email: {{tutor.email}}</p>
                                <button type="submit" class="btn btn-danger" v-on:click="deleteTutor()">Eliminar</button>
                                <button v-if="editMode" type="submit" class="btn btn-warning" v-on:click="updateT()">Guardar cambios</button>
                                <button v-else type="submit"  class="btn btn-warning" v-on:click="editTutor()">Editar</button>
                            </div>
                    </div>
                        </div>
                    </div>
</template>

<script>
    export default {
        props:['tutor'],
        data(){
            return{
                editMode: false
            }
        },
        mounted() {
        },
        methods:{
            deleteTutor(){
                const params={
                    id: this.tutor.index,
                }
                axios.delete(`destroy/${this.tutor.id}`).then((response=>{
                            this.$emit('delete');
                        })).catch(error => {
                    console.log(error.response)
                    });
                
            },
            editTutor(){
                this.editMode=true;
            },
            updateT(){
                const params={
                    nombre: this.tutor.nombre,
                    email: this.tutor.email
                }
                axios.put(`update/${this.tutor.id}`, params).then((response=>{
                this.editMode=false;
                const tutor = response.data;
                this.$emit('update', tutor);
                })).catch(error => {
            console.log(error.response)
            });
                
            }
        }
    }
</script>
