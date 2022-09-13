<template>
    <div class="container">

        <HeaderPage />

        <main>
            <router-view></router-view>
        </main>
    </div>
</template>

<script>

import HeaderPage from '../components/HeaderPage.vue';

export default {
    name: 'App',
    components: {
       HeaderPage
    }
}
</script>