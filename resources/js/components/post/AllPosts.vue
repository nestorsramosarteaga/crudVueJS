<template>
    <div>
        
        <h3 class="text-center">All Posts</h3><br/>
        <div class="pb-2">
            <router-link to="/post/add" class="btn btn-success">Agregr Posts</router-link>
        </div> 
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Title</th>
                <th class="text-center">Description</th>
                <th class="text-center">Created At</th>
                <th class="text-center">Updated At</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="post in posts" :key="post.id">
                <td>{{ post.id }}</td>
                <td>{{ post.title }}</td>
                <td>{{ post.description }}</td>
                <td>{{ post.created_at }}</td>
                <td class="text-center">{{ post.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit.post', params: { id: post.id }}" class="btn btn-primary">Editar
                        </router-link>
                        <button class="btn btn-danger" :data-id="post.id"
                            v-confirm="{
                                loader: true,
                                ok: deletePost,
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
                posts: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/posts')
                .then(response => {
                    this.posts = response.data;
                });
        },
        methods: {
            deletePost: function(dialog) {
                let button = dialog.node // node is only available if triggered via a directive
                let id = parseInt(button.dataset.id)
                let i = this.posts.map(item => item.id).indexOf(id);                
                
                // Delete post
                this.axios
                    .delete(`http://localhost:8000/api/post/delete/${id}`)
                    .then(response => {
                        let i = this.posts.map(item => item.id).indexOf(id); // find index of your object
                        this.posts.splice(i, 1)
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