<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;

$this->title = Yii::$app->user->identity->username;
?>
<div class="row">
	<div class="col-sm-2">
	<?= 
		Nav::widget([
		    'items' => [
		        [
		            'label' => 'Моя сторінк',
		            'url' => ['site/user'],
		        ],
		        [
		            'label' => 'Мої Друзі',
		            'url' => ['site/friends'],
		        ],
		       	[
		            'label' => 'Мої Повідомлення',
		            'url' => ['site/chat'],
		        ],
		        [
		            'label' => 'Мій Магазин',
		            'url' => ['site/store'],
		        ],
		        [
		            'label' => 'Бронювання котлів',
		            'url' => ['site/hostel'],
		        ],
		    ],
		    'options' => ['class' =>'nav nav-pills nav-stacked'], // set this to nav-tab to get tab-styled navigation
		]);
	?>
	</div>
	<div class="col-sm-10"> 
		<?= $content ?>
	</div>
</div>