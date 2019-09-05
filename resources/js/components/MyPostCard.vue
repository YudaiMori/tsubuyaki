<template>
    <div class="card" >
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title" @click="$emit('post-card-has-clicked', post)">{{ post.relationships.user.attributes.name }}</h5>
                <div class="btn-group">
                    <button class="btn btn-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <icon icon="angle-down"></icon>
                    </button>
                    <div class="dropdown-menu">
                        <button class="dropdown-item" @click="$emit('delete-button-has-clicked', post)">削除</button>
                    </div>
                </div>
            </div>
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