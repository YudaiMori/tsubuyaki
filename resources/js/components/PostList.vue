<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" v-for="post in posts">
                    <div class="card-body">
                        <h5 class="card-title">{{ post.relationships.user.attributes.name }}</h5>
                        <p class="card-text">{{ post.attributes.content }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "PostList",
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
                        console.log(error)
                    });
            }
        }
    }
</script>
