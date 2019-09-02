<template>
    <div class="card" >
        <div class="card-body">
            <h5 class="card-title" @click="$emit('post-card-has-clicked', post)">{{ post.relationships.user.attributes.name }}</h5>
            <p class="card-text" @click="$emit('post-card-has-clicked', post)">{{ post.attributes.content }}</p>
            <div class="d-flex justify-content-between">
                <button class="btn btn-link" @click="$emit('comment-button-has-clicked', post)">
                    <icon :icon="['far', 'comment']"></icon>
                </button>
                <p><small>{{ post.attributes.created_at }}</small></p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PostCard",
        props: ['post']
    }
</script>