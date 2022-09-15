<template>
    <div class="container mt-5">
        <div v-if="post">

            <!-- Title -->
            <h1 class="text-center">
                {{ post.title }}
            </h1>

            <!-- Image -->
            <img v-if="post.cover" :src="post.cover" :alt="post.title">

            <!-- Category -->
            <div v-if="post.category" class="mt-5">
                Categoria: {{ post.category.name }}
            </div>

            <!-- Tags -->
            <div v-if="post.tags.length > 0" class="mt-2">
                <span v-for="tag in post.tags" :key="tag.id" class="badge badge-pill badge-primary mr-1">{{ tag.name }}</span>
            </div>

            <!-- Content --> 
            <p class="mt-2">
                {{ post.content }}
            </p>
        </div>

        <div v-else class="text-center mt-5">
            <!-- Loader-->
            <div class="loader">Loading...</div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'SinglePost',
    data() {
        return {
            post: null
        };
    },
    mounted() {
        axios.get('/api/posts/' + this.$route.params.slug)
        .then((response) => {
            if(response.data.success) {
              // Se abbiamo un post popoliamo this.post
              this.post = response.data.results;
            } else {
              // Altrimenti se il post non è stato trovato reindirizziamo l'utente alla pagina 404
              this.$router.push({name: 'not-found'});
            }
        });
    }
}  
</script>

<style lang="scss" scoped>
.loader {
  margin: 100px auto;
  font-size: 25px;
  width: 1em;
  height: 1em;
  border-radius: 50%;
  position: relative;
  text-indent: -9999em;
  -webkit-animation: load5 1.1s infinite ease;
  animation: load5 1.1s infinite ease;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
}
@-webkit-keyframes load5 {
  0%,
  100% {
    box-shadow: 0em -2.6em 0em 0em #3490dc, 1.8em -1.8em 0 0em rgba(52,144,220, 0.2), 2.5em 0em 0 0em rgba(52,144,220, 0.2), 1.75em 1.75em 0 0em rgba(52,144,220, 0.2), 0em 2.5em 0 0em rgba(52,144,220, 0.2), -1.8em 1.8em 0 0em rgba(52,144,220, 0.2), -2.6em 0em 0 0em rgba(52,144,220, 0.5), -1.8em -1.8em 0 0em rgba(52,144,220, 0.7);
  }
  12.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(52,144,220, 0.7), 1.8em -1.8em 0 0em #3490dc, 2.5em 0em 0 0em rgba(52,144,220, 0.2), 1.75em 1.75em 0 0em rgba(52,144,220, 0.2), 0em 2.5em 0 0em rgba(52,144,220, 0.2), -1.8em 1.8em 0 0em rgba(52,144,220, 0.2), -2.6em 0em 0 0em rgba(52,144,220, 0.2), -1.8em -1.8em 0 0em rgba(52,144,220, 0.5);
  }
  25% {
    box-shadow: 0em -2.6em 0em 0em rgba(52,144,220, 0.5), 1.8em -1.8em 0 0em rgba(52,144,220, 0.7), 2.5em 0em 0 0em #3490dc, 1.75em 1.75em 0 0em rgba(52,144,220, 0.2), 0em 2.5em 0 0em rgba(52,144,220, 0.2), -1.8em 1.8em 0 0em rgba(52,144,220, 0.2), -2.6em 0em 0 0em rgba(52,144,220, 0.2), -1.8em -1.8em 0 0em rgba(52,144,220, 0.2);
  }
  37.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(52,144,220, 0.2), 1.8em -1.8em 0 0em rgba(52,144,220, 0.5), 2.5em 0em 0 0em rgba(52,144,220, 0.7), 1.75em 1.75em 0 0em #3490dc, 0em 2.5em 0 0em rgba(52,144,220, 0.2), -1.8em 1.8em 0 0em rgba(52,144,220, 0.2), -2.6em 0em 0 0em rgba(52,144,220, 0.2), -1.8em -1.8em 0 0em rgba(52,144,220, 0.2);
  }
  50% {
    box-shadow: 0em -2.6em 0em 0em rgba(52,144,220, 0.2), 1.8em -1.8em 0 0em rgba(52,144,220, 0.2), 2.5em 0em 0 0em rgba(52,144,220, 0.5), 1.75em 1.75em 0 0em rgba(52,144,220, 0.7), 0em 2.5em 0 0em #3490dc, -1.8em 1.8em 0 0em rgba(52,144,220, 0.2), -2.6em 0em 0 0em rgba(52,144,220, 0.2), -1.8em -1.8em 0 0em rgba(52,144,220, 0.2);
  }
  62.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(52,144,220, 0.2), 1.8em -1.8em 0 0em rgba(52,144,220, 0.2), 2.5em 0em 0 0em rgba(52,144,220, 0.2), 1.75em 1.75em 0 0em rgba(52,144,220, 0.5), 0em 2.5em 0 0em rgba(52,144,220, 0.7), -1.8em 1.8em 0 0em #3490dc, -2.6em 0em 0 0em rgba(52,144,220, 0.2), -1.8em -1.8em 0 0em rgba(52,144,220, 0.2);
  }
  75% {
    box-shadow: 0em -2.6em 0em 0em rgba(52,144,220, 0.2), 1.8em -1.8em 0 0em rgba(52,144,220, 0.2), 2.5em 0em 0 0em rgba(52,144,220, 0.2), 1.75em 1.75em 0 0em rgba(52,144,220, 0.2), 0em 2.5em 0 0em rgba(52,144,220, 0.5), -1.8em 1.8em 0 0em rgba(52,144,220, 0.7), -2.6em 0em 0 0em #3490dc, -1.8em -1.8em 0 0em rgba(52,144,220, 0.2);
  }
  87.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(52,144,220, 0.2), 1.8em -1.8em 0 0em rgba(52,144,220, 0.2), 2.5em 0em 0 0em rgba(52,144,220, 0.2), 1.75em 1.75em 0 0em rgba(52,144,220, 0.2), 0em 2.5em 0 0em rgba(52,144,220, 0.2), -1.8em 1.8em 0 0em rgba(52,144,220, 0.5), -2.6em 0em 0 0em rgba(52,144,220, 0.7), -1.8em -1.8em 0 0em #3490dc;
  }
}
@keyframes load5 {
  0%,
  100% {
    box-shadow: 0em -2.6em 0em 0em #3490dc, 1.8em -1.8em 0 0em rgba(52,144,220, 0.2), 2.5em 0em 0 0em rgba(52,144,220, 0.2), 1.75em 1.75em 0 0em rgba(52,144,220, 0.2), 0em 2.5em 0 0em rgba(52,144,220, 0.2), -1.8em 1.8em 0 0em rgba(52,144,220, 0.2), -2.6em 0em 0 0em rgba(52,144,220, 0.5), -1.8em -1.8em 0 0em rgba(52,144,220, 0.7);
  }
  12.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(52,144,220, 0.7), 1.8em -1.8em 0 0em #3490dc, 2.5em 0em 0 0em rgba(52,144,220, 0.2), 1.75em 1.75em 0 0em rgba(52,144,220, 0.2), 0em 2.5em 0 0em rgba(52,144,220, 0.2), -1.8em 1.8em 0 0em rgba(52,144,220, 0.2), -2.6em 0em 0 0em rgba(52,144,220, 0.2), -1.8em -1.8em 0 0em rgba(52,144,220, 0.5);
  }
  25% {
    box-shadow: 0em -2.6em 0em 0em rgba(52,144,220, 0.5), 1.8em -1.8em 0 0em rgba(52,144,220, 0.7), 2.5em 0em 0 0em #3490dc, 1.75em 1.75em 0 0em rgba(52,144,220, 0.2), 0em 2.5em 0 0em rgba(52,144,220, 0.2), -1.8em 1.8em 0 0em rgba(52,144,220, 0.2), -2.6em 0em 0 0em rgba(52,144,220, 0.2), -1.8em -1.8em 0 0em rgba(52,144,220, 0.2);
  }
  37.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(52,144,220, 0.2), 1.8em -1.8em 0 0em rgba(52,144,220, 0.5), 2.5em 0em 0 0em rgba(52,144,220, 0.7), 1.75em 1.75em 0 0em #3490dc, 0em 2.5em 0 0em rgba(52,144,220, 0.2), -1.8em 1.8em 0 0em rgba(52,144,220, 0.2), -2.6em 0em 0 0em rgba(52,144,220, 0.2), -1.8em -1.8em 0 0em rgba(52,144,220, 0.2);
  }
  50% {
    box-shadow: 0em -2.6em 0em 0em rgba(52,144,220, 0.2), 1.8em -1.8em 0 0em rgba(52,144,220, 0.2), 2.5em 0em 0 0em rgba(52,144,220, 0.5), 1.75em 1.75em 0 0em rgba(52,144,220, 0.7), 0em 2.5em 0 0em #3490dc, -1.8em 1.8em 0 0em rgba(52,144,220, 0.2), -2.6em 0em 0 0em rgba(52,144,220, 0.2), -1.8em -1.8em 0 0em rgba(52,144,220, 0.2);
  }
  62.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(52,144,220, 0.2), 1.8em -1.8em 0 0em rgba(52,144,220, 0.2), 2.5em 0em 0 0em rgba(52,144,220, 0.2), 1.75em 1.75em 0 0em rgba(52,144,220, 0.5), 0em 2.5em 0 0em rgba(52,144,220, 0.7), -1.8em 1.8em 0 0em #3490dc, -2.6em 0em 0 0em rgba(52,144,220, 0.2), -1.8em -1.8em 0 0em rgba(52,144,220, 0.2);
  }
  75% {
    box-shadow: 0em -2.6em 0em 0em rgba(52,144,220, 0.2), 1.8em -1.8em 0 0em rgba(52,144,220, 0.2), 2.5em 0em 0 0em rgba(52,144,220, 0.2), 1.75em 1.75em 0 0em rgba(52,144,220, 0.2), 0em 2.5em 0 0em rgba(52,144,220, 0.5), -1.8em 1.8em 0 0em rgba(52,144,220, 0.7), -2.6em 0em 0 0em #3490dc, -1.8em -1.8em 0 0em rgba(52,144,220, 0.2);
  }
  87.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(52,144,220, 0.2), 1.8em -1.8em 0 0em rgba(52,144,220, 0.2), 2.5em 0em 0 0em rgba(52,144,220, 0.2), 1.75em 1.75em 0 0em rgba(52,144,220, 0.2), 0em 2.5em 0 0em rgba(52,144,220, 0.2), -1.8em 1.8em 0 0em rgba(52,144,220, 0.5), -2.6em 0em 0 0em rgba(52,144,220, 0.7), -1.8em -1.8em 0 0em #3490dc;
  }
}

</style>