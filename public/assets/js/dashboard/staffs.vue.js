
Vue.component("staff-card", {
  props: ["staff"],
  data(){
    return {
      reports: []
    };
  }, 
  mounted(){
    this.getReport();
  }, 
  computed:{
    role(){
      for(let i in this.staff.roles){
        return this.staff.roles[i];
      }
    }
  }, 
  methods:{
    remove($type, $key){
      console.log($type+" : "+$key);
      if ($type === 'role') {
        delete this.staff.roles[$key];
        this.staff.roles = {...this.staff.roles};
      }
    }, 
    permission($str){
      //let arr = $str.split(".");
      return $str;//arr[arr.length-1];
    }, 
    
    getReport(){
      $.ajax({
        url: base_url+`/staffs/${this.staff.id}/report`, 
        method: "GET",
        success: (res)=>{
          console.log(res);
          console.log("successfully");
          this.reports = res;
        },
        error: (err)=>{
          console.log(err);
        } 
      }).always(()=>{
        //nothing yet
      });
    }
   
  }, 
  template: `
    <div class="col-xxl-4 staff">
		  <!--begin::Feeds Widget 2-->
			<div class="card mb-5 mb-xxl-8">
				<!--begin::Body-->
				<div class="card-body pb-0">
					<!--begin::Header-->
					<div class="d-flex align-items-center">
						<!--begin::Symbol-->
						<div class="symbol symbol-45px me-5">
							<span class="symbol-label bg-light align-items-end">
								<img alt="Logo" :src="staff.image_url" class="mh-40px" />
							</span>
						</div>
						<!--end::Symbol-->
						<!--begin::Info-->
						<div class="d-flex flex-column flex-grow-1">
							<a href="#" class="text-gray-800 text-hover-primary mb-1 fs-6 fw-bolder">
							  {{staff.name}}
							</a>
							<span class="fw-bold badge badge-light-dark ">{{role}}</span>
							<span class="text-muted fs-8 fw-bold">Yestarday at 5:06 PM</span>
						</div>
						<!--end::Info-->
						<!--begin::Dropdown-->
						
						<!--end::Dropdown-->
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="pt-5">
						<!--begin::Text-->
					
						<h5 class="fw-bolder">Roles</h5>
						<div class="d-flex justify-content-start flex-wrap px-2 mb-3">
						  <span v-for="(role, index) in staff.roles" :key="index" class="badge mb-2 me-1 badge-light-dark">
						    {{role}} 
						    <span @click="remove('role', index)" class="badge text-hover-danger ms-3 badge-light-danger">
						      <i class="fas fa-times"></i>
						    </span>
						  </span>
						</div>
						
						<h5 class="fw-bolder d-none ">Permissions</h5>
						<div class="d-flex d-none justify-content-start flex-wrap px-2 mb-3">
						  <span v-for="(perm, index) in staff.permissions" :key="index" class="badge mb-2 me-1 badge-light-dark">
						    {{permission(perm)}} 
						    <span @click="remove('permission', perm)" class="badge text-hover-danger ms-3 badge-light-danger">
						      <i class="fas fa-times"></i>
						    </span>
						  </span>
						</div>
						
						<h5 class="fw-bolder">Reports</h5>
						<div class="d-flex justify-content-start flex-wrap px-2 mb-3">
						  <span v-for="(report, index) in reports" :key="index" class="badge mb-2 me-1 badge-light-dark">
						    {{index}} 
						    <span class="badge text-hover-danger ms-3 badge-light-danger">
						      {{report}} 
						    </span>
						  </span>
						</div>
						
						<!--end::Text-->
						
					</div>
					<!--end::Body-->
					<!--begin::Separator-->
					<div class="separator pt-4"></div>
					<!--end::Separator-->
					<!--begin::Editor-->
					<!--edit::Editor-->
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
    staffs: [], 
    inputs: {
      search: '', 
    }, 
  },
  mounted(){
    console.log("hello");
    this.getStaffs();
  }, 
  methods: {
    search(){
      //setTimeout(()=> {
        var rex = new RegExp(this.inputs.search, 'i');
  	    $('.staff').hide();
  	    $('.staff').filter(function() {
  	        return rex.test($(this).text());
	      }).show();
      //}, 2);
    }, 
    
    getStaffs(){
      $.ajax({
        url: base_url+"/staffs/", 
        method: "GET",
        success: (res)=>{
          console.log(res);
          console.log("successfully");
          this.staffs = res;
        },
        error: (err)=>{
          console.log(err);
        } 
      }).always(()=>{
        //nothing yet
      });
    },
    
  }
});