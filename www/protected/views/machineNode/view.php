<taconite>
	<replaceContent select="#details">
		<h1>View Machine Node #<?php echo $model->id; ?></h1>

		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'tree.name',
				'rotation_freq',
			),
		)); ?>

		<?php echo CHtml::ajaxLink('edit', 
			$this->createUrl('machineNode/updateNode', array('nid'=>$model->tree_id)), 
				array('live'=>false), array()
		); ?>
		<?php echo CHtml::ajaxLink('delete', 
			$this->createUrl('machineNode/deleteNode', array('nid'=>$model->tree_id)), 
				array('live'=>false, 'type'=>'POST', 
					'success'=>"$('#ifcTree').jstree('refresh')"), array()
			 
		); ?>
		<?php /* echo CHtml::ajaxLink('create node', 
			$this->createUrl('machineNode/createNode', array('parent'=>$model->id)), 
				array(), array('id'=>'createMachineNode')
		); */ ?>
		
	</replaceContent>
	<?php echo Yii::app()->clientScript->renderScriptsTaconite(); ?>
</taconite>