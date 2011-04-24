<?php $model->calc(); ?>
<?php foreach ($model->getResult() as $result): ?>
	<div class="row">
		<span class="label"><?php echo $result[1]?>: </span>
		<span class="result"><?php echo $result[0]?></span>
		<span class="unit"><?php echo $result[2]; ?></span>
	</div>
<?php endforeach; ?>