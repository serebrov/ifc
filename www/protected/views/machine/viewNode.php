<taconite>
	<replaceContent select="#details">
		<h1>View Machine #<?php echo $model->id; ?></h1>

		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'tree.name',
				'note',
			),
		)); ?>

		<?php echo CHtml::ajaxLink('edit', 
			$this->createUrl('machine/updateNode', array('nid'=>$model->tree_id)), 
				array(), array('live'=>false)
		); ?>
		
	</replaceContent>
	<?php echo Yii::app()->clientScript->renderScriptsTaconite(); ?>
</taconite>

