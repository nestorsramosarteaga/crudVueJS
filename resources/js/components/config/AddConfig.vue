<template>
    <div>
        <h3 class="text-center">Agregar Configuración</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addConfig">
                    <div class="form-group">
                        <label>Clave</label>
                        <input type="text" class="form-control" v-model="config.key">
                    </div>
                    <div class="form-group">
                        <label>Valor</label>
                        <input type="text" class="form-control" v-model="config.value">
                    </div>
                    <button type="submit" class="btn btn-success">Agregar Configuración</button>
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
        methods: {
            addConfig() { 
                this.axios
                    .post('http://localhost:8000/api/config/add', this.config)
                    .then(response => (
                        this.$router.push({name: 'configs'})
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>