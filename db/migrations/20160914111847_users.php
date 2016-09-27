<?php

use Phinx\Migration\AbstractMigration;

class Users extends AbstractMigration
{
    public function up()
    {
        $users = $this->table('users');
        $users->addColumn('username','string',['length'=>100])
              ->addColumn('password','string',['length'=>20])
              ->addColumn('email','string')
              ->addColumn('image','string')
              ->addColumn('activation_code','string',['length'=>32,'null'=>true])
              ->addColumn('active','integer',['default'=>0])
              ->create();
    }
    public function down()
    {
        $this->dropTable('users');
    }
}
