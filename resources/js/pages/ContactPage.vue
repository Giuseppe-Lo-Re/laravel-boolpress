<template>
    <div class="container ">
        <h2 class="mt-5 text-center">
            Contattaci
        </h2>

        <!-- Message sent alert -->
        <div v-if="success" class="alert alert-success" role="alert">
            Il messaggio è stato inviato, grazie per averci contattato!
        </div>

        <!-- Contact form -->
        <form @submit.prevent="sendMessage">

            <!-- Input Name -->
            <div class="mb-3">
                <label for="user-name" class="form-label">Nome</label>
                <input v-model="userName" type="text" class="form-control" id="user-name">

                <!-- Validation alert Name-->
                <div v-id="errors.name">
                    <div v-for="error, index in errors.name" :key="index" class="alert alert-danger" role="alert">
                        {{ error }}
                    </div>
                </div>
            </div>

            <!-- Input Email -->
            <div class="mb-3">
                <label for="user-email" class="form-label">Email</label>
                <input v-model="userEmail" type="email" class="form-control" id="user-email">

                <!-- Validation alert Email-->
                <div v-id="errors.mail">
                    <div v-for="error, index in errors.mail" :key="index" class="alert alert-danger" role="alert">
                        {{ error }}
                    </div>
                </div>
            </div>

            <!-- Input Message -->
            <div class="mb-3">
                <label for="user-message" class="form-label">Messaggio</label>
                <textarea v-model="userMessage" class="form-control" id="user-message" rows="10"></textarea>

                <!-- Validation alert Message -->
                <div v-id="errors.message">
                    <div v-for="error, index in errors.message" :key="index" class="alert alert-danger" role="alert">
                        {{ error }}
                    </div>
                </div>
            </div>

            <!-- Input Submit Button -->
            <input class="btn btn-success" type="submit" value="invia" :disabled="sending">
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
            userMessage: '',
            success: false,
            errors: {},
            sending: false
        };
    },
    methods: {
        sendMessage() {
            this.sending = true;

            axios.post('/api/leads', {
                name: this.userName,
                email: this.userEmail,
                message: this.userMessage,
            })
            .then((response) => {
                if(response.data.success) {
                this.userName = '';
                this.userEmail = '';
                this.userMessage = '';
                
                this.success = true;
                this.errors = {};
                } else {
                this.errors = response.data.errors;
                }

                this.sending = false;
            });
        }
    }
}
</script>