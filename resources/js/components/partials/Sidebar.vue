<template>

  <div class="categorie_tag">

    <div class="categorie">
      <h3>Categorie</h3>

      <span v-for="category in categories" 
      :key="`cat${category.id}`"
      @click="$emit('getPostByCategory', category.slug)">
      {{category.name}}
      </span>
    </div>

    <div class="tags">
      <h3>Tag</h3>

      <span v-for="tag in tags"
      :key="`tag${tag.id}`"
      @click="$emit('getPostByTag', tag.slug)">
      {{tag.name}}
      </span>
    </div>

  </div>

</template>

<script>
export default {
  name: "Sidebar",
  
  props:{
    tags: Array,
    categories: Array
  }
}
</script>

<style lang="scss" scoped>

.categorie_tag{

  .categorie, .tags{
    border: 2px solid lightgray;
    border-radius: 15px;
    padding: 10px;
    margin-bottom: 30px;

    h3{
      margin-bottom: 10px;

    }
    
    span{
      background-color: #0077ff;
      padding: 2px 5px;
      border-radius: 7px;
      margin: 3px;
      display: inline-block;
      cursor: pointer;

      &:hover{
        background-color: #74b4fd;
      }
    }
  }

  .tags span{
    background-color: black;
    color: #0077ff;

    &:hover{
      color: white;
      background-color: gray ;
    }
  }
}

</style>