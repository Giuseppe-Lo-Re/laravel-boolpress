<template>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      
      
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div  v-for="link, index in menuLinks" :key="index" class="navbar-nav">
          <router-link :to="{name: link.name}" class="nav-item nav-link">{{link.label}}</router-link>
          
        </div>
      </div>
    </nav>
  </header>
</template>

<script> //
export default {
   name: 'HeaderPage',
   data() {
      return {
        menuLinks: [
          {
            name: 'home',
            label: 'Home'
          },
          {
            name: 'blog',
            label: 'Blog'
          },
          {
            name: 'about',
            label: 'About'
          },
        ]
      }
   }
}
</script>