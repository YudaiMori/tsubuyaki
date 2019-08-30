<template>
    <div>
        <post-list @post-card-has-clicked="showPostDetailModal" ref="postList"></post-list>
        <post-detail-modal ref="postDetailModal"></post-detail-modal>
    </div>
</template>

<script>
    import PostList from "./PostList";
    import PostDetailModal from "./PostDetailModal";
    export default {
        name: "HomeView",
        components: {PostDetailModal, PostList},
        methods: {
            showPostDetailModal: function ($event) {
                this.$refs.postDetailModal.open($event);
            }
        }
    }
</script>