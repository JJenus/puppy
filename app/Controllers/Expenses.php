<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Expenses extends BaseController
{
  use \Myth\Auth\AuthTrait;
  
  public function __construct(){
    $this->setupAuthClasses();
    $this->model = (model("ExpensesModel"));
  }
  
	public function index()
	{
	  $offset = $this->request->getVar("offset") ?? 0;
	  $limit = $this->request->getVar("limit")  ?? 50;
	  
		return $this->model->findAll($limit, $offset);
	}
	
	public function create(){
	  $expenses = $this->request->getPost($this->model->allowedFields);
	  $expenses["employee_id"] = $this->authenticate->user()->id;
	  $expenses["created_at"] = date("Y-m-d h:i:s");
	  if (!$this->model->insert($expenses)) {
	    return $this->response->setJson([
	       "status" => false, 
	       "errors" => $this->model->errors(), 
	     ]);
	  }
	  
	  return $this->response->setJson([
	       "status" => "ok", 
	       "message" => "success",
	       "data" => $this->model->find($this->model->insertID())
	     ]);
	}
	
	public function update(){
	  $expenses = $this->request->getPost($this->model->allowedFields);
	  
	  if (!$this->model->update($expenses)) {
	    return $this->response->setJson([
	       "status" => false, 
	       "errors" => $this->model->errors(), 
	     ]);
	  }
	  
	  return $this->response->setJson([
	       "status" => "ok", 
	       "message" => "success", 
	     ]);
	}
	
	public function inRange(){
	  $range = $this->request->getVar("range") ?? "today";
	  $res = null;
	  if ($range === "today") {
	    $today = date("Y-m-d 00:00:00");
	    $res = $this->model
	         ->where("created_at >=", $today) 
	         ->findAll();
	  }
	  
	  return $this->response->setJSON($res);
	} 
	
	public function delete($id){
	  $this->model->delete($id);
	}
}
                                                                                                                                      