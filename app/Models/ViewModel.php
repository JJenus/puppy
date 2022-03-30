<?php

namespace App\Models;

use CodeIgniter\Model;

class ViewModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'views';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'object';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields = [
	    "puppy_id",
	    "ip_address", 
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
	    "ip_address" => "required", 
	  ];
	  
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = ["addImpression"];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];
	
	protected function addImpression(){
	  $view = $this->find($this->insertID);
	  $data = [
	    "puppy_id" => $view->puppy_id, 
	    "ip_address" => $view->ip_address, 
	    "created_at" => $view->created_at, 
	    "updated_at" => $view->updated_at, 
	  ];
	  (model("ImpressionModel"))->insert($data);
	}
}
