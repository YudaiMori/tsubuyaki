<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <post-card v-for="post in posts"
                           :post="post"
                           :key="post.id"></post-card>
            </div>

        </div>
    </div>
</template>

<script>
    import PostCard from "./PostCard";
    export default {
        name: "PostList",
        comments: {PostCard},
        created: function () {
            this.loadData();
        },
        data: function () {
            return {
                posts: []
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
