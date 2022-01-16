<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\Encryptor;

class IssuesModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'issues';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'object';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
	    "clothe_id", 
	    "title", 
	    "description", 
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
	    "description" => "required", 
	    "title" => "required"
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
         $data['data'][$key]->customerName = $this->getCustomerDetails($id);
         $data['data'][$key]->clothe_id = (new Encryptor())->encode($id);
         $data['data'][$key]->created_by = $this->creator($data['data'][$key]->created_by);
         if ($data['data'][$key]->resolved_by !== null) {
           $data['data'][$key]->resolved_by = $this->creator($data['data'][$key]->resolved_by);
         }
      }
    }else {
      if (! isset($data['data']->id)) return $data;
      $id = $data['data']->clothe_id;
      $data["data"]->customerName = $this->getCustomerDetails($data["data"]->clothe_id);
      $data['data']->clothe_id = (new Encryptor())->encode($id);
       //the line below isn't giving expected results yet
      $data['data']->created_by = $this->creator($data['data']->created_by);
      if ($data['data']->resolved_by !== null) {
          $data['data']->resolved_by = $this->creator($data['data']->resolved_by);
      }
    }
    return $data;
	}
	                                                                                                                                       
	private function getCustomerDetails($id){
	  $model = model("ClothesModel");
    $result = $model->select("customers.name AS customerName")
          ->join('customers', 'clothes.customer_id = customers.id', 'left')
          ->find($id);
    return $result->customerName;
	} 
	
	private function creator($id){
	  $model = model("UserModel");
    $result = $model->select("name")
          ->find($id);
    return $result->name;
	} 
}
