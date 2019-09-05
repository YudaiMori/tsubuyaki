<template>
    <div class="card" v-if="user">
        <div class="card-body">
            <h5 class="card-title">{{ user.attributes.name }}</h5>
            <p class="card-text">{{ user.attributes.email }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ProfileCard",
        props: ['user']
    }
</script>