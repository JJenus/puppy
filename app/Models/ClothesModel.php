<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\Encryptor;

class ClothesModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'clothes';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'object';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
	    "customer_id", "type", 
	    "status", "washer", "ironer", 
	    "confirmed_by", "dispensed_by", 
	    "actions"
	  ];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [
	    "customer_id" => "required|numeric",
	    "type" => "required|numeric",
	    "status" => "required", 
	    "actions" => "required", 
	  ];
	  
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	#protected $beforeUpdate         = ["unMaskId"];
	protected $afterUpdate          = [];
	#protected $beforeFind           = ["unMaskId"];
	public $afterFind            = ["maskId"];
	#protected $beforeDelete         = ["unMaskId"];
	
	protected function maskId(array $data){
    if(gettype($data["data"]) === "array"){
      if (! isset($data['data'][0]->id)) return $data;
      foreach($data["data"] as $key => $value ){
        $data['data'][$key]->id = (new Encryptor())->encode($data['data'][$key]->id);
      }
    }else {
      if (! isset($data['data']->id)) return $data;
      $data["data"]->id = (new Encryptor())->encode($data["data"]->id);
    }
    return $data;
  }

	protected function unMaskId(array $data){
   
      if (!isset($data['id'])) return $data;
      $data["id"] = (new Encryptor())->decode($data["id"]);
    
    return $data;
  }
	
	public function getClothe($id){
	  return $this->select(
	                "clothes.*, 
	                clothe_activities.ironed_at AS ironed_at, 
	                clothe_activities.washed_at AS washed_at, 
	                clothe_activities.ready_at AS ready_at, 
	                clothe_activities.dispensed_at AS dispensed_at , 
	                clothe_types.name AS clotheType"
	              )
                ->join('clothe_types', 'clothes.type = clothe_types.id', 'left')
                ->join('clothe_activities', 'clothes.id = clothe_activities.clothe_id', 'left')
                ->find($id);
	}
	
	public function getClothesForCustomer($userId){
	  $clothes = $this
                ->select(
	                "clothes.*, 
	                clothe_activities.ironed_at AS ironed_at, 
	                clothe_activities.washed_at AS washed_at, 
	                clothe_activities.ready_at AS ready_at, 
	                clothe_activities.dispensed_at AS dispensed_at , 
	                clothe_types.name AS clotheType"
	              )
                ->join('clothe_types', 'clothes.type = clothe_types.id', 'left')
                ->join('clothe_activities', 'clothes.id = clothe_activities.clothe_id', 'left')
                ->where('clothes.customer_id', $userId)
                ->findAll();
    
    return $clothes;
	}
	
	public function getClothes($limit, $offset){
  	  $clothes = $this->findAll($limit, $offset);
	  return $clothes;
	}
	
	public function getClothesInRange($startDate, $endDate, $limit, $offset){
	  $clothes = $this->where("created_at >= ", $startDate)
	               ->where("created_at <=", $endDate)
	               ->findAll($limit, $offset);
	  
	  //get clothe types with join statements
	  return $clothes;
	}
}
