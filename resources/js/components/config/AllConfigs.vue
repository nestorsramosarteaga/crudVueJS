<template>
    <div>

        <h3 class="text-center">Gestión de Configuraciones</h3><br/>
        <div class="pb-2">
            <router-link to="/config/add" class="btn btn-success">Agregar Configuración</router-link>
        </div> 
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Clave</th>
                <th class="text-center">Valor</th>
                <th class="text-center">Update At</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="config in configs" :key="config.id">
                <td>{{ config.id }}</td>
                <td>{{ config.key }}</td>
                <td>{{ config.value }}</td>
                <td>{{ config.updated_at }}</td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit.config', params: { id: config.id }}" class="btn btn-primary">Editar
                        </router-link>
                        <button class="btn btn-danger" :data-id="config.id"
                            v-confirm="{
                                loader: true,
                                ok: deleteConfig,
                                cancel: doNothing,
                                message: '¿Desea eliminar el registro?'
                            }"
                        >Eliminar</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                configs: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/configs')
                .then(response => {
                    this.configs = response.data;
                });
        },
        methods: {
            deleteConfig: function(dialog) {
                let button = dialog.node // node is only available if triggered via a directive
                let id = parseInt(button.dataset.id)
                let i = this.configs.map(item => item.id).indexOf(id);                
                
                // Delete post
                this.axios
                    .delete(`http://localhost:8000/api/config/delete/${id}`)
                    .then(response => {
                        let i = this.configs.map(item => item.id).indexOf(id); // find index of your object
                        this.configs.splice(i, 1)
                    });

                dialog.close()
                
            },
            doNothing: function() {
                // Do nothing or some other stuffs
                console.log('no hacer nada')
            }
        }
    }
</script>