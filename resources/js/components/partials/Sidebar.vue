<template>

  <div class="categorie_tag">

    <div class="categorie">
      <h3>Categorie</h3>
      <span>HTML</span>
      <span>PHP</span>
      <span>PHP</span>
    </div>

    <div class="tags">
      <h3>Tag</h3>
      <span>Tag</span>
      <span>Tag</span>
      <span>Tag</span>
    </div>

  </div>

</template>

<script>
export default {
  name: "Sidebar"
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