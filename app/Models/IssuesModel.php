<?php

namespace App\Models;

use CodeIgniter\Model;

class IssuesModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'issues';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'object ';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
	    "clothe_id", "description", 
	    "resolved_at", 
	    "created_by", 
	    "resolved_by"
	  ];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [
	    "clothe_id" => "required|numeric", 
	    "description" => "required"
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
	protected $afterFind            = ["processDetails"];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];
	
	public function processDetails(array $data){
	  if(gettype($data["data"]) === "array"){
      if (! isset($data['data'][0]->clothe_id)) return $data;
    
      foreach($data["data"] as $key => $value ){
        $id = $data['data'][$key]->clothe_id;
         $data['data'][$key]["customerName"] = $this->getCustomerDetails($id);
      }
    }else {
      if (! isset($data['data']->id)) return $data;
      $data["data"]->customerName = $this->getCustomerDetails($data["data"]->clothe_id);
    }
    return $data;
	}
	
	private function getCustomerDetails($id){
	  $model = model("ClothesModel");
    $result = $model->select("customer.name AS customerName")
          ->join('customers', 'clothes.customer_id = customer.id', 'left')
          ->find($id);
    return $result->customerName;
	} 
}
