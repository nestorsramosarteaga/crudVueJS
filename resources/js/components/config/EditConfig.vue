<template>
    <div>
        <h3 class="text-center">Editar Configuración</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateConfig">
                    <div class="form-group">
                        <label>Clave</label>
                        <input type="text" class="form-control" v-model="config.key">
                    </div>
                    <div class="form-group">
                        <label>Valor</label>
                        <input type="text" class="form-control" v-model="config.value">
                    </div>
                    <button type="submit" class="btn btn-success">Actualizar Configuración</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                config: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/config/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.config = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateConfig() {
                this.axios
                    .post(`http://localhost:8000/api/config/update/${this.$route.params.id}`, this.config)
                    .then((response) => {
                        this.$router.push({name: 'configs'});
                    });
            }
        }
    }
</script>