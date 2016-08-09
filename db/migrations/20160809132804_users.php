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
            ->create();
    }
    public function down()
    {
        $this->dropTable('users');
    }
}
