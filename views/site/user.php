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
		            'label' => 'Моя сторiнка',
		            'url' => ['site/user'],
		        ],
		        [
		            'label' => 'Моi Друзi',
		            'url' => ['site/friends'],
		        ],
		       	[
		            'label' => 'Моi Повідомлення',
		            'url' => ['site/chat'],
		        ],
		        [
		            'label' => 'Мiй Магазин',
		            'url' => ['site/store'],
		        ],
		        [
		            'label' => 'Бронювання котлiв',
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