window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue').default;
import store from './store'

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('article-component', require('./components/ArticleComponent.vue').default)
Vue.component('views-component',require('./components/ViewsComponent').default)
Vue.component('likes-component',require('./components/LikesComponent').default)
Vue.component('view-slug',require('./components/ViewSlug').default)
Vue.component('comment-component',require('./components/CommentComponent').default)

const app = new Vue({
    store,
    el: '#app',
    created(){
        let url = window.location.pathname
        let slug = url.substring(url.lastIndexOf('/')+1)
        this.$store.commit('SET_SLUG',slug)
        this.$store.dispatch('getArticleData',slug)
        this.$store.dispatch('viewsIncrement',slug)

    }
});
