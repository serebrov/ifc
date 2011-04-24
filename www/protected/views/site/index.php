<?php $this->pageTitle=Yii::app()->name; ?>
<div class="tree-page">
    <div class="tree">
        <div id="ifcTree" class="tree-holder"></div>
        <div class="tree-tools">
            <?php echo CHtml::ajaxLink('create machine',
                $this->createUrl('machine/createNode', array()),
                    array(), array('id'=>'createMachine')
            ); ?>
        </div>
    </div>
    <div id="details" class="details">
    </div>
    <div id="result" class="result">
    </div>
</div>
<?php
    Yii::app()->clientScript->registerScript('buildTree',
        '$.ifcTree.buildTree("#ifcTree");'
    );
?>