<?php

namespace App\Models;

use CodeIgniter\Model;

class PuppyModel extends Model
{
  protected $mediaUrls;
	protected $DBGroup              = 'default';
	protected $table                = 'puppies';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'object';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
	    "created_by",
	    "created_at",
	    "updated_at",
	    "name", 
	    "gender", 
	    "breed", 
	    "color", 
	    "age", 
	    "weight", 
	    "height", "price", 
	    "description"
	  ];
	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [
	    "created_by" => "required|numeric",
	    "price" => "required|numeric",
	    "name" => "required", 
	    "gender" => "required", 
	    "breed" => "required", 
	  ];
	  
	protected $validationMessages   = [];
	public $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = ["saveMedia"];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	public    $afterFind            = ["getMedia", "setImpression"];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];
	
	public function setMedia(array $media){
	  $this->mediaUrls = $media;
	}
	public function saveMedia(){
	  $puppy_id = $this->insertID;
	  foreach($this->mediaUrls["photos"] as $photo){
	    $photo["puppy_id"] = $puppy_id;
	    (model("PhotoModel"))->save($photo);
	  }
	  foreach($this->mediaUrls["videos"] as $video){
	    $video["puppy_id"] = $puppy_id;
	    (model("VideoModel"))->save($video);
	  }
	}
	
	protected function getMedia(array $data){
    if(gettype($data["data"]) === "array"){
      if (!isset($data['data'][0]->id)) 
        return $data;
      foreach($data["data"] as $key => $value ){
        $id = $data['data'][$key]->id;
        $data['data'][$key]->{"media"} = [];
        $data['data'][$key]->media["photos"] = model("PhotoModel")->where("puppy_id", $id)->findAll();
        $data['data'][$key]->media["videos"] = model("VideoModel")->where("puppy_id", $id)->findAll();
      }                                                                                                                    
    }else {
      $id = $data['data']->id;
      if (!isset($data['data']->id)) 
        return $data;
      $data['data']->{"media"} = [];
      $data['data']->media["photos"] = model("PhotoModel")->where("puppy_id", $id)->findAll();
      $data['data']->media["videos"] = model("VideoModel")->where("puppy_id", $id)->findAll();
    }
    return $data;
	} 
	
	protected function getLikes(array $data){
    if(gettype($data["data"]) === "array"){
      if (!isset($data['data'][0]->id)) 
        return $data;
      foreach($data["data"] as $key => $value){
        $id = $data['data'][$key]->id;
        $data['data'][$key]->{"likes"} = model("LikeModel")->where("puppy_id", $id)->countAllResults();
      }                                                                                                                    
    }else {
      $id = $data['data']->id;
      if (!isset($data['data']->id)) 
        return $data;
      $data['data']->{"likes"} = model("LikeModel")->where("puppy_id", $id)->countAllResults();
    }
    return $data;
	}
	
	protected function getComments(array $data){
    if(gettype($data["data"]) === "array"){
      if (!isset($data['data'][0]->id)) 
        return $data;
      foreach($data["data"] as $key => $value){
        $id = $data['data'][$key]->id;
        $data['data'][$key]->{"comments"} = model("CommentModel")->where("puppy_id =", $id)->countAllResults();
      }                                                                                                                    
    }else {
      $id = $data['data']->id;
      if (!isset($data['data']->id)) 
        return $data;
      $data['data']->{"comments"} = model("CommentModel")->where("puppy_id =", $id)->findAll()->countAllResults();
    }
    return $data;
	} 
	
	protected function setImpression(array $data){
	  if ($this->request !==null) {
	     $ip_address = $this->request->getIPAddress();
	  }else $ip_address = "0.0.0.127";
	  
	  if(gettype($data["data"]) === "array"){
      if (! isset($data['data'][0]->id)) return $data;
      foreach($data["data"] as $key => $value ){
        $viewData = [
          "puppy_id" => $data['data'][$key]->id, 
          "ip_address" => $ip_address
        ]; 
        (model("ImpressionModel"))->insert($viewData);
      }                                                                                                                    
    }else {
      if (! isset($data['data']->id)) return $data;
      $viewData = [
        "puppy_id" => $data['data']->id, 
        "ip_address" => $ip_address
      ];
      (model("ViewModel"))->insert($viewData);
    }
    return $data;
	} 
}
