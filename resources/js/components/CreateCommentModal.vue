<template>
    <div class="modal fade" id="createCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" v-click-outside="close">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div v-if="post">
                        <h5>{{ post.relationships.user.attributes.name }}</h5>
                        <p>{{ post.attributes.content }}</p>
                    </div>
                    <button type="button" class="close" @click="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <textarea class="form-control" id="content" rows="8" v-model="form.content" placeholder="返信をつぶやき"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="close">Close</button>
                    <button type="button" class="btn btn-primary" @click="createComment">つぶやく</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ClickOutside from 'vue-click-outside';
    export default {
        name: "CreateCommentModal",
        data: function() {
            return {
                post: null,
                form: {
                    content: null,
                    post_id:null
                }
            }
        },
        methods: {
            open: function (post) {
                this.post = post;
                this.form.post_id = post.id;
                $('#createCommentModal').modal('show');
            },
            close: function () {
                this.form.content = null;
                $('#createCommentModal').modal('hide');
            },
            createComment: function () {
                axios.post('api/v1/comments', this.form)
                    .then((response) => {
                        this.close();
                        this.$emit('comment-has-created', response.data.data);
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
        directives: {
            ClickOutside
        }
    }
</script>