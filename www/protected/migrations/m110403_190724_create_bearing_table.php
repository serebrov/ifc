<?php

class m110403_190724_create_bearing_table extends CDbMigration
{
	public function up()
	{
            $this->createTable("ifc_bearing", array(
                "id" => "pk",
                "dre" => "int(11) NOT NULL COMMENT 'Diameter of rolling element'",
                "nre" => "int(11) NOT NULL COMMENT 'Number of rolling elements'",
                "beta" => "int(11) NOT NULL COMMENT 'Contact angle'",
                "dout" => "int(11) NOT NULL COMMENT 'Outer diameter'",
                "din" => "int(11) NOT NULL COMMENT 'Inner diameter'",
                "tree_id" => "int(11) NOT NULL",
            ));
            $this->addForeignKey('fk_ifc_bearing_ifc_tree', 'ifc_bearing', 'tree_id', 
                'ifc_tree', 'id');  
	}

	public function down()
	{
		return $this->dropTable('ifc_bearing');
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