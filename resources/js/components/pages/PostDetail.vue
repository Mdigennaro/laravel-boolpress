<template>
  <div class="container">
    <h1>{{post.title}}</h1>

    <h3 v-if="post.category">{{post.category.name}}</h3>

    <span v-for="tag in post.tags"
    :key="tag.id"
    >
      {{tag.name}}
    </span>

    <p>
      {{post.content}}
    </p>

    <p>{{formatDate}}</p>

  </div>
</template>

<script>
export default {
  name:"PostDetail",

  data(){
    return {
      apiUrl:'http://127.0.0.1:8000/api/posts/',

      post:{
        title: '',
        category: '',
        content: '',
        created_at:'',
        tags:[]
      }
    }
  },

  methods:{
    getApi(){
      axios.get(this.apiUrl + this.$route.params.slug)
      .then(r =>{
        this.post = r.data;
        console.log(this.post);
      })
      .catch(e=>{
        console.log(e);
      })
    },
  },

  computed:{
    
    formatDate(){
      const d = new Date(this.post.created_at);
    
      let day = d.getDate();
      let month = d.getMonth() + 1;
      const year = d.getFullYear();
    
      if (day < 10) {
        day = '0' + day;
      }
      if (month < 10) {
        month = '0' + month;
      }
    
      return `${day}/${month}/${year}`;
    m}

  },

  mounted(){
    console.log(this.$route.params.slug),
    this.getApi();
  }
}
</script>

<style lang="scss" scoped>
.container{
  margin-top: 40px;

  h1, h3{
    text-align: center;
  }

  h3{
    padding-bottom: 30px;
  }

  span{
    background-color: #0077ff;
    font-size: 14px;
    padding: 5px 6px;
    color:white;
    border-radius: 10px;
    margin-right: 5px;
  }

  p{
    padding-top: 40px;
  }

}
</style>