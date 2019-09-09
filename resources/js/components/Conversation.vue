<template>
    <div class="conversation flex-column d-flex align-content-end px-0">
 		<h1 class="bg-light p-2 mb-0 border-bottom bottom-secondary">{{ friend ? friend.name : 'Select a Contact' }}</h1>
 		<conversationFeed :friend='friend' :messages="messages"/>
 		<conversationComposer @send="sendMessage" class="mt-auto pb-2"/>
    </div>
</template>

<script>
	import conversationFeed from './ConversationFeed';
    import conversationComposer from './ConversationComposer';

    export default {
    	props: {
    		friend: {
    			type: Object,
    			default: function () {
        			return []
    			} 
    		},
    		messages: {
    			type: Array,
    			default: function () {
        			return []
    			} 
    		}
    	},

    	methods: {
    		sendMessage(text){
    			// console.log(text);
    			if (!this.friend){
    				return;
    			}

    			axios.post('/t/send', {
    				friend_id: this.friend.id,
    				text: text
    			}).then((response) => {
    				this.$emit('new', response.data);
    				// console.log(response.data);
    			})
    		}
    	},
    	components: {conversationFeed,conversationComposer}
    }
</script>
