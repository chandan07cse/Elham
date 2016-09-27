<?php

use Phinx\Migration\AbstractMigration;

class Articles extends AbstractMigration
{
    public function up()
    {
        $articles = $this->table('articles');
        $articles->addColumn('user_id','integer')
                 ->addForeignKey('user_id','users','id',['delete'=>'CASCADE','update'=>'CASCADE'])
                 ->addColumn('caption','string')
                 ->addColumn('description','string')
                 ->create();

    }

    public function down()
    {
        $this->dropTable('articles');
    }
}
