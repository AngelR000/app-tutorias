<template>
     <div class="card">
                    <div class="card-body">
           
                <div class="col align-self-center">
                    <rtutor-component @new="addTutor"></rtutor-component>

                    <p class="h2" style="margin-top:7%;">Tutores Registrados</p>
                    <tutor-component v-for="(tutor, index) in tutores" :key="tutor.id" :tutor="tutor" @delete="deleteTutor(index)" @update="updateT(index,...arguments)"></tutor-component>
                    </div>
                </div>
            </div>
</template>

<script>
    export default {
        data(){
            return {
                tutores:[]
            }
        },
        mounted() {
            axios.get('index').then((response=>{
                this.tutores = response.data;
            })).catch(error => {
            console.log(error.response)
            });
        },
        methods:{
            addTutor(tutor){
                this.tutores.push(tutor);
            },
            deleteTutor(index){
                this.tutores.splice(index, 1);
            },
            updateT(index, tutor){
                this.tutores[index] = tutor;
            }
        }
    }
</script>
