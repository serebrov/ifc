<?php
if (!($model instanceof CalcModel)) {
    echo "";
    return;
}
?>
<?php $model->calcAll(); ?>
<?php foreach ($model->getResult() as $result): ?>
    <div class="row">
        <span class="label"><?php echo $result[0]?></span>
        <span class="result"><?php echo $result[1]?></span>
        <span class="unit"><?php echo $result[2]; ?></span>
    </div>
<?php endforeach; ?>
<?php echo CHtml::link('csv',
    $this->createUrl('tree/export', array('nid'=>$model->tree->id)),
        array(), array('id'=>'export')
); ?>
