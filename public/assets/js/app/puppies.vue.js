eventBus = new Vue();

Vue.component("puppy-details", {
  props: ["puppy"], 
  data(){
    return {
      liked: false, 
      imgLoaded: false
    };
  }, 
  beforeMount(){
    //this.puppy.media.photos[0].url = base_url +"assets/img/portfolio/courses/01.jpg"
  }, 
  methods: {
    toTime($date){
      return (moment($date, 'YYYY-MM-DD HH:mm:ss')).format("MMM DD, YYYY");
    }, 
    like(){
      this.liked = !this.liked;
      let digit = this.liked? 1:-1;
      this.puppy.likes += digit;
    }, 
    imgLoad(){
      console.log("image is loaded");
      this.imgLoaded = true;
    } 
  }, 
  template: 
  `
    <div class="muasonry-grid-item col pb-2 pb-lg-3">
      <article class="card border-0 w-100 bg-transparent">
        <div class="position-relative w-100 overflow-hidden rounded-3">
          <a :href="base_url+'app/puppies/'+puppy.id" class="position-absolute top-0 start-0 w-100 h-100" aria-label="Read more"></a>
          <a @click="like()" class="btn btn-icon btn-light bg-white border-white btn-sm rounded-circle position-absolute top-0 end-0 zindex-5 me-3 mt-3" data-bs-toggle="tooltip" data-bs-placement="left" title="save">
            <i :class="liked ? 'text-danger':''" class="bx bx-heart"></i>
          </a>
          <img :class="(imgLoaded==false)? 'invisible':''" @load="imgLoad()" loading="lazy" :src="puppy.media.photos[0].url" alt="Image">
          <div style="min-height:300px;" v-if="imgLoaded==false" class="d-flex w-100 align-items-center justify-content-center flex-center">
            <div align="center" class="spinner-border opacity-8 " role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>
        </div>
        <div class="card-body pb-1 px-0">
          <a class="badge fs-sm text-white bg-info shadow-info text-decoration-none mb-3">{{puppy.breed}}</a>
          <h3 class="h4">
            <a :href="base_url+'app/puppies/'+puppy.id">{{puppy.name}}</a>
          </h3>
          <div class="d-flex align-items-center text-muted">
            <div class="fs-sm border-end pe-3 me-3">{{toTime(puppy.created_at)}}</div>
            <div @click="like()" class="d-flex align-items-center me-3">
              <i :class="liked ? 'text-info':''" class="bx bx-like fs-lg me-1"></i>
              <span class="fs-sm">{{puppy.likes}}</span>
            </div>
            <div class="d-flex align-items-center me-3">
              <i class="bx bx-comment fs-lg me-1"></i>
              <span class="fs-sm">{{puppy.comments}}</span>
            </div>
            <div class="d-flex d-none align-items-center">
              <i class="bx bx-share-alt fs-lg me-1"></i>
              <span class="fs-sm">2</span>
            </div>
          </div>
        </div>
      </article>
    </div>
  `
})

let app = new Vue({
  el: "#app", 
  data: {
    inputs: {
      search:"Bea", 
    }, 
    search:{
      limit:10,
      result:[],
    }, 
    puppies: null,
    last: null, 
    user: {}
  },
  
  beforeMount(){
      this.loadPuppies();
      //this.getUser();
      //this.searchDB(20,0);
  },
  
  computed:{},
  
  methods: {
    loadPuppies($limit=10, $offset=0){
      $("#show-more-btn").attr("data-indicator", "on");
      let options = {
        limit: $limit, 
        offset: $offset, 
        order: "created_at", 
        dir: "asc", 
        likes: "true", 
        comments: "count", 
      };
      $.ajax({
        url: base_url+"puppies", 
        method: "GET",
        data: options, 
        success: (data)=>{
          console.log(data);
          if (this.puppies) {
            this.puppies.push(...data);
          }
           else this.puppies = data;
          this.search.result = data
        },
        error: (err)=>{
          console.log(err);
        } 
      }).always(()=>{
        $("#show-more-btn").attr("data-indicator", null);
      });
    }, 
    getUser(){
      $.ajax({
        url: `${base_url}app/user`, 
        method: "GET",
        success: (res)=>{
          if (res.status) {
            this.user = res.data;
          }
        },
        error: (err)=>{
          console.log(err);
        } 
      });
    }, 
    
    searchDB(limit, offset){
      $("#form-search-btn").attr("data-kt-indicator", "on");
      $.ajax({
        url: base_url +"/search/puppies", 
        method: "POST",
        data: {"limit":limit, "offset":offset, "q":this.inputs.search}, 
        success: (res)=>{
          //console.log(res);
          if (offset == 0) {
            this.clothes = [];
          }
          this.search.result = res;
          this.clothes.push(...res);
        },
        error: (err)=>{
          console.log(err);
        } 
      }).always(()=>{
        $("#form-search-btn").attr("data-kt-indicator", null);
      });
            
    }, 
    
  }
  // END OF DATA
});                                                                                                                                        
                                                                                                                                        