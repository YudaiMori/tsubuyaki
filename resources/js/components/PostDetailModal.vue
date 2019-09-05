<template>
    <div class="modal fade" id="postDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" v-if="post">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title">{{ post.relationships.user.attributes.name }}</h5>
                        <p>{{ post.attributes.content }}</p>
                    </div>
                    <button type="button" class="close" @click="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div v-if="comments">
                    <div class="modal-body" v-for="comment in comments">
                        <p>{{ comment.attributes.content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PostDetailModal",
        data: function () {
            return {
                post: null,
                comments: [],
            }
        },
        methods: {
            open: function (post) {
                axios.get('/api/v1/posts/' + post.id)
                    .then((response => {
                        this.post = response.data.data;
                        this.comments = response.data.data.relationships.comments;
                    }))
                    .catch(error => {
                        console.log(error);
                    });

                $('#postDetailModal').modal('show');
            },
            close: function () {
                this.comments = null;
                $('#postDetailModal').modal('hide');
            }
        }
    }
</script>
