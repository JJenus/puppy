<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAppTables extends Migration
{
    public function up()
    {
        /*
         * addresses
         */
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'          => ['type' => 'int', 'constraint' => 11],
            'phone'           => ['type' => 'varchar', 'constraint' => 30, 'null' => false],
            'address'          => ['type' => 'varchar', 'constraint' => 60, 'null' => false],
            'city'          => ['type' => 'varchar', 'constraint' => 60, 'null' => false],
            'country'          => ['type' => 'varchar', 'constraint' => 60, 'null' => false],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', false, 'CASCADE');
        $this->forge->createTable('addresses', true);
         
         
        /*
         * PUPPIES 
         */
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'created_by'            => ['type' => 'int', 'constraint' => 11],
            'name'         => ['type' => 'text'],
            'breed'      => ['type' => 'text',  'null' => true],
            'color'           => ['type' => 'varchar', 'constraint' => 20],
            'age'      => ['type' => 'varchar', 'constraint' => 60, 'null' => true],
            'gender'      => ['type' => 'varchar', 'constraint' => 7, 'null' => false ],
            'weight'      => ['type' => 'varchar', 'constraint' => 60, 'null' => true],
            'height'      => ['type' => 'varchar', 'constraint' => 60, 'null' => true],
            'price'      => ['type' => 'varchar', 'constraint' => 60, 'null' => false],
            'description'         => ['type' => 'text'],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('created_by', 'users', 'id', false, 'CASCADE');
        $this->forge->createTable('puppies', true);
        
        
        /**
         * PUPPy Photos 
         */
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'puppy_id'         => ['type' => 'int', 'constraint' => 11],
            'url'              => ['type' => 'text'],
            'ranking'          => ['type' => 'int', 'constraint' => 11],
            'path'             => ['type' => 'varchar', 'constraint' => 11],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('puppy_id', 'puppies', 'id', false, 'CASCADE');
        $this->forge->createTable('photos', true);
        
        /**
         * PUPPy Videos 
         */
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'puppy_id'         => ['type' => 'int', 'constraint' => 11],
            'url'              => ['type' => 'text'],
            'ranking'          => ['type' => 'int', 'constraint' => 11],
            'path'             => ['type' => 'varchar', 'constraint' => 11],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('puppy_id', 'puppies', 'id', false, 'CASCADE');
        $this->forge->createTable('videos', true);
        
        /**
         *  Views //update drop tables
         */
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'puppy_id'      => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'ip_address'          => ['type' => 'text'],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('puppy_id', 'puppies', 'id', false, 'CASCADE');
        $this->forge->createTable('views', true);
        
        /**
         *  Impressions //update drop tables
         */
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'puppy_id'      => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'ip_address'          => ['type' => 'text'],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('puppy_id', 'puppies', 'id', false, 'CASCADE');
        $this->forge->createTable('impressions', true);
        
        /**
         * likes //update drop tables
         */
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'puppy_id'      => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'user_id'          => ['type' => 'text'],
            'ip_address'          => ['type' => 'text'],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('puppy_id', 'puppies', 'id', false, 'CASCADE');
        $this->forge->createTable('likes', true);
        
        /**
         *  Orders //update drop tables
         */
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'puppy_id'      => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'user_id'          => ['type' => 'text'],
            'price'          => ['type' => 'varchar'],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', false, 'CASCADE');
        $this->forge->addForeignKey('puppy_id', 'puppies', 'id', false, 'CASCADE');
        $this->forge->createTable('orders', true);
        
        /**
         *  Comments //Lock commenting to logged in users only
         */
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'puppy_id'      => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'user_id'          => ['type' => 'text'],
            'comment'          => ['type' => 'text'],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', false, 'CASCADE');
        $this->forge->addForeignKey('puppy_id', 'puppies', 'id', false, 'CASCADE');
        $this->forge->createTable('comments', true);
        
        
        /**
         *  Comment_replies //Lock commenting to logged in users only
         */
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'      => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'comment_id'          => ['type' => 'text'],
            'comment'          => ['type' => 'text'],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', false, 'CASCADE');
        $this->forge->addForeignKey('comment_id', 'comments', 'id', false, 'CASCADE');
        $this->forge->createTable('comment_replies', true);
        
        
        /**
         *  Comment_likes // not logged in users can like
         */
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'      => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'comment_id'          => ['type' => 'text'],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        #$this->forge->addForeignKey('user_id', 'users', 'id', false, 'CASCADE');
        #$this->forge->addForeignKey('comment_id', 'comments', 'id', false, 'CASCADE');
        $this->forge->createTable('comment_likes', true);
        
    }

    //--------------------------------------------------------------------

    public function down()
    {
		// drop constraints first to prevent errors
        if ($this->db->DBDriver != 'SQLite3')
        {
            $this->forge->dropForeignKey('puppies', 'puppies_created_by_foreign');
            $this->forge->dropForeignKey('addresses', 'addresses_user_id_foreign');
            $this->forge->dropForeignKey('photos', 'photos_puppy_id_foreign');
            $this->forge->dropForeignKey('videos', 'videos_puppy_id_foreign');
            $this->forge->dropForeignKey('views', 'views_puppy_id_foreign');
            $this->forge->dropForeignKey('impressions', 'impressions_puppy_id_foreign');
            $this->forge->dropForeignKey('orders', 'orders_puppy_id_foreign');
            $this->forge->dropForeignKey('orders', 'orders_user_id_foreign');
            
            $this->forge->dropForeignKey('comments', 'comments_puppy_id_foreign');
            $this->forge->dropForeignKey('comments', 'comments_user_id_foreign');
            $this->forge->dropForeignKey('comment_replies', 'comment_replies_user_id_foreign');
            $this->forge->dropForeignKey('comment_replies', 'comments_replies_comment_id_foreign');
           
        }

  		$this->forge->dropTable('puppies', true);
  		$this->forge->dropTable('addresses', true);
  		$this->forge->dropTable('photos', true);
  		$this->forge->dropTable('videos', true);
  		$this->forge->dropTable('views', true);
  		$this->forge->dropTable('impressions', true);
  		$this->forge->dropTable('orders', true);
  		$this->forge->dropTable('comments', true);
  		$this->forge->dropTable('comment_likes', true);
  		$this->forge->dropTable('comment_replies', true);
    }
}
