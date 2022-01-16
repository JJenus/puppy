
Vue.component("issue-card", {
  props: ["issue","user"], 
  data(){
    return {
      Good:6, 
    };
  },
  mounted(){
    console.log("Created");
  }, 
  methods:{
    resolve(){
      $("#btn-resolve-"+this.issue.id).attr("data-kt-indicator", "on");
      $date = (moment()).format("YYYY-MM-DD HH:mm:ss");
      $.ajax({
        url: base_url+"/issues/update", 
        method: "POST",
        data: {
          "id":this.issue.id, 
          "clothe_id":this.issue.clothe_id, 
          "title":this.issue.title, 
          "description":this.issue.description, 
          "resolved_at": $date,
          "resolved_by": this.user.id
        }, 
        success: (res)=>{
          if (res.status) {
            this.issue.resolved_by= res.data.resolved_by;
            this.issue.resolved_at = res.data.resolved_at;
          } else {
            console.error("errors");
            console.log(res.errors);
          }
        },
        error: (err)=>{
          console.log(err);
        } 
      }).always(()=>{
        $("#btn-resolve-"+this.issue.id).attr("data-kt-indicator", null);
      }); 
    }, 
    date($date){
      if(!$date)
        return "00:00";
      let date = (moment($date, 'YYYY-MM-DD HH:mm:ss')).format("hh:mm a, MMM DD yyyy");
      return date;
    }
  }, 
  template: `
    <div class="col-md-6 col-lg-4">
    <!--begin::Feeds Widget 2-->
		<div class="card mb-5 mb-lg-8">
			<!--begin::Body-->
			<div class="card-body ">
				<!--begin::Header-->
				<div class="d-flex align-items-center">
					<!--begin::Info-->
					<div class="d-flex flex-column flex-grow-1">
						<a href="#" class="text-gray-800 text-hover-primary mb-1 fs-5 fw-bolder">
						  {{issue.customerName}} 
						</a>
						<span class="text-muted fw-bold">Clothe id: {{issue.clothe_id}}</span>
						<span class="text-muted fw-bold">Date: {{date(issue.created_at)}}</span>
					</div>
					<!--end::Info-->
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="pt-5">
					<!--begin::Text-->
					<h1 class="fs-6 my-3">{{issue.title}}</h1>
					<p class="text-gray-800 fs-6 fw-normal mb-2">
					  {{issue.description}}
					</p>
					<!--end::Text-->
					<!--begin::Action-->
					<!--end::Action-->
				</div>
				<!--end::Body-->
				<!--begin::Separator-->
				<div class="separator pt-4"></div>
				<!--end::Separator-->
				
					<div v-if="issue.resolved_at" class="d-flex mt-3 mb-1 align-items-center ps-4 pe-4">
						<span>Status: </span> 
						<div>
						  <span class="badge ms-4 badge-primary">Resolved</span>
						  <span class="text-muted d-none ">
						    {{issue.resolved_at}}
						  </span>
						</div>
					</div>
					<div v-else class="d-flex mt-3 mb-1 align-items-center ps-4 pe-4">
						<button :id="'btn-resolve-'+issue.id" @click="resolve()" class="btn btn-light-primary btn-sm">
						  <span class="indicator-label">
                  Resolve
              </span>
              <span class="indicator-progress">
                  Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
              </span> 
						</button>
					</div>
					<div class="d-flex align-items-center ps-4 pe-4">
						Created By: 
						<span class="fw-bold p-3">
						  {{issue.created_by}}
						</span>
					</div>
				
			</div>
			<!--end::Body-->
		</div>
		<!--end::Feeds Widget 2-->
		</div>
  `
});

var App = new Vue({
  el: "#app", 
  data: {
    inputs: {
      search:"Bea", 
    },
    user: null, 
    search:{
      limit:10,
      result:[],
    }, 
    issues: [],
  },
  mounted(){
    setTimeout(()=>{
      this.searchDB(0,50);
    }, 10);
    
    this.getUser();
  }, 
  methods: {
    searchDB(limit, offset){
      $("#btn-load-more").attr("data-kt-indicator", "on");
      $.ajax({
        url: base_url+"/search/issues", 
        method: "POST",
        data: {"limit":limit, "offset":offset, "q":this.inputs.search}, 
        success: (res)=>{
          console.log(res);
          if (offset == 0) {
            this.issues = [];
          }
          this.search.result = res;
          this.issues.push(...res);
        },
        error: (err)=>{
          console.log(err);
        } 
      }).always(()=>{
        $("#btn-load-more").attr("data-kt-indicator", null);
      });
    },  
    loadIssues(){
      $("#btn-load-more").attr("data-kt-indicator", "on");
      $.ajax({
        url: base_url +"/issues", 
        method: "GET",
        success: (res)=>{
          console.log(res);
          this.issues = res;
        },
        error: (err)=>{
          console.log(err);
        } 
      }).always(()=>{
        $("#btn-load-more").attr("data-kt-indicator", null);
      });
    },  
    getUser(){
      $.ajax({
        url: `${base_url}/app/user`, 
        method: "GET",
        success: (res)=>{
          if (res.status) {
            console.log(res.data)
            this.user = res.data;
            this.loadIssues();
          }
        },
        error: (err)=>{
          console.log(err);
        } 
      });
    }, 
  }
});