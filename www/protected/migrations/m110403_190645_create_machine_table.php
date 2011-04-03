<?php

class m110403_190645_create_machine_table extends CDbMigration
{
    public function up()
    {
        $this->createTable("ifc_machine", array(
            "id"=>"pk",
            "note"=>"varchar(1024)",
            "tree_id"=>"int(11) NOT NULL",
        ),  'ENGINE=InnoDB DEFAULT CHARSET=utf8');
        $this->addForeignKey('fk_machine_ifc_tree', 'ifc_machine', 'tree_id', 
            'ifc_tree', 'id');
    }

    public function down()
    {
        return $this->dropTable('ifc_machine');
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