<template>
  <div>
    <ul class="list-group pb-2" v-chat-scroll="{always: false, smooth: true, scrollonremoved:true, smoothonremoved: false}">
    <!--<ul class="list-group pb-2" v-chat-scroll="{always: false, smooth: true}">-->
      <li class="list-group-item" v-for="(value, index) in chat.message" :key="index" v-bind:class="ClassName">{{value}}<small class="badge float-end text-warning">you</small></li>
    </ul>
    <input type="text" v-model="message" placeholder="type your message" class="form-control" v-on:keyup.enter="send">
  </div>
</template>

<script>
export default {
    props: [
        'color'
    ],
  data() {
    return {
      message: "",
      chat:{
          message: []
      }
    };
  },
    computed: {
        ClassName(){
            return 'list-group-item-'+ this.color;
        }
    },
  methods:{
      send(){

          if(this.message.length > 0){
              // this.chat.message.push(this.message);
              // Make a request for a user with a given ID
              let self = this;
              axios.post('/send',{
                  message : this.message
              })
                  .then(function (response) {
                      // handle success
                      // self.chat.message.push(response.data.message);
                      self.message = '';
                      // console.log(response.data);
                  })
                  .catch(function (error) {
                      // handle error
                      console.log(error);
                  })
                  .then(function () {
                      // always executed
                  });
          }

      }
  },
  mounted() {
      Echo.private(`chat`)
          .listen('ChatEvent', (e) => {

              this.chat.message.push(e.message);
              this.chat.user.push(e.user);
          });
  }
  //   Echo.join(`chat`)
  //     .here((users) => {
  //       console.log(users);
  //     })
  //     .joining((user) => {
  //       console.log(`${user.name} joined`);
  //     })
  //     .leaving((user) => {
  //       console.log(`${user.name} Leaved`);
  //     });
  // },
};
</script>

<style lang="scss" scoped>
  .list-group{
    max-height: 300px;
    overflow-y: auto;
  }

  /* Hide scrollbar for Chrome, Safari and Opera */
  .list-group::-webkit-scrollbar {
    display: none;
  }

  /* Hide scrollbar for IE, Edge and Firefox */
  .list-group {
    -ms-overflow-style: none; /* IE and Edge */
    scrollbar-width: none; /* Firefox */
  }

</style>
