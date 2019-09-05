<template>
    <my-post-list ref="postList"></my-post-list>
</template>

<script>
    import MyPostList from "./MyPostList";
    export default {
        name: "ProfileView",
        components: {MyPostList}
    }
</script>