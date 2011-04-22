<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'machine-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model->tree,'name'); ?>
		<?php echo $form->textField($model->tree,'name'); ?>
		<?php echo $form->error($model->tree,'name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>1024)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php Yii::app()->clientScript->registerScript('ajaxForm',
	"$('#machine-form').ajaxForm({success: function(){ $('#ifcTree').jstree('refresh') } });"
); ?>