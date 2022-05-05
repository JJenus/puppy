<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class App extends BaseController
{
  use \Myth\Auth\AuthTrait; 
  
  public function __construct(){
    $this->session = service('session');

		$this->config = config('Setup');
		$this->auth = service('authentication'); 
		
		$this->setupAuthClasses();
		
		$this->data = [
		  'config' => $this->config, 
		  'user'  => $this->authenticate->user()
		]; 
  } 
  
  public function index(){
    return view($this->config->views["main"], $this->data);     
  }
  
  public function trials(){
    return view("trials", $this->data);     
  }
  
  public function puppies(){
    return view("puppies", $this->data);     
  }
  public function showPuppy($id){
    $this->data["puppy_id"] = $id;
    return view("puppy", $this->data);     
  }
  
  public function userData(){
	  $user = $this->authenticate->user();
	  $data = [
	    "name" => $user->name, 
	    "username" => $user->username, 
	    "email" => $user->email, 
	    "roles" => $user->getRoles(),
	    "permissions" => $user->getPermissions()
	  ];
	   return $this->response->setJson([
	     "status"=>"ok", 
	     "data" => $data
	   ]);
	} 
	
	public function dashboard($page=null){
	  $this->data["page"] = $page;
	  if (!$page) {
	    return view ("dashboard/overview", $this->data);
	  }
	  
	  if ( ! is_file(APPPATH.'/Views/dashboard/'. $page. '.php')){
        // Whoops, we don't have a page for that!
        throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    }
	  return view ("dashboard/".$page, $this->data);
	} 
	
	public function user($page="collections"){
	  if (!$this->auth->check())
		{
			return redirect()->to(route_to("login"));
		}
	  $this->data["page"] = $page;
	  if (!$page) {
	    return view ("user/details", $this->data);
	  }
	  
	  if ( ! is_file(APPPATH.'/Views/user/'. $page. '.php')){
        // Whoops, we don't have a page for that!
        throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    }
	  return view ("user/".$page, $this->data);
	} 

}

                                                                    
