<template>
     <div class="container">
          <div class="row justify-content-center">
               <h2>Lista Posts stampata con Componente VUE</h2>
                <div class="card text-left" v-for="post in posts" :key="post.id">
                    <img class="card-img-top" :src="'/storage/' + post.image" alt="" />
                    <div class="card-body">
                         <h4 class="card-title">{{ post.title }}</h4>
                         <p class="card-text">{{ post.description }}</p>
                         <a :href="'/posts/' + post.id" v-if="!isSingle">View Post</a>
                         
                    </div>
               </div>
          </div>
     </div> 
</template>

<script>
export default {

     data() {
          return {
               posts:  Object,
               loading: true,
               meta: null,
               links: null
          };
     },

     mounted() {
          console.log("Component mounted.");
          axios.get("http://127.0.0.1:8000/api/postsApi").then((response) => {
               console.log(response);
               this.posts = response.data.data;
               this.meta = response.data.meta;
               this.links = response.data.links;
               this.loading = false;
          });
     
     },
};
</script>
