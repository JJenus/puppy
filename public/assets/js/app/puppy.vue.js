eventBus = new Vue();

Vue.component("comment-reply", {
  props: ["comment"], 
  data(){
    return {
      reply: null, 
      showInput: false, 
    };
  }, 
  mounted(){
    console.log(this.comment.comment);
  }, 
  methods:{
    time(){
      return (moment(this.comment.created_at, 'YYYY-MM-DD HH:mm:ss')).format("hh:mm a");
    }, 
    returnComment(){
      console.log("King "+ this.reply);
    } 
  }, 
  template: `
    <div class="position-relative ps-4 mt-4">
        <span class="position-absolute top-0 start-0 w-1 h-100 bg-primary"></span>
        <div class="d-flex align-items-center justify-content-between ps-3 pb-2 mb-1">
          <div class="d-flex align-items-center me-3">
            <img src="${base_url}assets/img/avatar/05.jpg" class="rounded-circle" width="48" alt="Avatar">
            <div class="ps-3">
              <h6 class="fw-semibold mb-0">Albert Flores</h6>
              <span class="fs-sm text-muted">16 hours ago</span>
            </div>
          </div>
          <a href="#" class="nav-link fs-sm px-0">
            <i class="bx bx-share fs-lg me-2"></i>
            Reply
          </a>
        </div>
        <p class="ps-3 mb-0">
          <a class="fw-semibold text-decoration-none">@{{comment.replyTo}}</a> 
          {{comment.comment}} 
        </p>
      </div>
    </div>
  `
});

Vue.component("comment", {
  props: ["comment"], 
  data(){
    return {
      reply: null, 
      showInput: false, 
    };
  }, 
  mounted(){
    console.log(this.comment);
  }, 
  methods:{
    time(){
      return (moment(this.comment.created_at, 'YYYY-MM-DD HH:mm:ss')).format("hh:mm a");
    }, 
    replyComment(){
      if (!this.comment.replies) {
        this.comment.replies = [];
      }
      let reply = {
        id: 1234,
        user_id: 1232,
        replyTo: this.comment.user.name,
        name: "Felix", 
        comment: this.reply,
        created_at: (moment()).format("YYYY-MM-DD HH:mm:ss"), 
      };
      this.comment.replies.push(reply);
      this.showInput = false;
      this.showInput = true;
    } 
  }, 
  template: `
    <div>
      <hr class="my-2">
      <div class="py-4">
        <div class="d-flex align-items-center justify-content-between pb-2 mb-1">
          <div class="d-flex align-items-center me-3">
            <img src="${base_url}assets/img/avatar/03.jpg" class="rounded-circle" width="48" alt="Avatar">
            <div class="ps-3">
              <h6 class="fw-semibold mb-0">{{comment.user.name}}</h6>
              <span class="fs-sm text-muted">{{time()}}</span>
            </div>
          </div>
          <a @click="showInput = !showInput" class="nav-link fs-sm px-0">
            <i class="bx bx-share fs-lg me-2"></i>
            Reply
          </a>
        </div>
        <p @click="showInput = false" class="mb-0">
          {{comment.comment}}
        </p>
        <div @click="showInput = false">
          <comment-reply v-for="reply in comment.replies" :comment="reply" />
        </div>
        <form v-if="showInput" @submit.prevent="replyComment()" class="d-flex mt-3 border-top p-3 px-3 align-items-end flex-row">
          <textarea v-model="reply" class="form-control me-3 form-control-lg" rows="auto" placeholder="Type your comment here..." required></textarea>    
          <button :class="!reply?'disabled':''" class="btn btn-outline-dark btn-icon rounded-circle">
            <i class="bx bx-send"></i>
          </button>
        </form>
      </div>
    </div>
  `
});

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
    puppy: null,
    liked: false, 
    user: {}, 
    comment: null
  },
  
  beforeMount(){
      this.loadPuppy();
  },
  
  computed:{},
  
  methods: {
    like(){
      this.liked = !this.liked;
      
      if(this.liked){
        this.puppy.likes.push({});
        this.cacheLike();
      } 
      else{ 
        this.deleteCache();
        console.log("spliced");
        let lIndex = this.puppy.likes.length-1;
        this.puppy.likes.splice(lIndex, 1);
      }
      this.syncLike();
    },
    syncLike(){
      let options = {like: ""+this.liked};
      $.ajax({
        url: base_url+`puppies/${puppy_id}/update`, 
        method: "POST",
        data: options, 
        success: (data)=>{
          console.log(data);
          //this.puppy.likes = data;
        },
        error: (err)=>{
          console.log(err);
        } 
      }).always(()=>{
        this.cacheLike(this.like);
      }); 
    },
    cacheLike(){
      localStorage.setItem("likes"+this.puppy.id, "true");
    },
    deleteCache(){
      console.log("deleted local data.");
      localStorage.removeItem("likes"+this.puppy.id);
      console.log(this.getCache());
    }, 
    getCache(){
      let like = localStorage.getItem("likes"+this.puppy.id);
      console.log(like);
      if (like === "true") {
        this.liked = true;
      }
      return like;
    }, 
    mainPhoto(){
      return this.puppy.media.photos[0].url;
    },
    /*
     Todo: complete posting of comments to db
    */
    postComment(){
      console.log("post comment");
      if (!this.comment)
        return;
      $("#btn-post-comment").attr("data-kt-indicator", "on");
      let comment = {
        id: 1431,
        comment: this.comment,
        user: {
          id:12, 
          photo:"", 
          name: "Jenus Alakere"
        }, 
        created_at: (moment()).format('YYYY-MM-DD HH:mm:ss')
      };
      this.puppy.comments.push(comment);
      let options = {comment: "post"};
      /*$.ajax({
        url: base_url+`puppies/${puppy_id}/update`, 
        method: "POST",
        data: options, 
        success: (data)=>{
          console.log(data);
          //this.puppy.likes = data;
        },
        error: (err)=>{
          console.log(err);
        } 
      });*/
    },
    
    toTime($date){
      return (moment($date, 'YYYY-MM-DD HH:mm:ss')).format("MMM DD, YYYY");
    }, 
    
    loadPuppy($limit=10, $offset=0){
      $("#show-more-btn").attr("data-indicator", "on");
      let options = {
        limit: $limit, 
        offset: $offset, 
        order: "created_at", 
        dir: "asc", 
        likes: "true", 
        comments: "true", 
      };
      $.ajax({
        url: base_url+`puppies/${puppy_id}/show`, 
        method: "GET",
        data: options, 
        success: (data)=>{
          console.log(data);
          this.puppy = data;
          this.getCache();
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
                                                                                                                                        