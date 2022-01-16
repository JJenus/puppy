<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Encryptor;

class Accounts extends BaseController
{
  use \Myth\Auth\AuthTrait;
  
  public function __construct(){
    $this->setupAuthClasses();
    $this->customers = (model("CustomerModel"));
  }
  
	public function index()
	{
	  $offset = $this->request->getVar("offset") ?? 0;
	  $limit = $this->request->getVar("limit")  ?? 50;
	  if ($this->request->getVar("limit")!==null) {
	    $res = $this->customers->findAll($limit, $offset);
	  }else $res = $this->customers->findAll();
	  
		return $this->response->setJson($res);
	}
	
	public function statistics(){
	  $this->setDates();
	  $date = $this->request->getGet("date");
	  
	  if(isset($this->range[$date])){
	    $start = $this->range[$date]["start"];
	    $end = $this->range[$date]["end"];
	  
  	  $res = $this->customers
	                 #->select("strftime('%m', created_at) as month")
	                 ->selectSum("total_cost")
	                 ->selectSum("amount_paid")
	                 ->where("created_at >=", $start)
	                 ->where("created_at <=", $end)
	                 ->orderBy("created_at")
	                 ->findAll();
	    $expenses = (model("ExpensesModel"))
	                 ->selectSum("cost")
	                 ->where("created_at >=", $start)
	                 ->where("created_at <=", $end)
	                 ->orderBy("created_at")
	                 ->findAll();
  	} else{
  	  $res = $this->customers
	                 #->select("strftime('%m', created_at) as month")
	                 ->selectSum("total_cost")
	                 ->selectSum("amount_paid")
	                 ->orderBy("created_at")
	                 ->findAll();
	    $expenses = (model("ExpensesModel"))
	                 ->selectSum("cost")
	                 ->orderBy("created_at")
	                 ->findAll(); 
  	}
  	$res = $res[0];
  	$returns = $res->total_cost - $expenses[0]->cost ?? 0;
  	$returns_label = $returns > 0? "profit":"loss";
  	
	  $res = [
	    "possible_returns" => $res->total_cost ?? 0, 
	    "revenue" => $res->amount_paid ?? 0,
	    "expenses" => $expenses[0]->cost ?? 0,
	    "$returns_label" => abs($returns) 
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
	  $this->customers->delete($id);
	}
}
                                                                                                                                       