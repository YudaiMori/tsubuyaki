<template>
    <div class="card" >
        <div class="card-body">
            <h5 class="card-title" @click="$emit('post-card-has-clicked', post)">{{ post.relationships.user.attributes.name }}</h5>
            <p class="card-text" @click="$emit('post-card-has-clicked', post)">{{ post.attributes.content }}</p>
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <button class="btn btn-link" @click="$emit('comment-button-has-clicked', post)">
                        <icon :icon="['far', 'comment']"></icon>
                    </button>
                    <small class="text-muted" v-if="post.attributes.comments_count">{{ post.attributes.comments_count }}</small>
                </div>
                <small class="text-muted">{{ post.attributes.created_at }}</small>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MyPostCard",
        props: ['post']
    }
</script>