
<div class="row">
	<h3>Мастерские</h3>
	<?php if (!empty($masters)): ?>
		<?php foreach($masters as $master): ?>
			<div class="col-md-6 col-lg-3 col-sm-12">
				<div class="panel panel-default">
		  			<div class="panel-heading">
		    			<h3 class="panel-title"><a href=" <?= yii\helpers\Url::to(['masters/view', 'id' => $master->PK_Masters]) ?> "> <?=$master->MasterName?></a></h3>
		  			</div>
		  			<div class="panel-body">
		    			<?=$master->MasterDesq?>
		 			 </div>
				</div>
			</div>
		<?php endforeach; ?>
		<?= \yii\widgets\LinkPager::widget(['pagination' => $pages_mas]); ?>
	<?php endif; ?>
</div>

<div class="row">
	<h3>Заявки</h3>
	<?php if (!empty($requests)): ?>
		<?php foreach($requests as $request): ?>
			<div class="col-md-6 col-lg-3 col-sm-12">
				<div class="panel panel-default">
		  			<div class="panel-heading">
		    			<h3 class="panel-title"><a href=" <?= yii\helpers\Url::to(['requests/view', 'id' => $request->PK_Requests]) ?> "> <?=$request->Car?></a></h3>
		  			</div>
		  			<div class="panel-body">
		    			<?=$request->Text?>
		 			 </div>
				</div>
			</div>
		<?php endforeach; ?>
		<?= \yii\widgets\LinkPager::widget(['pagination' => $pages_req]); ?>
	<?php endif; ?>
</div>
