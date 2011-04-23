<?php
class TreeNodeBehavior extends CActiveRecordBehavior {

	public $nodeType;

	public $parentID;
	
	public function attach($owner) {
		$owner->validatorList->add(CValidator::createValidator('required', $owner, 'name'));
		$owner->validatorList->add(CValidator::createValidator('length', $owner, 'name', array('max'=>1024)));

		$owner->metaData->addRelation('tree', array(CActiveRecord::BELONGS_TO, 'Tree', 'tree_id'));
		parent::attach($owner);
	}

	public function afterConstruct($event) {
		$this->owner->tree = new Tree;
		$this->owner->tree->type=$this->nodeType;
		parent::afterConstruct($event);
	}

	public function beforeValidate($event) {
		if (!$this->owner->tree->validate()) return false;
		if (isset($this->parentID) && !Tree::model()->findByPk($this->parentID)) {
			$this->owner->addError('parent', Yii::t('app', 'Invalid parent ID'));
			return false;
		}
		parent::beforeValidate($event);
	}

	public function beforeSave($event) {
		if ($this->owner->isNewRecord) {
			$this->owner->tree->appendTo($this->getParent());
			$this->owner->tree_id = $this->owner->tree->id;
		} else {
			$this->owner->tree->saveNode();
		}
		parent::beforeSave($event);
	}
	
	public function afterDelete($event) {
		if (!$this->owner->tree->deleteNode()) {
			throw new CException('Can not delete tree node');
		}
		parent::afterDelete($event);
	}
	
	public function getName() {
		return $this->owner->tree->name;
	}

	public function setName($value) {
		$this->owner->tree->name = $value;
	}

	public function getParent() {
		return isset($this->parentID) ? Tree::model()->findByPk($this->parentID) : Tree::getRoot();
	}
	
	public function getParentID() {
		return $this->parentID;
	}

	public function setParentID($value) {
		$this->parentID = $value;
	}
}