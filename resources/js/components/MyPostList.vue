<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <profile-card :user="user"></profile-card>
                <my-post-card v-for="post in posts"
                           :post="post"
                           @post-card-has-clicked="$emit('post-card-has-clicked', $event)"
                           @comment-button-has-clicked="$emit('comment-button-has-clicked', $event)"
                           @delete-button-has-clicked="$emit('delete-button-has-clicked', $event)"
                           :key="post.id"></my-post-card>
            </div>
        </div>
    </div>
</template>

<script>
    import MyPostCard from "./MyPostCard";
    import ProfileCard from "./ProfileCard";
    export default {
        name: "MyPostList",
        components: {ProfileCard, MyPostCard},
        created: function () {
            this.loadData();
        },
        data: function () {
            return {
                user: null,
                posts: [],
            }
        },
        methods: {
            loadData: function () {
                axios.get('/api/v1/users/profile')
                    .then((response => {
                        this.user = response.data.data;
                        console.log(this.user);
                    }))
                    .catch((error => {
                        console.log(error);
                    }));

                axios.get('/api/v1/users/posts')
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
