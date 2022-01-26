var App = new Vue({
  el: "#app", 
  data: {
    forms: [1], 
    categories: [], 
    error: {
      username: null, 
      email: null, 
    }, 
    staff: null,  
    bgImage: null
  },
  mounted(){
    console.log("BTC money");
    this.loadCategories();
  }, 
  methods: {
    add(){
      this.forms.push(1);
    }, 
    save(){
      console.log('Saving... ');
      
      $("#cat-form-btn").attr("data-kt-indicator", "on");                    
      $.ajax({
        url: base_url+`/clothes/categories/new`, 
        method: "POST",
        data: $("#cat-form").serializeArray(), 
        success: (res)=>{
          console.log(res);
          if (res.status) {
            notify("success", "Saved");
            this.loadCategories();
          }else {
            let str = "";
            for(let error in res.errors)
              str += res.errors[error] +"\n";
            notify("error", str);
          } 
        },
        error: (err)=>{
          console.log(err);
        } 
      }).always(()=>{
        $("#cat-form-btn").attr("data-kt-indicator", null);
      });
    }, 
    loadCategories(){
      $.ajax({
        url: base_url+"/clothes/categories",
        method: "GET",
        success: (res)=>{
          this.categories = res;
        },
        error: (err)=>{
          console.log(err);
        } 
      }).always(()=>{
        //nothing yet
      });
    },
    update(form, btn){
      $("#"+btn).attr("data-kt-indicator", "on");
      let rawData = $("#"+form).serializeArray() ;
      $.ajax({
        url: base_url+"/clothes/categories/update",
        method: "POST",
        data: rawData, 
        success: (res)=>{
          if (res.status) {
            notify("success", "Saved");
            this.loadCategories();
          }else {
            let str = "";
            for(let error in res.errors)
              str += res.errors[error] +"\n";
            notify("error", str);
          } 
        },
        error: (err)=>{
          console.log(err);
        } 
      }).always(()=>{
        $("#"+btn).attr("data-kt-indicator", null);
      });
    },
    
  }
});