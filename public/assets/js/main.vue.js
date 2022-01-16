eventBus = new Vue();

Vue.component("clothe", {
  props: ["clothe"],
  data(){
    return {
      actions:{
        dispensed:false, 
      } 
    };
  }, 
  mounted(){
    console.log(this.clothe);
  }, 
  methods:{
    date($date){
      console.log ($date)
      //make a DB call for clothe activities
      if (this.clothe.status === "pending" || !$date) {
        return "pending";
      }
      return (moment($date, 'YYYY-MM-DD HH:mm:ss')).format("LLLL");
    }, 
    dispense(){
      $('#clothe-dispense-btn'+this.clothe.id)[0].setAttribute("data-kt-indicator", "on");
      $.ajax({
        url: `http://localhost:8080/clothes/${this.clothe.id}/dispense`, 
        method: "GET",
        data: {}, 
        success: (res)=>{
          console.log(res);
          if (res.status) {
            this.clothe = res.data;
            //console.log("success"); 
            notify("success", "Done");
            this.actions.dispensed = true;
          }
        },
        error: (err)=>{
          console.log(err);
        } 
      }).always(()=>{
        $('#clothe-dispense-btn'+this.clothe.id)[0].removeAttribute("data-kt-indicator");
      });
    }, 
    reverse(){
      console.log("are you sure?");
      this.actions.dispensed = false;
    }
  }, 
  template: `
    <tr>
      <td>{{clothe.id}}</td>
      <td>{{clothe.type}}</td>
      <td>{{clothe.status}}</td>
      <td>{{date(clothe.washed_at)}}</td>
      <td>{{date(clothe.ironed_at)}}</td>
      <td>{{date(clothe.dispensed_at)}}</td>
      <td>
        <div v-if="!clothe.dispensed_at">
          <button :id="'clothe-dispense-btn'+clothe.id" @click="dispense()" class="btn btn-sm btn-light-primary">
            <span class="indicator-label">
              dispense
            </span>
            <span class="indicator-progress">
              Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span> 
          </button>
        </div>
      </td>
    </tr>
  `
});

Vue.component("search-card", {
  props: ["customer"],
  data(){
    return {
      actions: {
        showDetails: false, 
        pay:false
      }, 
      inputs:{
        amount_paid:null, 
        debt:null, 
        credit:null, 
      }, 
      currency: "$"
    };
  },
  computed: {
    cost(){
      return "$"+this.customer.total_cost;
    }, 
    getStatusFlag(){
      return this.customer.status == "ready" ? "badge-light-warning":this.customer.status == "pending"? "badge-light-danger":"badge-light-success";
    }, 
    readyClothes(){
      var count = 0;
      for(let clothe of this.customer.clothes){
        if (clothe.status === "ready" || clothe.status === "dispensed" ) {
          count++;
        }
      }
      return count;
    }
  }, 
  methods:{
    paid(){
      let truthy = Number(this.customer.amount_paid) == Number(this.customer.total_cost) || Number(this.customer.amount_paid) > Number(this.customer.total_cost);
      return truthy;
    }, 
    date($date){
      if (!$date) {
        return 'unknown';
      }
      return (moment($date, 'YYYY-MM-DD HH:mm:ss')).format("LLLL");
    }, 
    money($cash){
      $cash = $cash || "0.00";
      return this.currency+$cash;
    },
    dispensed(){
      for(let clothe of this.customer.clothes){
        if (!clothe.dispensed_at) {
          return false;
        }
      }
      return true;
    }, 
    dispense(){
      $("#modal-dispense-btn"+this.customer.id)[0].setAttribute("data-kt-indicator", "on");
      $.ajax({
        url: `http://localhost:8080/customers/${this.customer.id}/dispense`, 
        method: "GET",
        data: {id: this.customer.id}, 
        success: (res)=>{
          console.log(res);
          if (res.status) {
            this.customer = res.data;
            //console.log("success"); 
            notify("success", "Done");
          }
        },
        error: (err)=>{
          console.log(err);
        } 
      }).always(()=>{
        $("#modal-dispense-btn"+this.customer.id)[0].removeAttribute("data-kt-indicator");
      });
    },
    //rename credit as change
    makePayment(){
      $("#modal-makepayment-btn"+this.customer.id)[0].setAttribute("data-kt-indicator", "on");
      //this.inputs.amount_paid = Number(this.inputs.amount_paid) +Number(this.customer.amount_paid) ;
      $.ajax({
        url: `http://localhost:8080/customers/${this.customer.id}/update`, 
        method: "POST",
        data: this.inputs,
        success: (res)=>{
          console.log(res);
          if (res.status) {
            notify("success", "Saved"); 
            this.customer = res.data;
          }
        },
        error: (err)=>{
          console.log(err);
        } 
      }).always(()=>{
        $("#modal-makepayment-btn"+this.customer.id)[0].removeAttribute("data-kt-indicator");
      });
    }, 
  }, 
  
  template: `
		<div class="col-md-4 col-lg-12 col-xxl-4">
		
      <div class="modal  fade" tabindex="-1" :id="'kt_modal_'+customer.id">
          <div class="modal-dialog  modal-dialog-centered">
              <div class="modal-content shadow-none">
                  <div class="modal-header">
                    <div class="d-flex justify-content-between flex-column" >
                      <h5 class="modal-title fs-2x">{{customer.name}}</h5>
                      <div class="" >
                        <span v-if="!dispensed()"  class="badge badge-lg badge-light-danger">
            					    Not dispensed
            				    </span>
                        <span v-else  class="badge badge-lg badge-light-success">
            					    Dispensed
            				    </span>
                      </div>
                    </div>
                      
                      <!--begin::Close-->
                      <div class="btn btn-icon btn-sm btn-active-light-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
                          <span class="fas fa-times text-danger fs-5"></span>
                      </div>
                      <!--end::Close-->
                  </div>
      
                  <div class="modal-body">
                    
                    <div class="row mb-5">
                      <div class="col-4">
                        <div class="card">
                          <div class="card-body p-3  card-rounded bg-light-success">
                            <div class="d-flex fw-bolder justify-content-center align-items-center flex-column"> 
                              <div>
                                <i class="fas fs-5 fa-tshirt"></i>
                                Clothes
                              </div>
                              <span>
                                {{customer.clothes.length}}
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-4">
                        <div class="card">
                          <div class="card-body p-3  card-rounded bg-light-success">
                            <div class="d-flex fw-bolder justify-content-center align-items-center flex-column"> 
                              <div>
                                <i class="bi bi-check2-square fs-5"></i>
                                Ready
                              </div>
                              <span>
                                {{readyClothes}}
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-4">
                        <div class="card">
                          <div class="card-body p-3  card-rounded bg-light-success">
                            <div class="d-flex fw-bolder justify-content-center align-items-center flex-column"> 
                              <div>
                                <i class="bi fs-5 bi-cash-stack "></i>
                                Cost 
                              </div>
                              <span>
                                {{cost}}
                              </span>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    
                    <div class="table-responsive mb-10" >
                      <table class="table table-hover">
                        <tr>
                          <td>Amount paid:</td>
                          <td v-if="!actions.pay">
                            {{money(customer.amount_paid)}}
                          </td>
                          <td v-else>
                            <div>
                              <input type="number" v-model="inputs.amount_paid" class="form-control form-control-sm">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>Debt:</td>
                          <td v-if="!actions.pay">
                            {{money(customer.debt)}}
                          </td>
                          <td v-else>
                            <div>
                              <input type="number" v-model="inputs.debt" class="form-control form-control-sm">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>Change:</td>
                          <td v-if="!actions.pay">
                            {{money(customer.credit)}}
                          </td>
                          <td v-else>
                            <div>
                              <input type="number" v-model="inputs.credit" class="form-control form-control-sm ">
                            </div>
                          </td>
                        </tr>
                        <tr v-if="!actions.pay">
                          <td>Status:</td>
                          <td>
                            <div>
                              <span :class="getStatusFlag" class="badge badge-lg">
                  					    {{customer.status}}
                  				    </span>
                            </div>
                          </td>
                        </tr>
                        <tr v-if="!actions.pay">
                          <td>Received date:</td>
                          <td>
                            {{date(customer.created_at.date)}}
                          </td>
                        </tr>
                        <tr v-if="customer.status=='ready' && !actions.pay" >
                          <td>Ready date:</td>
                          <td>
                            {{date(customer.updated_at.date)}}
                          </td>
                        </tr>
                        <tr v-if="customer.dispensed_at!=null && !actions.pay" >
                          <td>Dispensed date:</td>
                          <td>
                            {{date(customer.dispensed_at.date)}}
                          </td>
                        </tr>
                      </table>
                      <button v-if="!actions.pay" @click="actions.pay=true" class="btn btn-sm btn-primary" >
                        make payment
                      </button>
                      <div v-else class="">
                        <button @click="actions.pay=false" class="btn btn-sm btn-light" >
                          cancel
                        </button>
                        <button :id="'modal-makepayment-btn'+customer.id" @click="makePayment()" class="btn btn-sm btn-primary" >
                          <span class="indicator-label">
                            Save
                          </span>
                          <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                          </span> 
                        </button>
                      </div>
                    </div>
                    
                    <h1 class="fs-3 mb-3 mt-3">Clothe(s)</h1>
                    <div class="table-responsive">
											  <table class="table table-hover gs-3 gy-3 gx-3">
                            <thead>
                                <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                                    <th>id</th>
                                    <th>type</th>
                                    <th>status</th>
                                    <th>washed at</th>
                                    <th>ironed at</th>
                                    <th>dispensed at</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <clothe v-for="clothe in customer.clothes" :clothe="clothe"></clothe>
                            </tbody>
                            <tfoot>
                              <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                                    <th>id</th>
                                    <th>type</th>
                                    <th>status</th>
                                    <th>washed at</th>
                                    <th>ironed at</th>
                                    <th>dispensed at</th>
                                    <th></th>
                                </tr> 
                            </tfoot>
                        </table>
											</div> 
                  </div>
      
                  <div class="modal-footer">
                      <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                      <button @click="dispense()" v-if="paid()" :id="'modal-dispense-btn'+this.customer.id" type="button" class="btn btn-primary">
                        <span class="indicator-label">Dispense All</span>
                        <span class="indicator-progress">
                          Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span> 
                      </button>
                      <span class="btn-light-danger btn-link" v-else>Not paid</span>
                  </div>
              </div>
          </div>
      </div>
		
			<div class="card mb-0 mb-md-5 mb-lg-0 mb-xxl-8 overflow-hidden">
				<div class="card-body p-0 d-flex card-rounded bg-light-success">
					<div class="py-18 px-12">
						<h3 class="fs-2x">
							<a class="text-dark text-hover-primary fw-bolder" data-bs-toggle="modal" :data-bs-target="'#kt_modal_'+customer.id">{{customer.name}}</a>
						</h3>
						<div class="fs-3 text-grey-100 mb-5">{{customer.id}}</div>
					  <div class="fs-3 text-muted fw-bolder">{{cost}}</div>
					  <div class="fs-1 mb-3">
					    <span class="p me-6">
					      <i class="fas fa-tshirt fs-2x"></i>
					      {{customer.clothes.length}} 
					    </span>
					    <span class=""><i class="bi bi-check2-square fs-2x"></i> 
					      {{readyClothes}}
					    </span>
					  </div>
					  <span :class="getStatusFlag" class="badge badge-lg">
					    {{customer.status}}
				    </span>
					</div>
				</div>
			</div>
		</div>
  `
});   

Vue.component("clotheform", {
  props: ["index"], 
  data(){
    return {
      category: "undefined", 
      quantity: 1, 
      cost: 0, 
      categories:[
        {
          id: 1,
          name:"cardigan",
          cost: 500
        },
        {
          id: 2,
          name:"singlet", 
          cost: 100
        },
        {
          id: 3,
          name:"boxer",
          cost: 150
        },
        {
          id: 4,
          name: "trouser", 
          cost: 200
        },
        {
          id: 5,
          name: "short", 
          cost: 200
        },
        {
          id: 6,
          name: "polo", 
          cost: 200
        },
        {
          id: 7,
          name: "T-shirt", 
          cost: 200
        },
     ] 
    };
  }, 
  computed:{
    
  },
  
  methods:{
    calCost(eve){
      console.log(eve)
      if(this.category==="undefined") {
       console.log("called")
       return 0;
      } 
      let cat = this.categories.filter((e)=>{
        return e.id === this.category
      })[0];
      this.cost = this.quantity*cat.cost;
      let data = {
        index: this.index, 
        cost: this.cost
      };
      eventBus.$emit("clothe_cost", data);
    }
  }, 
  
  template: `
    <div class="mb-8 row justify-content-between align-items-end">
			<div class="col-5">
				<label class="fw-bolder">Category</label>
				<select required :name="'clothes['+index+'][type]'"  @change="calCost('select')" v-model="category" class="form-select form-select-solid form-select-lg" data-control="select2" data-placeholder="Select Category..." data-hide-search="true">
					<option class="capitalize" v-for="category in categories"  :value="category.id">{{category.name}}</option>
				</select>
			</div>
			<div class=" col-3">
				<label class="fw-bolder">Quantity</label>
				<input required :name="'clothes['+index+'][quantity]'" @input="calCost('qauntity')" v-model="quantity"  type="number" class="p-2 text-center form-control form-control-solid form-control-lg" placeholder="" />
			</div>
			<div class="col-4">
				<label class="fw-bolder">cost</label>
				<input  disabled :value="cost" type="text" class="p-2 text-center form-control form-control-solid form-control-lg" placeholder="" />
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
    customers: [],
    expenses: [],
    createClothesForm: [], 
    activitiesToday: [], 
    totalCost:0
  },
  
  mounted(){
    this.loadExpenses();
    this.getTodaysCustomers();
    setTimeout(()=> {
      this.searchDB(20,10);
    }, 5);
    eventBus.$on("clothe_cost",(data)=>{
      this.createClothesForm[data.index].cost = data.cost;
      this.calCost();
    });
  },
  
  computed:{
    totalExpenses(){
      if (this.expenses.length===0) {
        return 0;
      }
      return this.expenses.reduce((p,c)=>{
        return p+Number(c.cost);
      }, 0);
    }, 
    totalIncome(){
      if (this.activitiesToday.length===0) {
        return 0;
      }
      return this.activitiesToday.reduce((p,c)=>{
        return p+Number(c.amount_paid);
      }, 0);
    }
  },
  
  methods: {
    deleteLast(){
      this.createClothesForm.pop();
      this.calCost();
    },
    
    calCost(){
      this.totalCost = this.createClothesForm.reduce((p,c,i)=>{
        return p + c.cost;
      }, 0);
    }, 
    
    loadExpenses(){
      $.ajax({
        url: "http://localhost:8080/expenses/range", 
        method: "GET",
        data: {range:"today"}, 
        success: (res)=>{
          console.log("loaded");
          console.log(res);
          this.expenses = res
        },
        error: (err)=>{
          console.log(err);
        } 
      })
    }, 
    
    toTime($date){
      return (moment($date, 'YYYY-MM-DD HH:mm:ss')).format("hh:mm a");
    }, 
    
    createCustomer(){
      let form = $("#createCustomerForm");
      if (!form[0].checkValidity()) {
        return;
      }
      $("#create-customer-form-btn").attr("data-kt-indicator", "on");
      $("#create-customer-form-btn").attr("disabled", "disabled");
      $.ajax({
        url: "http://localhost:8080/customers", 
        method: "POST",
        data: form.serializeArray(), 
        success: (res)=>{
          console.log(res);
          if (res.status) {
            notify("success", "Saved");
            this. activitiesToday.push(res.data);
            form.removeClass("was-validated");
            form[0].reset();
            return true;
          }
          notify("error", "Error occured!");
        },
        error: (err)=>{
          console.log(err);
        } 
      }).always(()=>{
        $("#create-customer-form-btn").attr("data-kt-indicator", null);
        $("#create-customer-form-btn").attr("disabled", null);
      });
    },
    
    searchDB(limit, offset){
      
      $.ajax({
        url: "http://localhost:8080/search/customers", 
        method: "POST",
        data: {"limit":limit, "offset":offset, "q":this.inputs.search}, 
        success: (res)=>{
          console.log(res);
          if (offset == 0) {
            this.customers = [];
          }
          this.search.result = res;
          this.customers.push(...res);
        },
        error: (err)=>{
          console.log(err);
        } 
      }).always(()=>{
        $("#btn-product").attr("data-kt-indicator", null);
      });
            
    }, 
    
    getTodaysCustomers(){
      $.ajax({
        url: "http://localhost:8080/customers/range", 
        method: "GET",
        data: {range:"today"}, 
        success: (res)=>{
          console.log(res);
          this.activitiesToday = res;
        },
        error: (err)=>{
          console.log(err);
        } 
      });
            
    }, 
    
    saveExpenses(){
      console.log("saving expenses...");
      let form = $("#create-expenses-form");
      if (!form[0].checkValidity()) {
        return false;
      }
      
      $("#create-expenses-form-btn")[0].setAttribute("data-kt-indicator", "on");
      $.ajax({
        url: "http://localhost:8080/expenses", 
        method: "POST",
        data: form.serializeArray(), 
        success: (res)=>{
          console.log(res);
          if (res.status) {
            notify("success", res.message); 
            setTimeout(function() {
              form.removeClass("was-validated");
              form[0].reset();
            }, 900);
            this.expenses.push(res.data);
          }
           else notify("error", "Error saving expenses"); 
        },
        error: (err)=>{
          console.log(err);
          notify("error", "Error occured");
        } 
      }).always(()=>{
        setTimeout(function() {
          $("#create-expenses-form-btn")[0].removeAttribute("data-kt-indicator");
        }, 1000);
      });
    }, 
    
    addClotheToForm(){
      let obj = {
        cost:0,
      };
      this.createClothesForm.push(obj);
    }, 
    
  }
  // END OF DATA
})                                                                                                                                        