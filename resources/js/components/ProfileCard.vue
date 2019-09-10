<template>
    <div class="card" v-if="user">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <img v-if="user.attributes.image_url"
                         :src="user.attributes.image_url" class="img-fluid icon">
                    <h5 class="card-title">{{ user.attributes.name }}</h5>
                </div>
                <button type="button" class="btn btn-primary profile-button" @click="$emit('profile-update-button-has-clicked', user)">プロフィールを編集</button>
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