<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Encryptor;

class Search extends BaseController
{
	public function __construct()
	{
		$this->encryptor = new Encryptor();
	}
	
	function search($table){
	  # check for universal get & post CI method
	  $query = $this->request->getVar("q");
	  #$limit = $this->response->getPost("limit");
	  #$offset = $this->response->getPost("offset");
	  
	  if ($table === "customers") {
	    $search_result = $this->customers($query);
	  }elseif ($table === "users") {
	    $search_result = $this->users($query);
	  }elseif ($table === "clothes") {
	    $search_result = $this->clothes($query);
	  }elseif ($table === "issues") {
	    $search_result = $this->issues($query);
	  }elseif ($table === "expenses") { 
	    $search_result = $this->expenses($query);
	  }else{
	    throw new \CodeIgniter\Exceptions\PageNotFoundException($table);
	  }
	  
	  return $this->response->setJson($search_result);
	} 
	
	private function users($search){
	  $users = model("userModel");
	  return $users->select("users.id, users.name, users.username, auth_groups_users.group_id AS role")
	        ->like("name", $search)
	        ->orlike("username", $search)
	        ->where("auth_groups_users.user_id !=", 1)
	        ->join("auth_groups_users", "auth_groups_users.user_id = users.id")
	        ->get()->getResultObject();
	}
	
	private function customers($search){
	  $offset = $this->request->getVar("offset") ?? 0;
	  $limit = $this->request->getVar("limit")  ?? 50;
	  
	  return (model("CustomerModel"))->getCustomersLike($search, $limit, $offset);
	}
	
	private function clothes($search){
    $offset = $this->request->getVar("offset") ?? 0;
	  $limit = $this->request->getVar("limit")  ?? 50;
    
    $clothes = model("ClothesModel");
	  return $clothes->like("type", $search)
	        ->orlike("id", $this->getExact($search))
	        ->orderBy("id", 'ASC') 
	        ->findAll($limit, $offset);
	}
	
	private function expenses($search){
	  $customers = $this->db->table("expenses");
	  return $customers->select("expenses.*, users.name AS employee")
	        ->like("name", $search)
	        ->orlike("description", $search)
	        ->orlike("cost", $search)
	        ->join("users", "users.id = expenses.employee_id")
	        ->get()->getResultObject();
	}
	
	private function issues($search){
	  $offset = $this->request->getVar("offset") ?? 0;
	  $limit = $this->request->getVar("limit")  ?? 50;
    
    $clothes = model("IssuesModel");
	  return $clothes->like("description", $search)
	        #->orlike("title", $search)
	        ->orlike("id", $search)
	        ->orderBy("id", 'ASC') 
	        ->findAll($limit, $offset);
	}
	
	private function getExact($variable){
	  if (gettype($variable) === "string") {
	    return $this->encryptor->decode($variable);
	  }
	  return $variable;
	}
}
                                                                                   
