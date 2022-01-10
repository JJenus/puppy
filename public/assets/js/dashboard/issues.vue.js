
Vue.component("issue-card", {
  props: ["issue"], 
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
      this.issue.resolved_at = new Date("Y-m-d");
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
						<a href="#" class="text-gray-800 text-hover-primary mb-1 fs-6 fw-bolder">
						  {{issue.customerName}} 
						</a>
						<span class="text-muted fw-bold">Clothe id: {{issue.clothe_id}}</span>
						<span class="text-muted fw-bold">Date: {{issue.date}}</span>
					</div>
					<!--end::Info-->
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="pt-5">
					<!--begin::Text-->
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
						<button @click="resolve()" class="btn btn-light-primary btn-sm">
						  Resolve
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
    search:{
      limit:10,
      result:[],
    }, 
    issues: [
      {
        clothe_id: "jhR",
        date: "11/07/2021 09:09:45",
        created_by: "Adam Johnson", 
        resolved_at: null, 
        customerName: "Trent Waldorf", 
        description: "is one of the board members who have been in the Niger Delta region of Nigeria", 
      }, 
      {
        clothe_id: "6grr",
        created_by: "Cleveland Amanda", 
        date: "22nd May 2021 5:15 am", 
        resolved_at: "2020-07-13 13:45:34", 
        customerName: "Annie Gibson", 
        description: "the best practices to eliminate vulnerabilities is to make extra work with the error ", 
      }, 
      {
        clothe_id: "5tDr",
        created_by: "Glenn Bowen", 
        date: "22nd May 2021 5:15 am",
        resolved_at: "2021-11-13 14:25:14", 
        customerName: "James Gosling", 
        description: "I love Java and the other two points that you have ", 
      }, 
    ],
  },
  mounted(){
    setTimeout(()=>{
      this.searchDB(0,50);
    }, 10);
  }, 
  methods: {
    searchDB(limit, offset){
      $("#btn-load-more").attr("data-kt-indicator", "on");
      $.ajax({
        url: "http://localhost:8080/search/issues", 
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
  }
});