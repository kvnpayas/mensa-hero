<template>
    <div class="chat-app row">
        <conversation :friend="selectedFriend" :messages="messages" @new="saveNewMessage" class="col-8"/>    
        <friendsList :friends="friends" :imgUrl="imgUrl" @selected="startConversationWith" class="col-4 px-0"/>    
    </div>
</template>

<script>
    import conversation from './Conversation';
    import friendsList from './FriendsList';

    export default {
        props: {
            user: {
                type: Object,
                required: true
            }
        },

        data(){
            return {
                selectedFriend: null,
                messages: [],
                friends: [],
                imgUrl: null

            }
        },
        mounted() {
            // Echo.private(`messages.${this.user.id}`)
            //     .listen('newMessage', (e) => {
            //         this.handleIncoming(e.message);
            //     });

            axios.get('/contacts')
            .then((response) => {
                // console.log(this.user);
                // console.log(response.data.friends);
                this.friends = response.data.friends;
                this.imgUrl = response.data.imgUrl;
            });
        },
        methods: {
            startConversationWith(friend){
                // console.log(`messages.${this.user.id}`);
                // console.log('/t/${friend.id}');
                axios.get(`/t/${friend.id}`)
                .then((response) => {
                    this.messages = response.data;
                    this.selectedFriend = friend;
                })
            },
            saveNewMessage(text) {
                // console.log(this.message);
                this.messages.push(text);
            },
            // handleIncoming(message) {
            //     if (this.selectedFriend && message.from == this.selectedFriend.id) {
            //         this.saveNewMessage(message);
            //     }
            //     alert(message.text);
            // }
        },
        components: {conversation, friendsList}
    }
</script>
