<?php $this->pageTitle=Yii::app()->name; ?>
<div class="tree-page">
	<div class="tree">
		<div id="ifcTree" class="tree-holder"></div>
		<div class="tree-tools">
			<?php echo CHtml::button('remove', 
				array('onclick'=>"$('#ifcTree').jstree('remove');")); ?>
			<?php echo CHtml::button('create', 
				array('onclick'=>"$('#ifcTree').jstree('create');")); ?>
		</div>
	</div>
	<div id="details" class="details">
		Test
	</div>
</div>
<?php  
	Yii::app()->clientScript->registerScript('buildTree',
		'$.ifcTree.buildTree("#ifcTree");'	
	);
?>