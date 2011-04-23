<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'machine-node-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'rotation_freq'); ?>
		<?php echo $form->textField($model,'rotation_freq',array('size'=>60,'maxlength'=>1024)); ?>
		<?php echo $form->error($model,'rotation_freq'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php Yii::app()->clientScript->registerScript('ajaxForm',
	"$('#machine-node-form').ajaxForm({ success: function(responseData) { 
		if ($(responseData).find('form').length == 0) {
			$('#ifcTree').jstree('refresh') 
		} 
	}});"
); ?>