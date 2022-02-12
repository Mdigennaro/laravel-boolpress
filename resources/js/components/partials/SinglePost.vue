<template>

  <section>
    <h3><router-link :to="{name:'detail', params: {slug: post.slug}}">{{post.title}}</router-link></h3>
    <p class="data">{{formatDate}}</p>
    <p v-if="post.category">{{post.category.name}}</p>
    <span v-for="tag in post.tags"
    :key="tag.id"
    >
    {{tag.name}}
    </span>
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

  h3, p{
    padding-top: 5px;  
  }

  span{
    margin-right: 2px;
    background-color: #0077ff;
    color: white;
    padding: 2px 4px;
    font-size: 10px;
    border-radius: 5px;
    margin-bottom: 5px;
  }
}

</style>