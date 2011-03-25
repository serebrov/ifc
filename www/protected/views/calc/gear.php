<?php
$this->pageTitle=Yii::app()->name . ' - Calculation test';
$this->breadcrumbs=array(
	'Gear',
);
?>

<h1>Расчет ИЧ</h1>

<?php if(Yii::app()->user->hasFlash('calc')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('calc'); ?>
</div>

<?php else: ?>

<p>
Введите параметры зубчатой передачи .
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
		<?php echo $form->labelEx($model,'nz'); ?>
		<?php echo $form->textField($model,'nz'); ?>
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