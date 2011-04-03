<?php

class m110403_190738_create_gear_table extends CDbMigration
{
	public function up()
	{
            $this->createTable("ifc_gear", array(
                "id"=>"pk",
                "nteeth"=>"int(11) NOT NULL COMMENT 'number of teeth'",
                "tree_id"=>"int(11) NOT NULL",
            ),  'ENGINE=InnoDB DEFAULT CHARSET=utf8');
            $this->addForeignKey('fk_ifc_gear_ifc_tree', 'ifc_gear', 'tree_id', 
                'ifc_tree', 'id');
	}

	public function down()
	{
            $this->dropTable('ifc_gear');
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