<template>
    <main>
        <h1>VueJS </h1>

        <Post />
    </main>
</template>

<script>
import Posts from '../components/Posts.vue';

export default {
    name: 'App',
    components: {
        Posts
    }
}
</script>