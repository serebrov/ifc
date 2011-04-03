<?php

class m110403_180307_create_tree_table extends CDbMigration
{
    public function up()
    {
        $this->createTable('ifc_tree', array(
            'id' => 'pk',
            'root' => "integer default NULL COMMENT 'nested set - root'",
            'lft' => "integer NOT NULL COMMENT 'nested set - left node'",
            'rgt' => "integer NOT NULL COMMENT 'nested set - right node'",
            'level' => "integer NOT NULL COMMENT 'newsted set - level'",
            'type' => "integer NOT NULL COMMENT 'node model type'",
            'name' => "varchar(1024) NOT NULL COMMENT 'node name'",
        ),  'ENGINE=InnoDB DEFAULT CHARSET=utf8');
    }

    public function down()
    {
        return $this->dropTable('ifc_tree');
    }

    /*
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}