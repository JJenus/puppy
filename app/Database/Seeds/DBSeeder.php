<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Entities\User;

class DBSeeder extends Seeder
{
  use \Myth\Auth\AuthTrait;
  public $users = [];
  public $businesses = [];
  public $adminCount = 0;
  
	public function run()
	{
	  $this->setup = json_decode(file_get_contents(WRITEPATH."cache/setup.json"));
	  $this->setupAuthClasses(); 
	  $this->makeUsers();
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
                                                                                                                                                                                            