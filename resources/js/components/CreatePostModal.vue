<template>
    <div class="modal fade" id="createPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" @click="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <textarea class="form-control" id="content" rows="8" v-model="form.content" placeholder="いまどうしてる？"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="close">Close</button>
                    <button type="button" class="btn btn-primary" @click="createPost">つぶやく</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CreatePostModal",
        data: function() {
            return {
                form: {
                    content: null
                }
            }
        },
        methods: {
            open: function () {
                $('#createPostModal').modal('show');
            },
            close: function () {
                this.form.content = null;
                $('#createPostModal').modal('hide');
            },
            createPost: function () {
                axios.post('api/v1/store', this.form)
                    .then((response) => {
                        this.close();
                        this.$emit('post-has-created', response.data.data);
                })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        }
    }
</script>