<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <post-card v-for="post in posts"
                           :post="post"
                           @post-card-has-clicked="$emit('post-card-has-clicked', $event)"
                           @comment-button-has-clicked="$emit('comment-button-has-clicked', $event)"
                           :key="post.id"></post-card>
            </div>
        </div>
    </div>
</template>

<script>
    import PostCard from "./PostCard";
    export default {
        name: "PostList",
        components: {PostCard},
        created: function () {
            this.loadData();
        },
        data: function () {
            return {
                posts: [],
            }
        },
        methods: {
            loadData: function () {
                axios.get('/api/v1/posts')
                    .then((response => {
                        this.posts = response.data.data;
                    }))
                    .catch(error => {
                        console.log(error);
                    });
            },
            push: function (post) {
                this.posts.unshift(post);
            }
        }
    }
</script>
