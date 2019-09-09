<template>
    <div class="composer px-3">
 		<textarea v-model="message" @keydown.enter="send" placeholder="Message..." class="w-100 form-control"></textarea>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                message:''
            };
        },

        methods: {
            send(e) {
                e.preventDefault();
                if(this.message == ''){
                    return;
                }

                this.$emit('send', this.message);
                this.message = '';
            }
        }
    }
</script>
