<?php
$this->pageTitle=Yii::app()->name . ' - Calculation test';
$this->breadcrumbs=array(
	'Субгармоники',
);
?>

<h1>Расчет субгармоник</h1>

<?php if(Yii::app()->user->hasFlash('calc')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('calc'); ?>
</div>

<?php else: ?>

<p>
Введите параметры подшипника.
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm'); ?>

	<p class="note">Поля отмеченные <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
		<?php echo $form->labelEx($model,'fv'); ?>
		<?php echo $form->textField($model,'fv'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dtk'); ?>
		<?php echo $form->textField($model,'dtk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ntk'); ?>
		<?php echo $form->textField($model,'ntk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'beta'); ?>
		<?php echo $form->textField($model,'beta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dout'); ?>
		<?php echo $form->textField($model,'dout'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'din'); ?>
		<?php echo $form->textField($model,'din'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Выполнить'); ?>
        <?php //echo CHtml::ajaxSubmitButton('Csv', Yii::app()->createUrl('calc/test', array('format'=>'csv'))); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<div class="result">
    <?php foreach ($model->getResult() as $result): ?>
        <div class="row">
            <span class="label"><?php echo $result[1]?>: </span>
            <span class="result"><?php echo $result[0]?></span>
            <span class="unit"><?php echo $result[2]; ?></span>
        </div>
    <?php endforeach; ?>
</div>


<?php endif; ?>