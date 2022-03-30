<?php

namespace App\Models;

use CodeIgniter\Model;

class LikeModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'likes';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'object';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
	  "puppy_id", 'user_id', "ip_address"
	];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [
	  "puppy_id" => "required", 
	  "user_id" => "required", 
	  "ip_address" => "required", 
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
	public    $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];
}
