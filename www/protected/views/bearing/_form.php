<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bearing-form',
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
		<?php echo $form->labelEx($model,'dre'); ?>
		<?php echo $form->textField($model,'dre'); ?>
		<?php echo $form->error($model,'dre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nre'); ?>
		<?php echo $form->textField($model,'nre'); ?>
		<?php echo $form->error($model,'nre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'beta'); ?>
        <?php echo $form->dropDownList($model,'beta', Bearing::$BETA_OPTIONS); ?>
		<?php echo $form->error($model,'beta'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'dout'); ?>
		<?php echo $form->textField($model,'dout'); ?>
		<?php echo $form->error($model,'dout'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'din'); ?>
		<?php echo $form->textField($model,'din'); ?>
		<?php echo $form->error($model,'din'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php Yii::app()->clientScript->registerScript('ajaxForm',
	"$('#bearing-form').ajaxForm({ success: function(responseData) { 
		if ($(responseData).find('form').length == 0) {
			$('#ifcTree').jstree('refresh') 
		} 
	}});"
); ?>