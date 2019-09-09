<template>
    <div class="friendsList border">
 		<ul class="list-group">
			<li class="list-group-item border-left-0 border-right-0" v-for="(friend, index) in friends" :key="friend.id" @click="selectFriend(index, friend)" :class="{ 'bg-primary text-white': friend == selected }">
				<div class="d-flex align-items-center" style="cursor: pointer">
					<div v-if="friend.profile_image == null">
						<img :src="imgUrl" :alt="friend.name" class="w-100 rounded-circle" style="max-width: 50px">
					</div>
					<div v-else>
						<img :src="friend.profile_image" :alt="friend.name">
					</div>
					<div class="pl-3">
						<span>{{ friend.name }}</span>
						<!-- <span>{{ friend.email }}</span> -->
					</div>
				</div>
			</li>
		</ul>
    </div>
</template>

<script>
    export default {
    	props: {
    		friends: {
    			type: Array,
    			default: function () {
        			return []
    			} 
    		},
    		imgUrl: {
    			String,
	    		default: function () {
        			return []
    			} 
    		}
    	},

    	data() {
    		return {
    			selected: 0
    		}
    	},

    	methods: {
    		selectFriend(index, friend) {
    			this.selected = friend;
    			console.log(this.selected);

    			this.$emit('selected', friend);
    		}
    	}
    }
</script>
