<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Puppies extends Seeder
{
	public function run()
	{
		$puppies = json_decode(file_get_contents(WRITEPATH. "uploads/dogo.json"));
    $model = model("PuppyModel");
   # $model->protect(false);
    $users = $this->loadLegibleUsers();
		foreach ($puppies as $dogo){
		  $puppy = $this->createPuppy($dogo);
		  $puppy["created_by"] = $users[random_int(0,count($users)-1)]->id;
  		$model->setMedia($puppy["media"]);
		  if (!$model->save($puppy)) {
		    $this->log($model->errors);
		  }
		} 
	}
	
	private function loadLegibleUsers(){
	  $users = (model("UserModel"))
	           ->select("id")->findAll();
	  $legibleUsers = [];
	  foreach ($users as $user){
	    foreach($user->roles as $role){
	      if($role === "manager" || $role === "admin")
	        $legibleUsers[] = $user;
	    } 
	  }
	  
	  return $legibleUsers;
	} 
	
	private function createPuppy($dogo):Array{
     
      $gender = (["male", "female"])[random_int(0,1)];
      $name = static::faker(['en_US'])->firstname($gender);
      $videos = [
        "uploads/dogo_1.mp4", 
        "uploads/dogo_2.mp4", 
        "uploads/dogo_3.mp4", 
      ];
      $date = $this->customDate(date("Y-m-d h:i:s"), "-".random_int(0,30));
      $puppy = [
        "name" => $name, 
        "gender" => $gender, 
        "color" => static::faker()->safeColorName, 
        "age" => random_int(7,400), 
        "height" => $dogo->breeds[0]->height->metric, 
        "weight" => $dogo->breeds[0]->weight->metric, 
        "media" => [
          "photos" => [
            [
              "url"=> $dogo->url, 
              "ranking"=> 1, 
              "path"=> "absolute"
            ], 
            [
              "url"=> "http://placeimg.com/640/480/animals", 
              "ranking"=> 2, 
              "path"=> "absolute"
            ], 
            [
              "url"=> "http://placeimg.com/640/480/animals", 
              "ranking"=> 3, 
              "path"=> "absolute"
            ], 
            [
              "url"=> "http://placeimg.com/640/480/animals", 
              "ranking"=> 4, 
              "path"=> "absolute"
            ], 
          ],        
          "videos" => [
             [
              "url"=> $videos[random_int(0,count($videos)-1)], 
              "ranking"=> 4, 
              "path"=> "relative"
            ],  
          ],   
        ],      
        "breed" => $dogo->breeds[0]->name, 
        "price" => random_int(10000,200000), 
        "description" => $dogo->breeds[0]->temperament, 
        "created_at" => $date, 
        "updated_at" => $date, 
      ];
      /**
       * TODO:
      */
      
      return $puppy;
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
              