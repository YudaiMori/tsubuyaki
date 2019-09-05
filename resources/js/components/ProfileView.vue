<template>
    <div>
        <my-post-list ref="postList"
                      @post-card-has-clicked="showPostDetailModal"
                      @comment-button-has-clicked="showCreateCommentModal"
                      @delete-button-has-clicked="showDeleteModal"></my-post-list>
        <post-detail-modal ref="postDetailModal"></post-detail-modal>
        <create-comment-modal ref="createCommentModal"></create-comment-modal>
        <delete-post-modal ref="deletePostModal"></delete-post-modal>
    </div>
</template>

<script>
    import MyPostList from "./MyPostList";
    import DeletePostModal from "./DeletePostModal";
    import PostDetailModal from "./PostDetailModal";
    export default {
        name: "ProfileView",
        components: {PostDetailModal, DeletePostModal, MyPostList},
        methods: {
            showPostDetailModal: function ($event) {
                this.$refs.postDetailModal.open($event);
            },
            showCreateCommentModal: function ($event) {
                this.$refs.createCommentModal.open($event);
            },
            showDeleteModal: function ($event) {
                this.$refs.deletePostModal.open($event);
            }
        }
    }
</script>