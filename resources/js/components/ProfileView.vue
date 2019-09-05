<template>
    <div>
        <my-post-list ref="postList"
                      @delete-button-has-clicked="showDeleteModal"></my-post-list>
        <delete-post-modal ref="deletePostModal"></delete-post-modal>
    </div>
</template>

<script>
    import MyPostList from "./MyPostList";
    import DeletePostModal from "./DeletePostModal";
    export default {
        name: "ProfileView",
        components: {DeletePostModal, MyPostList},
        methods: {
            showDeleteModal: function ($event) {
                this.$refs.deletePostModal.open($event);
            }
        }
    }
</script>