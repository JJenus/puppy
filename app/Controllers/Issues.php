<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Encryptor;

class Issues extends BaseController
{
  use \Myth\Auth\AuthTrait;
  
  public function __construct(){
    $this->setupAuthClasses();
    $this->model = (model("IssuesModel"));
  }
  
	public function index()
	{
	  $offset = $this->request->getVar("offset") ?? 0;
	  $limit = $this->request->getVar("limit")  ?? 50;
	  if ($this->request->getVar("limit")!==null) {
	    $res = $this->model->findAll($limit, $offset);
	  }else $res = $this->model->findAll();
	  
		return $this->response->setJson($res);
	}
	
	public function create(){
	  $Issues = $this->request->getPost($this->model->allowedFields);
	  $Issues["created_by"] = $this->authenticate->user()->id;
	  $Issues["created_at"] = date("Y-m-d h:i:s");
	  if (!$this->model->insert($Issues)) {
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
	  $Issue = $this->request->getPost($this->model->allowedFields);
	  $id = $this->request->getPost("id");
	  $Issue["clothe_id"] = (new Encryptor())->decode($Issue["clothe_id"]);
	  $reverb = [];
	  foreach ($Issue as $key => $value) {
	    if($value !== null)
	      $reverb[$key] = $value;
	  }
	  
	  if (!$this->model->update($id, $reverb)) {
	    return $this->response->setJson([
	       "status" => false, 
	       "errors" => $this->model->errors(), 
	     ]);
	  }
	  
	  return $this->response->setJson([
	       "status" => "ok", 
	       "data" => $this->model->find($id), 
	     ]);
	}
	
	public function statistics(){
	  $this->setDates();
	  $date = $this->request->getGet("date");
	  
	  if(isset($this->range[$date])){
	    $start = $this->range[$date]["start"];
	    $end = $this->range[$date]["end"];
	  
  	  $issueCount = $this->model 
  	                ->where("created_at >= ", $start)
  	                ->where("created_at <= ", $end)
  	                ->countAllResults();
  	                
  	  $resolvedCount = $this->model 
  	                ->where("resolved_at != ", null)
  	                ->where("created_at >= ", $start)
  	                ->where("created_at <= ", $end)
  	                ->countAllResults();
	} else{
	  $issueCount = $this->model->countAllResults();
  	$resolvedCount = $this->model 
  	                ->where("resolved_at !=", null)
  	                ->countAllResults(); 
	} 
	  $res = [
	    "issues" => $issueCount, 
	    "resolved" => $resolvedCount,
	    "unresolved" => $issueCount - $resolvedCount, 
	  ];
	  
	  return $this->response->setJSON($res);
	} 
	
	public function setDates(){
	  $week =  date("Y-m-d 00:00:00", strtotime('this week', time())) ;
	  $month = date("Y-m-01 00:00:00");
	  $yesterday = date("Y-m-d 00:00:00", strtotime('yesterday', time()));
	  $lastmonth = date("Y-m-01 00:00:00", strtotime('last month', time()));
	  $lastweek = date("Y-m-d 00:00:00", strtotime('last week', time())); 
		
		$this->range = [
	      "today" => [
	        "start" => date("Y-m-d 00:00:00", strtotime('today', time())),
	        "end" => date("Y-m-d 23:59:59", strtotime('today', time())),
	       ], 
	      "week" => [
	        "start" => $week, 
	        "end" => date("Y-m-d 23:59:59", strtotime($this->customDate($week, "+6", "day"))) , 
	      ], 
	      "month" => [
	        "start" => $month, 
	        "end" => date("Y-m-t 23:59:59"), 
	      ], 
	      "yesterday" => [
	        "start" => $yesterday, 
	        "end" => date("Y-m-d 23:59:59", strtotime($yesterday)), 
	      ], 
	      "lastweek" => [
	        "start" => $lastweek, 
	        "end" => date("Y-m-d 23:59:59", strtotime ($this->customDate($week, "-1", "day"))), 
	      ], 
	      "lastmonth" => [
	        "start" => $lastmonth, 
	        "end" => date("Y-m-t 23:59:59", strtotime($lastmonth)), 
	      ], 
	    ];
	}
	
	public function customDate($date, $count, $type){
	  $randDate = new \DateTime($date);
	  $randDate->modify("$count $type");
    return $randDate->format('Y-m-d H:i:s');
	} 
	
	public function delete($id){
	  $this->model->delete($id);
	}
}
                                                                                                                                      