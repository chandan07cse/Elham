<?php

use Phinx\Migration\AbstractMigration;

class User extends AbstractMigration
{
    public function up()
    {
        $users = $this->table('users');
                            $users->addColumn('name','string',['length'=>100])
                             ->addColumn('password','string')
                             ->create();
    }

    public function down()
    {
        $this->dropTable('users');
    }
}
