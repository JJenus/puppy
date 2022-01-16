<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migration_alter_table_users extends Migration
{
	public function up()
	{		
		// add new identity info
		$fields = [
			'username'      => ['type' => 'VARCHAR', 'constraint' => 63, 'after' => 'id'],
			];
	  $this->forge->addUniqueKey('users', 'username');
		$this->forge->addColumn('users', $fields);
	}

	public function down()
	{
		// drop new columns
		$this->forge->dropColumn('users', 'username');
	  
	}
}
