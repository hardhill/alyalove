<template>
    <div class="row mt-5">
        <div class="col-12 p-3">
            <img :src="article.img" alt="" class="border rounded mx-auto d-block">
            <h5 class="mt-5">{{article.title}}</h5>
            <p>
                <span class="tag" v-for="(tag,index) in article.tags" :key="index">
                    <span class="tag" v-if="tagsLen == index+1">{{ tag.label }}</span>
                    <span v-else>{{ tag.label }} | </span>
                </span>
            </p>
            <p class="card-text">{{article.body}}</p>
            <p>Опубликовано: <i>{{article.created_at}}</i></p>
            <div class="mt-3">
                <span class="badge bg-primary">{{likes}} <i class="far fa-thumbs-up"></i></span>
                <span class="badge bg-danger">{{views}} <i class="far fa-eye"></i></span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        computed:{
            article(){
                return this.$store.getters.getArticle
            },
            tagsLen(){
                return this.$store.state.article.tags.length
            },
            likes(){
                return this.$store.getters.getArticleLikes
            },
            views(){
                return this.$store.getters.getArticleViews
            }
        }
    }
</script>

<style scoped>

</style>
