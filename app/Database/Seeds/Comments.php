<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Comments extends Seeder
{
  public $model;
  
  
	public function run()
	{
	  $puppies = (model("PuppyModel"))->select("id")->findAll();
	  $users = $this->loadLegibleUsers();
	  $cmodel = model("CommentModel");
	  $cmodel->protect(false);
	  
	  foreach($puppies as $puppy){
	    $comments = random_int(0,6);
	    for ($i = 0; $i < $comments; $i++) {
	      $user = $users[random_int(0, count($users)-1)];
	      $comment = $this->createComment($puppy, $user);
	      $cmodel->insert($comment);
	    }
	  } 
	}
	
	private function loadLegibleUsers(){
	  $users = (model("UserModel"))
	           ->select("id")->findAll();
	  $legibleUsers = [];
	  foreach ($users as $user){
	    foreach($user->roles as $role){
	      if($role === "user")
	        $legibleUsers[] = $user;
	    } 
	  }
	  
	  return $legibleUsers;
	}
	
	private function createComment($dogo, $user):Array{
      $date = $this->customDate(date("Y-m-d h:i:s"), "-".random_int(0,30));
      $interaction = [
        "puppy_id" => $dogo->id, 
        "user_id" => $user->id, 
        "comment" => static::faker(["en_US"])->paragraph, 
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
