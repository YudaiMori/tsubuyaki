<template>
    <div>
        <my-post-list ref="postList"
                      @post-card-has-clicked="showPostDetailModal"
                      @comment-button-has-clicked="showCreateCommentModal"
                      @delete-button-has-clicked="showDeleteModal"
                      @profile-update-button-has-clicked="showUpdateProfileModal"></my-post-list>
        <post-detail-modal ref="postDetailModal"></post-detail-modal>
        <create-comment-modal ref="createCommentModal"></create-comment-modal>
        <delete-post-modal ref="deletePostModal"></delete-post-modal>
        <update-profile-modal ref="updateProfileModal"></update-profile-modal>
    </div>
</template>

<script>
    import MyPostList from "./MyPostList";
    import DeletePostModal from "./DeletePostModal";
    import PostDetailModal from "./PostDetailModal";
    import UpdateProfileModal from "./UpdateProfileModal";
    export default {
        name: "ProfileView",
        components: {UpdateProfileModal, PostDetailModal, DeletePostModal, MyPostList},
        methods: {
            showPostDetailModal: function ($event) {
                this.$refs.postDetailModal.open($event);
            },
            showCreateCommentModal: function ($event) {
                this.$refs.createCommentModal.open($event);
            },
            showDeleteModal: function ($event) {
                this.$refs.deletePostModal.open($event);
            },
            showUpdateProfileModal: function ($event) {
                this.$refs.updateProfileModal.open($event);
            }
        }
    }
</script>