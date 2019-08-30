<template>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ post.relationships.user.attributes.name }}</h5>
            <p class="card-text">{{ post.attributes.content }}</p>
            <p><small>{{ post.attributes.created_at }}</small></p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PostCard",
        props: ['post']
    }
</script>