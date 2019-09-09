<template>
    <div class="card" v-if="user">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title">{{ user.attributes.name }}</h5>
                <button type="button" class="btn btn-primary" @click="$emit('profile-update-button-has-clicked', user)">プロフィールを編集</button>
            </div>
            <p class="card-text">{{ user.attributes.introduction }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ProfileCard",
        props: ['user']
    }
</script>