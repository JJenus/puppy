<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Entities\User;

class Users extends Seeder
{
  use \Myth\Auth\AuthTrait;
  public $adminCount = 0;
  
	public function run()
	{
		#create users
		$this->setup = json_decode(file_get_contents(WRITEPATH."cache/setup.json"));
	  $this->setupAuthClasses(); 
	  $this->adminCount = 2; 
  	$count = random_int(7, 20);
  	$this->log("$count users to be created. @".date("Y-m-d h:i:s"));
		$userModel = model("UserModel");
  	for ($i = 0; $i < $count; $i++) {
  		
  		$generatedUser = $this->generateUser();
  		$user = new User($generatedUser);
  		$userModel->withGroup($generatedUser["role"]);
  		
  		if(!$userModel->save($user)){
  		  $this->log($userModel->errors());
  		}else{
  		  $this->saveUser($generatedUser);
  		  $generatedUser["user_id"] = $userModel->insertID();
  		  (model("AddressModel"))->save($generatedUser);
  		} 
  	} 
	}
	
	private function generateUser():Array{
     $username = "";
     do{
       $username = static::faker()->username;
       $result = model("UserModel")
                 ->select("name")
                 ->where("username", $username)->get()->getResult();
      } while(count($result)>0 || isset($this->users[$username]) || empty($username));
      
      if ($this->adminCount<2) {
        $this->adminCount++;
        $role = $this->setup->groups[0]->role;
      }else {
        $role = $this->setup->groups[
          random_int(1, count($this->setup->groups)-1)
        ]->role;
      } 
      
      $gender = (["male", "female"])[random_int(0,1)];
      $name = static::faker(['it_IT', 'en_US'])->name($gender);
      
      $user = [
        "role" => $role, 
        "name" => $name, 
        "gender" => $gender, 
        "username" => $username, 
        "email" => static::faker()->email, 
        "phone" => static::faker()->phoneNumber, 
        "password" => static::faker()->word, 
        "photo" => static::faker()->imageUrl($width = 640, $height = 480, $category = "human", $randomize = true, $word = null, $gray = false),        
        "address" => static::faker()->streetAddress, 
        "city" => static::faker()->city, 
        "country" => static::faker()->country, 
        "bank" => static::faker()->company, 
      ];
      /**
       * TODO:
      */
      
      return $user;
	}
	
	public function saveUser($user){
	  $data = json_decode(file_get_contents(WRITEPATH."uploads/fakeusers.json"), true);
	  $data[$user["username"]] = $user;
	  
	  file_put_contents(WRITEPATH."uploads/fakeusers.json", json_encode($data, JSON_PRETTY_PRINT));
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
