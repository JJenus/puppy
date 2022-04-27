<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Interactions extends Seeder
{
  
	public function run()
	{
	  $puppies = $this->loadPuppies();
	  foreach ($puppies as $puppy){
	    $views = random_int(0, 9);
	    $impressions = random_int(0, 13);
	    $vmodel = model("ViewModel");
	    $vmodel->protect(false);
	    $imodel = model("ImpressionModel");
	    $imodel->protect(false);
	    for($i = 0; $i < $views; $i++){
	      $vmodel->insert($this->createInteraction($puppy));
	    } 
	    for($i = 0; $i < $impressions; $i++){
	      $imodel->insert($this->createInteraction($puppy));
	    } 
	  } 
	}
	
	
	private function loadPuppies(){
	  $puppies = (model("PuppyModel"))
	           ->select("id")->findAll();
	  return $puppies;
	} 
	
	private function createInteraction($dogo):Array{
      $date = $this->customDate(date("Y-m-d h:i:s"), "-".random_int(0,30));
      $interaction = [
        "puppy_id" => $dogo->id, 
        "ip_address" => static::faker()->ipv4, 
        "created_at" => $date, 
        "updated_at" => $date, 
      ];
      return $interaction;
	}
	
	
	public function customDate($date, $days){
	  $randDate = new \DateTime($date);
	  $randDate->modify("$days day");
    $randDate->setTime(mt_rand(7, 21), mt_rand(0, 59));
    return $randDate->format('Y-m-d H:i:s');
	} 
	
	private function log($data){
	  if (gettype($data) === "array") {
	    $txt = "";
	    foreach ($data as $value)
	      $txt .= $value."\n";
	    $data = $txt;
	  }
	  $log = fopen(WRITEPATH."logs/logs.log", "a+");
	  fwrite($log, "\n\n".$data);
	  fclose($log);
	} 
}
