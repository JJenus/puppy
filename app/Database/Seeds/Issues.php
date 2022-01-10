<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Issues extends Seeder
{
	public function run()
	{
		//
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
