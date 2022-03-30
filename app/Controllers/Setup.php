<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Entities\User;

class Setup extends BaseController
{
  use \Myth\Auth\AuthTrait;
  private $setup;
  
  public function __construct(){
    $this->setup = json_decode(file_get_contents(WRITEPATH."cache/setup.json"));
    if (empty($this->setup) || $this->setup->installed) {
      return redirect()->to(route_to("home"));
    }
  }
  
	public function index()
	{
	  // check if setup is done already;
	  return view("setup");
	}
	
	public function isInstalled(){
	  return $this->setup->installed;
	}
	
	private function saveProcess(){
	  file_put_contents(WRITEPATH."cache/setup.json", json_encode($this->setup, JSON_PRETTY_PRINT));
	}
	
	
	public function install(){
	  /**
	   * check response codes for failed cases
	  */
	  return $this->response->setJSON($this->startProcess());
	}
	
	public function startProcess(){
	  $migrate = $this->migrate();
		if ($migrate) {
		  $this->setupAuthClasses();
		  if($this->createPermissions()){
		    if ($this->createUserGroups()) {
		      #Give Admin permissions
		      foreach ($this->setup->permissions as $group) {
  		      if (!$this->authorize->addPermissionToGroup($group->permission, 'admin')) {
  		        return ["Failed to setup admin privileges."];
  		      }
		      }
		      $this->authorize->addPermissionToGroup("app.manage", 'manager');
		      $this->authorize->addPermissionToGroup("app.account.user", 'user');
		      
		      return ["done"];
		    }
		    return ["Failed to setup user roles."];
		  }
	    return ["Failed to setup app permissions."];
		}
	} 
	
	public function reInstall(){
	  # Rollback then
	  foreach ($this->setup as $key => $value) {
	    if ($key !== "groups" && $key !== "permissions") {
	      $this->setup->$key = false;
	    }else {
    	  foreach ($this->setup->$key as $ikey => $value) {
    	    $this->setup->$key[$ikey]->status = false;
    	  }
	    } 
	  }
	  
	  if ($this->rollbackMigrate()) {
	    return $this->response->setJson($this->startProcess());
	  }
	  return $this->response->setJson(["failed"]);
	}
	
	private function migrate(){
	  if ($this->setup->migrated)
	    return true;
	  $migrate = \Config\Services::migrations();
    try
    {
      if ($migrate->latest()) {
        $this->setup->migrated = true;
        $this->saveProcess();
        return true;
      } else {
       return "Unknown error occurred";
      }
    }
    catch (\Throwable $e)
    {
      return $e;
    } 
	}
	
	private function rollbackMigrate(){
	  $migrate = \Config\Services::migrations();
    try
    {
      if ($migrate->regress(0)) {
        return true;
      } else {
       return "Unknown error occurred";
      }
    }
    catch (\Throwable $e)
    {
      return $e;
    } 
	}
	
	private function createPermissions(){
	  if ($this->setup->createPermissions)
	    return true;
	    
	  $permissions = $this->setup->permissions;
	  
	  /*if (isset($_SESSION['setup_create_permissions'])) {
	    $permissions = $_SESSION['setup_create_permissions'];
	  }*/
	  
	  $errors = 0;
	  
	  foreach ($permissions as $key => $perm) {
	    if ($perm->status) {
	      continue;
	    }
      $id = $this->authorize->createPermission($perm->permission, $perm->description);
    	if($id){
    	  $permissions[$key]->status = true;
    	} else{
    	  $errors++;
    	}
	  }
	  
	  if ($errors === 0) {
      $this->setup->createPermissions = true;
      $this->setup->permissions = $permissions;
      $this->saveProcess();
      return true;
    }
    #$_SESSION['setup_create_permissions'] = $permissions;
    return false;
	}
	
	private function createUserGroups(){
	  if ($this->setup->createGroups)
	    return true;
	  
	  $userGroups = $this->setup->groups;
	  
	  if (isset($_SESSION['setup_create_groups'])) {
	    $userGroups = $_SESSION['setup_create_groups'];
	  }
	  
	  $errors = 0;
	  
	  foreach ($userGroups as $key => $group) {
	    if ($group->status) {
	      continue;
	    }
      $id = $this->authorize->createGroup($group->role, $group->description);
    	if($id){
    	  $userGroups[$key]->status = true;
    	} else{
    	  $errors++;
    	}
	  }
    	
    if ($errors === 0) {
      $this->setup->createGroups = true;
      $this->saveProcess();
      return true;
    }
    $_SESSION['setup_create_groups'] = $userGroups;
    return false;
	}
	
	public function createAdmin()
	{
		// Check if registration is allowed
		if (! $this->config->allowRegistration)
		{
			return redirect()->back()->withInput()->with('error', lang('Auth.registerDisabled'));
		}

		$users = model('UserModel');

		// Validate here first, since some things,
		// like the password, can only be validated properly here.
		$rules = [
			'username'  	=> 'required|alpha_numeric_space|min_length[3]|is_unique[users.username]',
			'email'			=> 'required|valid_email|is_unique[users.email]',
			'password'	 	=> 'required|strong_password',
			'pass_confirm' 	=> 'required|matches[password]',
		];

		if (! $this->validate($rules))
		{
			return $this->response->setJson(['errors' => service('validation')->getErrors(), "type" => "validation"]);
		}

		// Save the user
		$allowedPostFields = ['name', 'email', 'username', 'password'];
		
		$user = new User($this->request->getPost($allowedPostFields));

		$this->config->requireActivation !== false ? $user->generateActivateHash() : $user->activate();
		
		#adding group 
		$users = $users->withGroup("admin");

		if (!$users->save($user))
		{
			return $this->response->setJson(['errors' => $users->errors()]);
		}
		
		$this->setup->createAdmin = true;
		$this->setup->installed = true;
		$this->saveProcess();
		// Success!
		return $this->response->setJson(['success' => lang('Auth.registerSuccess'), 'redirect' => route_to('login')]);
	}
}
                                                                                                                                                     #END OF <FILE></FILE>                           