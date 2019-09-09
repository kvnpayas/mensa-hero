<template>
    <div class="feed px-3" ref="feed">
        <div class="overflow-auto overflowCon">
            <ul v-if="friend" class="pl-0">
                <li v-for="message in messages" :class="`message${message.to == friend.id ? ' sent text-right' : ' recieved'}`" :key="message.id">
                    <div :class="`mainMessage border d-inline-block p-3${message.to == friend.id ? ' bg-primary text-white' : ' bg-light'}`">
                        {{ message.text }}
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>

    export default {
    	props: {
            friend: {
                type: Object,
            },
            messages: {
                type: Array,
                required: true
            }
        },
        // methods: {
        //     scrollToBottom() {
        //         setTimeout(() => {
        //             this.$refs.feed.scrollTop
        //         }, 50);
        //     }
        // },
        // watch: {
        //     friend(friend) {
        //         this.scrollToBottom();
        //     },
        //     messages(messages) {
        //         this.scrollToBottom();
        //     }
        // }
    }
</script>
<style lang="scss" scoped>
.feed {
    .overflowCon {
        height: calc(100vh - 281px);
        ul {
            list-style-type: none;
            li {
                margin-top: 10px;
                margin-bottom: 10px;
                .mainMessage {
                    max-width: 350px;
                    border-radius: 18px;
                }
            }
        }
    }
}
</style>