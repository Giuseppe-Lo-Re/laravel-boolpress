<template>
<div class="container">
    <h1>
        sono la pagina del dettaglio
    </h1>

    {{ $route.params.slug }}
</div>
</template>

<script>
export default {
    name: 'SinglePost'
}
</script>