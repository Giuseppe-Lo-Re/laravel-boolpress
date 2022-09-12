<template>
    <section>
        <div class="container">
            <h1>
                {{ pageTitle }}
            </h1>

            <div class="row row-cols-3">

                <!-- Template Single Post -->
                <div v-for="post in posts" :key="post.id" class="col">
                    <div class="card mt-5" style="width: 18rem;"> 
                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                        <div class="card-body">
                            <h5 class="card-title">{{post.title}}</h5>
                            <p class="card-text">{{truncateText(post.content)}}</p>
                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</template>

<script>

export default {
    name: 'Posts',
    data() {
        return {
            pageTitle: 'I nostri Post:',
            posts: []
        };
    },
    methods: {
        truncateText(text) {
            if(text.length > 100){
              return text.slice(0, 100) + '...';  
            }
            return text;
        },
        getPosts() {
            axios.get('/api/posts')
            .then((response) => {
            this.posts = response.data.results;
            });
        }
    },
    mounted() {
        this.getPosts();
    }
}
</script>