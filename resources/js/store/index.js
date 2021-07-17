import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)
export default new Vuex.Store({
    state:{
        article:{
            comments:[],
            tags:[],
            statistic:{
                likes:0,
                views:0
            }
        },
        slug:''
    },
    mutations:{
        SET_ARTICLE(state,payload){
            state.article = payload
        },
        SET_SLUG(state,payload){
            state.slug = payload
        }
    },
    actions:{
        async getArticleData(context,payload){
            await axios.get('/api/article-json',{params:{'slug':payload}}).then((res)=>{
               context.commit('SET_ARTICLE',res.data.data)
            }).catch((err)=>{
                console.log(err)
            })

        }
    },
    getters:{
        getArticle:state=>state.article,

        getArticleLikes:state =>state.article.statistic.likes,

        getArticleViews:state=>state.article.statistic.views

    }
})
