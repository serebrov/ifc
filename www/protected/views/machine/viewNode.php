<taconite>
	<replaceContent select="#details">
		<h1>View Machine #<?php echo $model->id; ?></h1>

		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'id',
				'note',
				'tree_id',
			),
		)); ?>
	</replaceContent>
</taconite>

