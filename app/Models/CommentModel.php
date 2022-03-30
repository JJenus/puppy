<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'comments';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'object';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields = [
	    "puppy_id",
	    "user_id", 
	    "comment", 
	  ];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [
	    "puppy_id" => "required|numeric",
	    "user_id" => "required", 
	    "comment" => "required", 
	  ];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = ["getUserData"];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];
	
	protected function getUserData(array $data){
	  if(gettype($data["data"]) === "array"){
      if (! isset($data['data'][0]->id)) return $data;
      foreach($data["data"] as $key => $value ){
        $id = $data['data'][$key]->user_id;
        $user = (model("UserModel"))->select("id, name, photo")->find($id);
        $data['data'][$key]->{"user"} = $user; 
      } 
	  }else {
      $id = $data['data']->user_id;
      if (! isset($data['data']->id)) return $data;
      $user = (model("UserModel"))->select("id, name, photo")->find($id);
      $data['data']->{"user"} = $user; 
	  } 
	  return $data;
	} 
}
