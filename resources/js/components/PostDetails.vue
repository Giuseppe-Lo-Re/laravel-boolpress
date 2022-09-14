<template>
    <div class="card mt-5"> 
        <div class="card-body">

            <!-- Title -->
            <h5 class="card-title">{{post.title}}</h5>

            <!-- Content -->
            <p class="card-text">{{truncateText(post.content)}}</p>

            <!-- Button -->
            <router-link 
                class="btn btn-primary" 
                :to="{ 
                    name: 'single-post', 
                    params: { slug: post.slug }
                    }"
            >
                Leggi
            </router-link>
        </div>
    </div>
</template>

<script>


export default {
    name: 'PostDetails',
    props: {
        post: Object
    },
    methods: {
        truncateText(text) {
            if(text.length > 100){
              return text.slice(0, 100) + '...';  
            }
            return text;
        },
    }
}
</script>