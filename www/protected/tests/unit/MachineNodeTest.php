<?php

class MachineNodeTest extends CDbTestCase
{
	public $fixtures=array(
		//'machine2s'=>'Machine2',
	);

	public function testCreate() {
		$machineNode = new MachineNode;
		$this->assertInstanceOf('Tree', $machineNode->tree);

		$machineNode->attributes = array('name'=>'tree test', 'rotation_freq'=>3000);

		$this->assertTrue($machineNode->save());
		$machineNode->refresh();

		$this->assertEquals('tree test', $machineNode->tree->name);
		$this->assertEquals(3000, $machineNode->rotation_freq);
		
	}

	public function testDelete() {
		$machine = new MachineNode;
		$machine->attributes = array('name'=>'tree test', 'rotation_freq'=>3000);
		$this->assertTrue($machine->save());

		$machineID = $machine->id;
		$treeID = $machine->tree->id;

		$machine->delete();

		$this->assertNull(Machine::model()->findByPk($machineID));
		$this->assertNull(Tree::model()->findByPk($treeID));
	} 
}