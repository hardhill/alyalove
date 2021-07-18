<template>
    <span @click="addLike" class="badge likesButton bg-primary" :class="isLike?'bg-primary':'bg-danger'">{{likesNumber}} <i class="far fa-thumbs-up"></i></span>
</template>

<script>
    export default {
        name: "LikesComponent",
        computed:{
          isLike(){
              return this.$store.state.likeIt
          },
          likesNumber(){
              return this.$store.getters.getArticleLikes
          }
        },
        methods:{
            addLike(){
                this.$store.dispatch('addLike',{
                    slug:this.$store.state.slug,
                    increment:this.isLike
                })
            }
        }
    }
</script>

<style scoped>
.likesButton{
    cursor: pointer;
}
</style>
