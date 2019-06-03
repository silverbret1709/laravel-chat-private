<template>
    <div class="card chat-box">
        <div class="card-header">
            <b :class="{'text-danger' : session_block}">
                {{ friend.name }}
                <span v-if="session_block">)(Blocked)</span>
            </b>

            <!--Close Button-->
            <a href="" @click.prevent="close"><i class="fas fa-times float-right" aria-hidden="true"></i></a>
            <!-- End Close Button-->

            <!--Options-->
            <div class="dropdown mr-4 float-right">

                <a href="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v" aria-hidden="true"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#" v-if="session_block" @click.prevent="unblock">Unblock</a>
                    <a class="dropdown-item" href="#" v-else @click.prevent="block">Block</a>

                    <a class="dropdown-item" href="#" @click.prevent="clear">Clear Chat</a>
                </div>
            </div>

            <!--End Options-->
        </div>
        <div class="card-body" v-chat-scroll>
            <div class="card-text" v-for="chat in chats">
                <p>{{ chat.message }}</p>
            </div>
        </div>
        <form class="card-footer" @submit.prevent="send">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Write your message here" :disabled="session_block"></div>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['friend'],
        data() {
            return {
                chats: [],
                session_block: false

            }
        },
        methods: {
            send() {
                console.log('Yeahhhh');
            },
            close() {
                this.$emit('close');
            },
            clear() {
                this.chats = [];
            },
            block() {
                this.session_block = true;
            },
            unblock() {
                this.session_block = false;
            }
        },
        created() {
            this.chats.push(
                {message: 'Hey how are you'},
                {message: 'Hey how are you'},
                {message: 'Hey how are you'},
                {message: 'Hey how are you'},
            )
        }
    }
</script>

<style scoped>
    .chat-box {
        height: 400px
    }

    .card-body {
        overflow-y: scroll;
    }
</style>