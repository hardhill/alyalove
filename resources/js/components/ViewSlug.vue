<template>
    <div>{{slug}}</div>
</template>

<script>
    export default {
        name: "ViewSlug",
        props:{
            slug :{
                type:String,
                default:''
            }
        }
    }
</script>

<style scoped>

</style>
