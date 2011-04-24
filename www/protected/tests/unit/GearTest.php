<?php

class GearTest extends CDbTestCase
{
	public $fixtures=array(
		//'machine2s'=>'Machine2',
	);

	public function testCreate() {
		$gear = new Gear;
		$this->assertInstanceOf('Tree', $gear->tree);

		$gear->attributes = array('name'=>'tree test', 'nteeth'=>6);

		$this->assertTrue($gear->save());
		$gear->refresh();

		$this->assertEquals('tree test', $gear->tree->name);
		$this->assertEquals(6, $gear->nteeth);
		
	}

	public function testDelete() {
		$gear = new Gear;
		$gear->attributes = array('name'=>'tree test', 'nteeth'=>6);
		$this->assertTrue($gear->save());

		$gearID = $gear->id;
		$treeID = $gear->tree->id;

		$gear->delete();

		$this->assertNull(Machine::model()->findByPk($gearID));
		$this->assertNull(Tree::model()->findByPk($treeID));
	} 
}