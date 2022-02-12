<template>
  <main>
    <div class="container">
      <h1>Posts</h1>
       
      <SinglePost
       v-for="post in posts"
       :key="post.id"
       :post="post" 
      />

      <div class="bottoni">
        <button
        @click="getPosts(pagination.current - 1)"
        :disabled = "pagination.current === 1"
        >Prev</button>

        <div class="bottoni_num">

          <button
          v-for="page in pagination.last"
          :key="page"
          @click="getPosts(page)"
          :disabled="pagination.current === page"
          >
          {{page}}
          </button>

        </div>

        <button
        @click="getPosts(pagination.current + 1)"
        :disabled = "pagination.current === pagination.last"
        >Next</button>
      </div>

    </div>
  </main>
</template>

<script>
import SinglePost from './SinglePost.vue';

export default {
  name: "Posts",

  components:{
    SinglePost
  },

  data(){
    return{
      apiUrl: 'http://127.0.0.1:8000/api/posts?page=',
      posts: null,
      pagination: {}
    }
  },

  mounted(){
    this.getPosts();
  },

  methods:{
    getPosts(page = 1){
      axios.get(this.apiUrl + page)
      .then(r => {

        this.pagination = {
          current: r.data.current_page,
          last: r.data.last_page
        };

        this.posts = r.data.data;
        console.log(this.posts);
      })
      .catch(e =>{
        console.log(e);
      });
    }
  }
}
</script>

<style lang="scss" scoped>
main{
  padding: 40px 0;

  .bottoni{
    width: 100%;
    display: flex;
    justify-content: space-between;
    
    button{
      padding: 7px 15px;
      cursor: pointer;
    }

    .bottoni_num{
      
      button{
        margin: 0 2px;
      }
    }
  }
}
</style>