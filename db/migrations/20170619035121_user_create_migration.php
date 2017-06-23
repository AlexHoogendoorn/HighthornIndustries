<?php

use Phinx\Migration\AbstractMigration;

class UserCreateMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    //public function change()
    //{
    //}

    public function up()
    {
    	$table = $this->table('users');
    	$table->addColumn('first_name', 'string', array('null' => false, 'limit' => 50))
    		  ->addColumn('middle_names', 'string', array('null' => true, 'limit' => 50))
    		  ->addColumn('surname', 'string', array('null' => true, 'limit' => 50))
    		  ->addColumn('preferred_name', 'string', array('null' => true, 'limit' => 50))
              ->addColumn('date_of_birth', 'date', array('null' => true))
    		  ->addColumn('email', 'string', array('null' => false, 'limit' => 50))
    		  ->addColumn('user_name', 'string', array('null' => false, 'limit' => 20))
    		  ->addColumn('password', 'string', array('null' => false, 'limit' => 20))
    		  ->addColumn('created', 'datetime', array('null' => false, 'default' => 'CURRENT_TIMESTAMP' ))
    		  ->addColumn('updated', 'datetime', array('null' => true))
    		  ->addIndex(array('user_name', 'email'), array('unique' => true))
    		  ->save();
    }

    public function down()
    {
    	//$exists = $this->hasTable('users');
    	//if($exists) 
    	//	$this.dropTable('users');
    	//}
    }
}
