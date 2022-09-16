<template>
    <div class="container ">
        <h2 class="mt-5 text-center">
            Contattaci
        </h2>

        <form @submit.prevent="sendMessage()">
            <div class="mb-3">
                <label for="user-name" class="form-label">Nome</label>
                <input v-model="userName" type="text" class="form-control" id="user-name">
            </div>
            <div class="mb-3">
                <label for="user-email" class="form-label">Email</label>
                <input v-model="userEmail" type="email" class="form-control" id="user-email">
            </div>
            <div class="mb-3">
                <label for="user-message" class="form-label">Messaggio</label>
                <textarea v-model="userMessage" class="form-control" id="user-message" rows="10"></textarea>
            </div>

            <input class="btn btn-success" type="submit" value="invia" >
        </form>
    </div>
</template>

<script>
export default {
    name: 'ContactPage',
    data() {
        return {
            userName: '',
            userEmail: '',
            userMessage: ''
        };
    },
    methods: {
        sendMessage() {
            axios.post('/api/leads', {
                name: this.userName,
                email: this.userEmail,
                message: this.userMessage
            })
            .then((response) => {
                console.log(response);
            });
        }
    }
}
</script>