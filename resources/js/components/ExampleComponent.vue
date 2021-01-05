<template>
  <div>
    <ul class="list-group pb-2">
      <li class="list-group-item" v-for="(value, index) in chat.message" :key="index">{{value}}</li>
    </ul>
    <input type="text" v-model="message" placeholder="type your message" class="form-control" v-on:keyup.enter="send">
  </div>
</template>

<script>
export default {
  data() {
    return {
      message: "",
      chat:{
          message: []
      }
    };
  },
  methods:{
      send(){
          if(this.message.length > 0){
              this.chat.message.push(this.message);
              this.message = '';
          console.log(this.message);
          }

      }
  },
  mounted() {
    Echo.join(`chat`)
      .here((users) => {
        console.log(users);
      })
      .joining((user) => {
        console.log(`${user.name} joined`);
      })
      .leaving((user) => {
        console.log(`${user.name} Leaved`);
      });
  },
};
</script>

<style lang="scss" scoped>
</style>
