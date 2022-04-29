<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Puppies extends ResourceController
{
    use \Myth\Auth\AuthTrait; 
    protected $modelName = 'App\Models\PuppyModel';
    protected $format    = 'json';

    public function index()
    {
      $offset = $this->request->getVar("offset") ?? 0;
	    $limit = $this->request->getVar("limit")  ?? 50;
	  
      if ($this->request->getVar("order") !== null) {
        $orderBy = $this->request->getVar("order");
        if ($orderBy === "views") {
          $this->model->afterFind[] = 'getViews';
        } else {
          $dir = $this->request->getVar("dir") ?? "ASC";
          $this->model->orderBy($this->request->getVar("order"), $dir);
        }
        
      }
      if ($this->request->getVar("comments") !== null) {
        $this->model->afterFind[] = 'getComments';
      }
      if ($this->request->getVar("likes") !== null) {
        $this->model->afterFind[] = 'getLikes';
      }
      $data = $this->model->findAll($limit, $offset);
      if($this->request->getVar("order") === "views"){
        usort($data, function($a, $b){
          return $b->views - $a->views;
        });
        if(count($data)>4){
          $data = array_slice($data, 0, 4);
        }
      }
      return $this->respond($data);
    }
    
    public function show($id = null)
    {
      $puppy = $this->model->find($id);
      if ($this->request->getVar("comments") !== null) {
        $puppy->{"comments"} = (model("CommentModel"))->where("puppy_id", $id)->findAll();
      }
      if ($this->request->getVar("likes") !== null) {
        $puppy->{"likes"} = (model("LikeModel"))->where("puppy_id", $id)->findAll();
      }
      return $this->respond($puppy);
    } 
    
   /* public function create()
    {} */
    
    public function update($id = null)
    {
      if ($this->request->getVar("like") !== null) {
        return $this->respond($this->like($id, $this->request->getVar("like")));
        exit();
      }else {
        #$this->respond();
        $data = $this->request->getVar();
        $this->model->save($data);
        $insertID = $this->model->insertID();
        return $this->respond($this->model->find($insertID));
      } 
    } 
    
    public function like($id, $like){
      $this->setupAuthClasses();
      $ip_address = $this->request->getIPAddress() ?? "unknown";
      $user_id = $this->authenticate->user()->id ?? "anonymous";
      $LikeModel = model("LikeModel");
      if ($like === "true") {
        if(!$LikeModel->save(
          [
            "ip_address"=> $ip_address, 
            "user_id"=> $user_id, 
            "puppy_id" => $id, 
          ]
        )) {
          return $LikeModel->errors(); 
        } 
        return "liked";
      } else {
        if($ip_address === "unknown") return "Unknown" ;
        
        if(!$LikeModel->where("puppy_id", $id)
        ->where("ip_address", $ip_address)
        ->delete()) {
          return $LikeModel->errors();
        }
        return "unliked";
      }
    } 
    
    public function delete($id = null)
    {} 
}


                                                                                                                                                                      