import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)
export default new Vuex.Store({
    state:{
        article:{}
    },
    mutations:{
        SET_ARTICLE(state,payload){
            state.article = payload
        }
    },
    actions:{
        getArticleData({commit}){
            axios.get('/api/article-json',(res)=>{
                commit('SET_ARTICLE',res.data.data)
            }).catch((err)=>{
                console.log(err)
            })

        }
    },
    getters:{
        getArticleLikes(state){
            if(state.article.statistic){
                return state.article.statistic.likes
            }

        },
        getArticleViews(state){
            if(state.article.statistic){
                return state.article.statistic.views
            }
        }
    }
})
