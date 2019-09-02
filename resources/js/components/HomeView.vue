<template>
    <div>
        <post-list @post-card-has-clicked="showPostDetailModal"
                   @comment-button-has-clicked="showCreateCommentModal"
                   ref="postList"></post-list>
        <post-detail-modal ref="postDetailModal"></post-detail-modal>
        <create-comment-modal ref="createCommentModal"></create-comment-modal>
    </div>
</template>

<script>
    import PostList from "./PostList";
    import PostDetailModal from "./PostDetailModal";
    import CreateCommentModal from "./CreateCommentModal";
    export default {
        name: "HomeView",
        components: {CreateCommentModal, PostDetailModal, PostList},
        methods: {
            showPostDetailModal: function ($event) {
                this.$refs.postDetailModal.open($event);
            },
            showCreateCommentModal: function ($event) {
                this.$refs.createCommentModal.open($event);
            }
        }
    }
</script>