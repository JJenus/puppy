<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClothesModel;
use App\Libraries\Encryptor;

class Clothes extends BaseController
{
  use \Myth\Auth\AuthTrait;
  
  public function customDate($date, $count, $type){
	  $randDate = new \DateTime($date);
	  $randDate->modify("$count $type");
    $randDate->setTime(mt_rand(7, 21), mt_rand(0, 59));
    return $randDate->format('Y-m-d H:i:s');
	} 
  
	public function __construct()
	{
		$this->model = new ClothesModel();
		$this->setupAuthClasses();
		
	}
	
	private function getId($str){
	  return (new Encryptor())->decode($str);
	}
	
	public function stats($val){
	  $this->setDates();
	  
	  if ("all" === strtolower($val)) {
	    $res = ["clothes"=>null, "ironed" =>null, "dispensed"=>null, "washed"=>null];
	    foreach ($res as $key => $el){
	      $res[$key] = $this->getStats($key);
	    } 
	  }else $res = ["$val" => $this->getStats($val)];
	  
	  
	  return $this->response->setJson($res);
	}
	
	private function getStats($which){
	  $date = $this->request->getGet("date");
	  $start = $this->range[$date]["start"];
	  $end = $this->range[$date]["end"];
	 
	  if ($which == "clothes") {
	    $res = $this->model 
	                ->where("created_at >= ", $start)
	                ->where("created_at <= ", $end)
	                ->countAllResults();
	  } else {
	    $res = (model("ClotheActivities")) 
	            ->where($which."_at !=", null)
	            ->where("created_at >= ", $start)
	            ->where("created_at <= ", $end)
	            ->countAllResults();
	  } 
	  
	  /*$res = [
	      "start" => $start, 
	      "end" => $end, 
	    ];*/
	  return $res;
	} 
	
	public function dispense($clothe_id){
	  $clothe_id = $this->getId($clothe_id);
	  
	  $data = [
	      "dispensed_by" => $this->authenticate->user()->id, 
	      "status" => "dispensed", 
	      "updated_at" => date("Y-m-d h:i:s"), 
	   ];
	  
	  $this->model
	       ->update($clothe_id, $data);
	       
	  $activities = model("ClotheActivities");
	  
	   if (empty($activities->where("clothe_id", $clothe_id)->findAll())) {
  	    $activities->insert(
    	     [
    	       "clothe_id"=>$clothe_id, 
    	       "dispensed_at"=>date("Y-m-d h:i:s"), 
    	     ]
  	    );
  	  }else {
	    $activities
	         ->set("dispensed_at", date("Y-m-d h:i:s"))
	         ->where("clothe_id", $clothe_id)
	         ->where("dispensed_at", null)
	         ->update();
  	  }  
  	  
    return $this->response->setJSON(["status"=>"success", "data"=>$this->model->getClothe($clothe_id)]); 
	}
	
	public function wash($clothe_id){
	  /**
	   * check CI docs for better update
	   * queries 
	  */
	  $clothe_id = $this->getId($clothe_id);
	  
	  $data = [
	      "washer" => $this->authenticate->user()->id, 
	      "status" => "washed", 
	      "updated_at" => date("Y-m-d h:i:s"), 
	   ];
	  
	  $this->model
	       ->update($clothe_id, $data);
	              
	  $activities = model("ClotheActivities");
	  
	   if (empty($activities->where("clothe_id", $clothe_id)->findAll())) {
  	    $activities->insert(
    	     [
    	       "clothe_id"=> $clothe_id, 
    	       "washed_at"=>date("Y-m-d h:i:s"), 
    	     ]
  	    );
  	  } else {
	    $activities
	         ->set("washed_at", date("Y-m-d h:i:s"))
	         ->where("clothe_id", $clothe_id)
	         ->where("washed_at", null)
	         ->update();
  	  } 
  	  
  	return $this->response->setJSON(["status"=>"success", "data"=>$this->model->getClothe($clothe_id)]); 
	} 
	
	public function iron($clothe_id){
	  $clothe_id = $this->getId($clothe_id);
	  
	  $data = [
	      "ironer" => $this->authenticate->user()->id, 
	      "status" => "ironed", 
	      "updated_at" => date("Y-m-d h:i:s"), 
	   ];
	  
	  $this->model
	       ->update($clothe_id, $data);
	              
	  $activities = model("ClotheActivities");
	  
	   if (empty($activities->where("clothe_id", $clothe_id)->findAll())) {
  	    $activities->insert(
    	     [
    	       "clothe_id"=> $clothe_id, 
    	       "ironed_at"=>date("Y-m-d h:i:s"), 
    	     ]
  	    );
  	  }else {
	    $activities
	         ->set("ironed_at", date("Y-m-d h:i:s"))
	         ->where("clothe_id", $clothe_id)
	         ->where("ironed_at", null)
	         ->update();
  	  }
  	  
  	 return $this->response->setJSON(["status"=>"success", "data"=>$this->model->getClothe($clothe_id)]); 
	} 
	
	public function confirm($clothe_id){
	  $this->model
	              ->where("id", $clothe_id)
	              ->update("confirmed_by", user()->id);
	              
	  $this->db->table("clothe_activities")
	              ->where("clothe_id", $clothe_id)
	             ->update("ready_at", "now");
	} 
	
	public function categories(){
	  $option = $this->request->getGet("stats");
	  
	  $res = (model("ClotheCategories"))->findAll();
	  
	  if (isset($option)) {
	    foreach ($res as $ki => $val){
	      $count = $this->model
	               ->where("type", $val->id)
	               ->countAllResults();
	      $res[$ki]->count = $count;
	    } 
	  }
	  return $this->response->setJson($res);
	}
	
	public function setDates(){
	  $week =  date("Y-m-d 00:00:00", strtotime('this week', time())) ;
	  $month = date("Y-m-1 00:00:00", strtotime('this month', time()));
	  $yesterday = date("Y-m-d 00:00:00", strtotime('yesterday', time()));
	  $lastmonth = date("Y-m-1 00:00:00", strtotime('last month', time()));
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
	        "end" => date("Y-m-t 23:59:59", strtotime($month)), 
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
}
                                                                                        