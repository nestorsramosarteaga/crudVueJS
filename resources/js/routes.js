import AllPosts from './components/post/AllPosts.vue';
import AddPost from './components/post/AddPost.vue';
import EditPost from './components/post/EditPost.vue';
import AllConfigs from './components/config/AllConfigs.vue';
import AddConfig from './components/config/AddConfig.vue';
import EditConfig from './components/config/EditConfig.vue';

export const routes = [
    {
        name: 'posts',
        path: '/post',
        component: AllPosts
    },
    {
        name: 'add.post',
        path: '/post/add',
        component: AddPost
    },
    {
        name: 'edit.post',
        path: '/post/edit/:id',
        component: EditPost
    },
    {
        name: 'configs',
        path: '/configs',
        component: AllConfigs
     },
    {
        name: 'add.config',
        path: '/config/add',
        component: AddConfig
    },
    {
        name: 'edit.config',
        path: '/config/edit/:id',
        component: EditConfig
    },
];