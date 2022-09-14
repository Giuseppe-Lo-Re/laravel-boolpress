<template>
    <section>
        <div >
            <h2 class="mt-5 text-center">
                {{ title }}
            </h2>

            <div class="row row-cols-3">

                <!-- Template Single Post -->
                <div v-for="singlepost in posts" :key="singlepost.id" class="col">
                    <PostDetails :post="singlepost"/>
                </div>
            </div>

            <!-- Pagination -->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center mt-5">

                    <!-- "Previous" Button -->
                    <li class="page-item" 
                        :class="{ 'disabled' : currentPaginationPage == 1 }"
                    >
                        <a class="page-link" 
                           @click.prevent="getPosts(currentPaginationPage - 1)" 
                           href="#">Previous
                        </a>
                    </li>
                    
                    <!-- Page number Button -->
                    <li v-for="pageNumber in lastPaginationPage" 
                        :key="pageNumber" 
                        class="page-item "
                        :class="{'active': pageNumber == currentPaginationPage }"
                    >
                        <a @click.prevent="getPosts(pageNumber)" 
                           class="page-link " 
                           href="#"
                        >
                            {{ pageNumber }}
                        </a>
                    </li>
                    

                    <!-- "Next" Button -->
                    <li class="page-item disable" 
                        :class="{ 'disabled' : currentPaginationPage == lastPaginationPage }"
                    >
                        <a class="page-link" 
                           @click.prevent="getPosts(currentPaginationPage + 1)" 
                           href="#">Next
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
</template>

<script>

import PostDetails from './PostDetails.vue'

export default {
    name: 'Posts',
    components: {
        PostDetails
    },
    data() {
        return {
            title: 'I nostri Post',
            posts: [],
            currentPaginationPage: 1,
            lastPaginationPage: null,
        };
    },
    methods: {
        getPosts(pageNumber) {
            axios.get('/api/posts', { // in alternativa: '/api/posts?page=' + pageNumber
                params: {
                    page: pageNumber
                }
            })
            .then((response) => {
                // const {data, current_page, last_page} = response.data.results  (alternativa con destrutturazione)
                // this.posts = data
                // this.currentPaginationPage = current_page;
                // this.lastPaginationPage = last_page;
                this.posts = response.data.results.data;
                this.currentPaginationPage = response.data.results.current_page;
                this.lastPaginationPage = response.data.results.last_page; 
            });
        }
    },
    mounted() {
        this.getPosts();
    }
}
</script>