<template>
  <main>
    <div class="container">

      <div class="posts"  v-if="success">
        <div v-if="posts">

          <h1>Posts</h1>
       
          <SinglePost
            v-for="post in posts"
           :key="post.id"
           :post="post" 
          />

            <div class="bottoni">
              <button
              @click="getPosts(pagination.current - 1)"
              :disabled = "pagination.current === 1">
                Prev
              </button>

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
              :disabled = "pagination.current === pagination.last">
              Next
            </button>
          </div>
        </div>

        <div v-else>
          <h1>LOADING ...</h1>
        </div>

      </div>

      <div v-else>
        <h2>{{error_msg}}</h2>
      </div>

      <Sidebar
      :tags="tags"
      :categories="categories"
      @getPostByCategory="getPostByCategory"
      @getPostByTag="getPostByTag"
       />


    </div>
  </main>
</template>

<script>
import SinglePost from '../partials/SinglePost.vue';
import Sidebar from '../partials/Sidebar.vue';

export default {
  name: "Posts",

  components:{
    SinglePost,
    Sidebar
  },

  data(){
    return{
      apiUrl: 'http://127.0.0.1:8000/api/posts',
      posts: null,
      pagination: {},
      tags:[],
      categories:[],
      success : true,
      error_msg :''
    }
  },

  mounted(){
    this.getPosts();
  },

  methods:{
    getPostByCategory(slug_category){
      this.posts = null;

      axios.get(this.apiUrl + '/postcategory/' + slug_category)
      .then(r =>{

        this.posts = r.data.category.posts;
        if (!r.data.success) {
          this.error_msg = r.data.error;
          this.success = false;
        }

      })
      .catch(e =>{
        console.log(e);
      })
    },

    getPostByTag(slug_tag){
      this.posts = null;

      axios.get(this.apiUrl + '/posttag/' + slug_tag)
      .then(r =>{

        this.posts = r.data.tag.posts;
        console.log(this.posts);

      })
      .catch(e =>{
        console.log(e);
      })
    },

    getPosts(page = 1){
      this.posts = null;

      axios.get(this.apiUrl + '?page=' + page)
      .then(r => {

        this.posts = r.data.posts.data;
        console.log(this.posts);

        this.categories = r.data.categories;
        this.tags = r.data.tags;

        this.pagination = {
          current: r.data.current_page,
          last: r.data.last_page
        };

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

  .container{
    display: flex;

    .bottoni{
      width: 100%;
      display: flex;
      justify-content: space-between;
      padding-bottom: 50px;
    
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

    .posts{
      width: 80%;
    }

  }

}
</style>