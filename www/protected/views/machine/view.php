<?php
$this->breadcrumbs=array(
	'Machines'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Machine', 'url'=>array('index')),
	array('label'=>'Create Machine', 'url'=>array('create')),
	array('label'=>'Update Machine', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Machine', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Machine', 'url'=>array('admin')),
);
?>

<h1>View Machine #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'note',
		'tree.name',
	),
)); ?>
