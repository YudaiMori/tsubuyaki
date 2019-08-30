<template>
    <div class="modal fade" id="postDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" v-if="post">
                <div class="modal-header">
                    <h5 class="modal-title">{{ post.relationships.user.attributes.name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ post.attributes.content }}</p>
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
            }
        },
        methods: {
            open: function (post) {
                this.post = post;
                $('#postDetailModal').modal('show');
            }
        }
    }
</script>
