<template>

  <section>
    <h3>{{post.title}}</h3>
    <p class="data">{{formatDate}}</p>
    <p>{{maxCharacter}}</p>
  </section>
  
</template>

<script>
export default {
  name: "SinglePost",

  props:{
    'post': Object
  },

  computed:{
    maxCharacter(){
      return this.post.content.substr(0, 30) + '...'
    },

    formatDate(){
      const d = new Date(this.post.created_at);

      let day = d.getDate();
      let month = d.getMonth()+1;
      const year = d.getFullYear();

      if (day < 10) {
        day = '0'+ day;
      }
      if (month < 10) {
        month = '0'+ month;
      }

      return `${day}/${month}/${year}`;
    }
  }
}
</script>

<style lang="scss" scoped>
section{
  margin: 15px 0;

  h3{
    padding-bottom: 5px;  
  }
  
  .data{
    padding-bottom: 10px;
  } 
}

</style>