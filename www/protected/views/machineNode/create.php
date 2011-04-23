<taconite>
	<replaceContent select="#details">
		<h1>Create Machine Node</h1>

		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</replaceContent>
	<?php echo Yii::app()->clientScript->renderScriptsTaconite(); ?>
</taconite>