<template>
    <div class="modal fade" id="deletePostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" @click="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>つぶやきを削除しますか？</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="close">キャンセル</button>
                    <button type="button" class="btn btn-danger" @click="deletePost">削除</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "DeletePostModal",
        data: function () {
            return {
                post: null
            }
        },
        methods: {
            open: function (post) {
                this.post = post;
                $('#deletePostModal').modal('show');
            },
            close: function () {
                $('#deletePostModal').modal('hide');
            },
            deletePost: function () {
                axios.delete('api/v1/posts/'+ this.post.id)
                    .then((response) => {
                        this.close();
                        location.reload();
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        }
    }
</script>