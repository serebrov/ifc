<?php

/**
 * This is the model class for table "ifc_machine_node".
 *
 * The followings are the available columns in table 'ifc_machine_node':
 * @property integer $id
 * @property integer $rotation_freq
 * @property integer $tree_id
 *
 * The followings are the available model relations:
 * @property Tree $tree
 */
class MachineNode extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return MachineNode the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ifc_machine_node';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rotation_freq', 'required'),
			array('rotation_freq', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, rotation_freq, tree_id', 'safe', 'on'=>'search'),
		);
	}

	public function behaviors() {
		return array(
			'treeBehavior' => array(
				'class' => 'application.models.TreeNodeBehavior',
				'nodeType' => Tree::MACHINE_NODE,
			)
		);
	}
	/**
	 * @return array relational rules.
	 */
	/*public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'tree' => array(self::BELONGS_TO, 'Tree', 'tree_id'),
		);
	}*/

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'rotation_freq' => 'Rotation Freq',
			'tree_id' => 'Tree',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('rotation_freq',$this->rotation_freq);
		$criteria->compare('tree_id',$this->tree_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}