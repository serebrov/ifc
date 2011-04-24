<?php

/**
 * This is the model class for table "ifc_bearing".
 *
 * The followings are the available columns in table 'ifc_bearing':
 * @property integer $id
 * @property integer $dre
 * @property integer $nre
 * @property integer $beta
 * @property integer $dout
 * @property integer $din
 * @property integer $tree_id
 *
 * The followings are the available model relations:
 * @property Tree $tree
 */
class Bearing extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Bearing the static model class
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
		return 'ifc_bearing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dre, nre, beta, dout, din', 'required'),
			array('dre, nre, beta, dout, din', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, dre, nre, beta, dout, din, tree_id', 'safe', 'on'=>'search'),
		);
	}

	public function behaviors() {
		return array(
			'treeBehavior' => array(
				'class' => 'application.models.TreeNodeBehavior',
				'nodeType' => Tree::BEARING,
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
			'dre' => 'Dre',
			'nre' => 'Nre',
			'beta' => 'Beta',
			'dout' => 'Dout',
			'din' => 'Din',
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
		$criteria->compare('dre',$this->dre);
		$criteria->compare('nre',$this->nre);
		$criteria->compare('beta',$this->beta);
		$criteria->compare('dout',$this->dout);
		$criteria->compare('din',$this->din);
		$criteria->compare('tree_id',$this->tree_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}