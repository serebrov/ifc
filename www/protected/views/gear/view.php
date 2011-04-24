<taconite>
    <replaceContent select="#details">
        <h1>View Gear #<?php echo $model->id; ?></h1>

        <?php $this->widget('zii.widgets.CDetailView', array(
            'data'=>$model,
            'attributes'=>array(
                'tree.name',
                'nteeth',
            ),
        )); ?>

        <?php echo CHtml::ajaxLink('edit',
            $this->createUrl('gear/updateNode', array('nid'=>$model->tree_id)),
                array('live'=>false), array()
        ); ?>
        <?php echo CHtml::ajaxLink('delete',
            $this->createUrl('gear/deleteNode', array('nid'=>$model->tree_id)),
                array('live'=>false, 'type'=>'POST',
                    'success'=>"$('#ifcTree').jstree('refresh')"), array()

        ); ?>
    </replaceContent>
    <replaceContent select="#result">
        <?php $this->renderPartial('application.views.site._result', compact('model')); ?>
    </replaceContent>
    <?php echo Yii::app()->clientScript->renderScriptsTaconite(); ?>
</taconite>