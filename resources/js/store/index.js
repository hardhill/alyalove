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
        slug:'',
        likeIt:true
    },
    mutations:{
        SET_ARTICLE(state,payload){
            state.article = payload
        },
        SET_SLUG(state,payload){
            state.slug = payload
        },
        SET_LIKE(state,payload){
            state.likeIt = payload
        }
    },
    actions:{
        async getArticleData(context,payload){
            await axios.get('/api/article-json',{params:{'slug':payload}}).then((res)=>{
               context.commit('SET_ARTICLE',res.data.data)
            }).catch((err)=>{
                console.log(err)
            })

        },
        viewsIncrement(context,payload){
            setTimeout(()=>{

                axios.put('/api/article-views-increment',{slug:payload}).then((response)=>{
                    context.commit('SET_ARTICLE',response.data.data)
                }).catch((err)=>{
                    console.log('Error: ',err)
                })
            },5000)
        },
        addLike(context,payload){
            axios.put('/api/article-likes-increment',{slug:payload.slug,increment:payload.increment}).then((response)=>{
                    context.commit('SET_ARTICLE',response.data.data)
                    context.commit('SET_LIKE',!context.state.likeIt)
            }).catch(err=>{
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
