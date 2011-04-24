<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gear-form',
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
		<?php echo $form->labelEx($model,'nteeth'); ?>
		<?php echo $form->textField($model,'nteeth'); ?>
		<?php echo $form->error($model,'nteeth'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php Yii::app()->clientScript->registerScript('ajaxForm',
	"$('#gear-form').ajaxForm({ success: function(responseData) { 
		if ($(responseData).find('form').length == 0) {
			$('#ifcTree').jstree('refresh') 
		} 
	}});"
); ?>