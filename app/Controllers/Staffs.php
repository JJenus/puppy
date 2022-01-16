<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Staffs extends BaseController
{
  use \Myth\Auth\AuthTrait;
  
  public function __construct(){
		$this->users = new UserModel();
		$this->setupAuthClasses();
  }
  
	public function index()
	{
	  $top = $this->request->getGet("top");
	 
	  $result = $this->users
	            ->select("users.*, 
	                  employees.image_url,
	                  employees.address,
	                  employees.gender,
	                  employees.phone,
	                  employees.bank,
	                  employees.account_number,
	                  employees.account_name,
	                  employees.city,
	              ")
	            ->join('employees', 'employees.user_id = users.id', 'left') 
	            ->findAll();
	  foreach ($result as $key => $val){
	    $result[$key] = $result[$key]->init();
	  } 
	  if ($top != null) {
	    $users = [];
	    $count = model("ClothesModel")->countAllResults(); 
	    foreach ($result as $user){
  	    foreach ($user->roles as $role) {
  	      if($top==="drycleaners"){
    	      if ($role === "washer" || $role === "ironer") {
    	        $reps = $this->reports($user->id);
    	        $per = ($this->comparable($reps)/$count) * 100;
    	        $reps["percentage"] = floatval(number_format($per, 1, ".", ","));
    	        $user->reports = $reps;
  	         
    	        $users[] = $user;
    	        break;
    	      }
  	      } 
  	      if ($role === $top) {
  	        $reps = $this->reports($user->id);
  	        $per = ($this->comparable($reps)/$count) * 100;
  	        $reps["percentage"] = floatval(number_format($per, 1, ".", ","));
  	        $user->reports = $reps;
  	         
  	        $users[] = $user;
  	        break;
  	      }
  	    }
  	  } 
  	  #sort
	    usort($users, fn($a, $b) => $this->comparable($b->reports) - $this->comparable($a->reports));
	    if(count($users)>3){
        $i_users=[];
	      for($i = 0; $i<3; $i++){
	        $i_users[] = $users[$i];
	      } 
	      $users = $i_users;
	    }
	    $result = $users;
	  }
    return $this->response->setJson($result);
	}
	
	public function update($id){
	  $update = $this->request->getPost("update");
		if ($update === "info") {
		  $data = $this->request->getPost($this->users->allowedFields);
		}else 
		  $data = $this->request->getPost((model("EmployeeModel"))->allowedFields);
	 
	  $id = $this->authenticate->user()->id;
	  
	  $required = [];
	  foreach ($data as $key => $value) {
	    if($value !== null)
	      $required[$key] = $value;
	  }
	  
	  if ($update === "info") {
	    if (!$this->users->update($id, $required)) {
  	    return $this->response->setJson([
  	       "status" => false, 
  	       "errors" => $this->users->errors(), 
  	     ]);
  	  }
  	  return $this->response->setJson([
	       "status" => "ok", 
	       "data" => $this->users->find($id), 
	     ]);
	  } else {
	    $model = model("EmployeeModel");
	    
	    if (!$model->where("id", $id)->update($required)) {
  	    return $this->response->setJson([
  	       "status" => false, 
  	       "errors" => $model->errors(), 
  	     ]);
  	  }
  	  
  	  return $this->response->setJson([
	       "status" => "ok", 
	       "data" => $model->find($id), 
	     ]);
	  }
	  
	  
	  
	}
	                                                                                                                                              
	
	public function comparable($reports):int{
	  if (isset($reports["clothes"])) {
	    return $reports["clothes"];
	  } 
	  if (isset($reports["washed"])){
	    return $reports["washed"];
	  }
	  if (isset($reports["ironed"])){
	    return $reports["ironed"];
	  }
	  if (isset($reports["dispensed"])){
	    return $reports["dispensed"];
	  }
	  if (isset($reports["customers"])){
	    return $reports["customers"];
	  }
	  return 0;
	} 
	
	public function staff($id){
	  $res = $this->users
	         ->find(intval($id));
	  return $this->response->setJson($res);
	} 
	
	public function activities(){} 
	
	public function report($userId){
	  $response = $this->reports($userId);
	  return $this->response->setJson($response);
	} 
	
	public function reports($userId){
	  $response = [];
	  $customers = model("CustomerModel")
	            ->where("created_by", $userId)
	            ->countAllResults();
	            
      if (!empty($customers)) {
        $response["customers"] = $customers;
      }
	            
      $clothes = model("ClothesModel")
              ->join ("customers", "customers.id = clothes.customer_id", "left")
              ->where("customers.created_by", $userId)
              ->countAllResults();
      if (!empty($clothes)) {
        $response["clothes"] = $clothes;
      }
              
      $dispensed = model("ClothesModel")
              ->where("dispensed_by", $userId)
              ->countAllResults();
              
      if (!empty($dispensed)) {
        $response["dispensed"] = $dispensed;
      }
              
      $washed = model("ClothesModel")
              ->selectCount("washer")
              ->where("washer", $userId)
              ->countAllResults();
              
      if (!empty($washed)) {
        $response["washed"] = $washed;
      }
              
      $ironed = model("ClothesModel")
              ->selectCount("ironer")
              ->where("ironer", $userId)
              ->countAllResults();
              
      if (!empty($ironed)) {
        $response["ironed"] = $ironed;
      }
              
      $confirmed = model("ClothesModel")
              ->selectCount("confirmed_by")
              ->where("confirmed_by", $userId)
              ->countAllResults();
      if (!empty($confirmed)) {
        $response["confirmed"] = $confirmed;
      }
      
      return $response;
	} 
}
