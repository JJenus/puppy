eventBus = new Vue();

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
    latest: null,
    last: null, 
    user: {}
  },
  
  beforeMount(){
      this.loadLatest();
      console.log(base_url)
      //this.getUser();
      //this.searchDB(20,0);
  },
  
  computed:{
    
  },
  
  methods: {
    toTime($date){
      return (moment($date, 'YYYY-MM-DD HH:mm:ss')).format("hh:mm a");
    }, 
    img(media){
      return media.photos[0].url;
    }, 
    loadLatest(){
      let options = {
        limit: 4, 
        order: "created_at", 
        dir: "desc", 
        likes: "true", 
      };
      $.ajax({
        url: base_url+"puppies", 
        method: "GET",
        data: options, 
        success: (data)=>{
          console.log(data);
            this.latest = data;
        },
        error: (err)=>{
          console.log(err);
        } 
      });
    }, 
    getUser(){
      $.ajax({
        url: `http://localhost:8080/app/user`, 
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
        url: "http://localhost:8080/search/clothes", 
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
                                                                                                                                        