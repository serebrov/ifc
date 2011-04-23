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
				array('live'=>false), array()
		); ?>
		<?php echo CHtml::ajaxLink('delete', 
			$this->createUrl('machine/deleteNode', array('nid'=>$model->tree_id)), 
				array('live'=>false, 'type'=>'POST', 
					'success'=>"$('#ifcTree').jstree('refresh')"), array()
			 
		); ?>
		<?php echo CHtml::ajaxLink('create node', 
			$this->createUrl('machineNode/createNode', array()), 
				array(), array('id'=>'createMachineNode')
		); ?>
		
	</replaceContent>
	<?php echo Yii::app()->clientScript->renderScriptsTaconite(); ?>
</taconite>