<?php

class m110403_190658_create_machine_node_table extends CDbMigration
{
	public function up()
	{
            $this->createTable("ifc_machine_node", array(
                "id" => "pk COMMENT 'Machine node'",
                "rotation_freq" => "int(11) NOT NULL COMMENT 'Rotation frequency, rpm (rotation per minute)'",
                "tree_id" => "int(11) NOT NULL",
            ),  'ENGINE=InnoDB DEFAULT CHARSET=utf8');
            $this->addForeignKey('fk_ifc_machine_node_ifc_tree', 'ifc_machine_node', 'tree_id', 
                'ifc_tree', 'id');  
	}

	public function down()
	{
            return $this->dropTable('ifc_machine_node');
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