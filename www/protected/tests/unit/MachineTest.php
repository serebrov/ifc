<?php

class Machine2Test extends CDbTestCase
{
	public $fixtures=array(
		//'machine2s'=>'Machine2',
	);

	public function testCreate() {
		$machine = new Machine;
		$this->assertInstanceOf('Tree', $machine->tree);

		$machine->attributes = array('name'=>'tree test', 'note'=>'note test');

		$this->assertTrue($machine->save());
		$machine->refresh();

		$this->assertEquals('tree test', $machine->tree->name);
		$this->assertEquals('note test', $machine->note);
		
	}

	public function testDelete() {
		$machine = new Machine;
		$machine->attributes = array('name'=>'tree test', 'note'=>'note test');
		$this->assertTrue($machine->save());

		$machineID = $machine->id;
		$treeID = $machine->tree->id;

		$machine->delete();

		$this->assertNull(Machine::model()->findByPk($machineID));
		$this->assertNull(Tree::model()->findByPk($treeID));
	} 
}