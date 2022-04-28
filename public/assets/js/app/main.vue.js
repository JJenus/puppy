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
    user: {},
    mostViews: [],
  },
  
  beforeMount(){
      this.loadLatest();
      this.loadMostViews();
      console.log(base_url)
      //this.getUser();
      //this.searchDB(20,0);
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
    loadMostViews(){
      let options = {
        limit: 194, 
        order: "views", 
        dir: "desc", 
        views: "true", 
      };
      $.ajax({
        url: base_url+"puppies", 
        method: "GET",
        data: options, 
        success: (data)=>{
          console.log(data);
            this.mostViews = data;
        },
        error: (err)=>{
          console.log(err);
        } 
      });
    },
    getUser(){
      $.ajax({
        url: base_url+"app/user", 
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
  }
  // END OF DATA
});                                                                                                                                        
                                                                                                                                        