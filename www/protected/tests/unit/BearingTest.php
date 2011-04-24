<?php

class BearingTest extends CDbTestCase
{
	public $fixtures=array(
		//'machine2s'=>'Machine2',
	);

	public function testCreate() {
		$bearing = new Bearing;
		$this->assertInstanceOf('Tree', $bearing->tree);

		$bearing->attributes = array('name'=>'tree test', 'dre'=>30, 'nre'=>40, 'beta'=>0, 'dout'=>15, 'din'=>10);

		$this->assertTrue($bearing->save());
		$bearing->refresh();

		$this->assertEquals('tree test', $bearing->tree->name);
		$this->assertEquals(30, $bearing->dre);
		
	}

	public function testDelete() {
		$bearing = new Bearing;
		$bearing->attributes = array('name'=>'tree test', 'dre'=>30, 'nre'=>40, 'beta'=>0, 'dout'=>15, 'din'=>10);
		$this->assertTrue($bearing->save());

		$bearingID = $bearing->id;
		$treeID = $bearing->tree->id;

		$bearing->delete();

		$this->assertNull(Bearing::model()->findByPk($bearingID));
		$this->assertNull(Tree::model()->findByPk($treeID));
	} 
}