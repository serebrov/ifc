<?php

/**
 * This is the model class for table "ifc_tree".
 *
 * The followings are the available columns in table 'ifc_tree':
 * @property integer $id
 * @property integer $root
 * @property integer $lft
 * @property integer $rgt
 * @property integer $level
 * @property integer $type
 * @property string $name
 *
 * The followings are the available model relations:
 * @property Bearing[] $bearings
 * @property Gear[] $gears
 * @property Machine[] $machines
 * @property MachineNode[] $machineNodes
 */
class Tree extends CActiveRecord
{

    const ROOT=0;
    const MACHINE=1;
    const MACHINE_NODE=2;
    const BEARING=3;
    const GEAR=4;

    /**
     * Returns the static model of the specified AR class.
     * @return Tree the static model class
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
        return 'ifc_tree';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('type, name', 'required'),
            array('type', 'numerical', 'integerOnly'=>true),
            array('name', 'length', 'max'=>1024),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, root, lft, rgt, level, type, name', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'bearings' => array(self::HAS_MANY, 'Bearing', 'tree_id'),
            'gears' => array(self::HAS_MANY, 'Gear', 'tree_id'),
            'machines' => array(self::HAS_MANY, 'Machine', 'tree_id'),
            'machineNodes' => array(self::HAS_MANY, 'MachineNode', 'tree_id'),
        );
    }

    public function behaviors(){
        return array(
            'tree' => array(
                'class' => 'ext.trees.ENestedSetBehavior',
                // хранить ли множество деревьев в одной таблице
                'hasManyRoots' => true,
                // поле для хранения идентификатора дерева при $hasManyRoots=false; не используется
                'rootAttribute' => 'root',
                // обязательные поля для NS
                'leftAttribute' => 'lft',
                'rightAttribute' => 'rgt',
                'levelAttribute' => 'level',
            ),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'root' => 'Root',
            'lft' => 'Lft',
            'rgt' => 'Rgt',
            'level' => 'Level',
            'type' => 'Type',
            'name' => 'Name',
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
        $criteria->compare('root',$this->root);
        $criteria->compare('lft',$this->lft);
        $criteria->compare('rgt',$this->rgt);
        $criteria->compare('level',$this->level);
        $criteria->compare('type',$this->type);
        $criteria->compare('name',$this->name,true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria'=>$criteria,
        ));
    }

    public function getTypeName() {
        switch ($this->type) {
            case self::ROOT:
                return "root";
            case self::MACHINE:
                return "machine";
            case self::MACHINE_NODE:
                return "machine_node";
            case self::BEARING:
                return "bearing";
            case self::GEAR:
                return "gear";
            default:
                throw new CException(Yii::t('app', 'Unknown tree node type'));
        }
    }

    public function getModel() {
        switch ($this->type) {
            case self::ROOT:
                return "root";
            case self::MACHINE:
                return $this->machines[0];
            case self::MACHINE_NODE:
                return $this->machineNodes[0];
            case self::BEARING:
                return $this->bearings[0];
            case self::GEAR:
                return $this->gears[0];
            default:
                throw new CException(Yii::t('app', 'Unknown tree node type'));
        }
    }

    public static function getRoot() {
        $root = Tree::model()->findByPk(1);
        if (!$root) {
            $root = new Tree;
            $root->name="root";
            $root->type=0;
            $root->saveNode();
        }
        return $root;
    }
}