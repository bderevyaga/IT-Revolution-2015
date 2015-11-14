<?php

/* @var $this \yii\web\View */
/* @var $content string */

use kartik\helpers\Html;
use kartik\helpers\Enum;
use yii\jui\DatePicker;

?>
<div class="row">
	<div class="col-sm-3">
	<?php 
		if(isset($userinfo[0]['avatar']) && $userinfo[0]['avatar']!=''){
			echo '<img src="'.$userinfo[0]['avatar'].'" style="max-width: 100%; max-height: 100%;">';
		}else{
			echo '<img src="/data/img/200_300.png" style="max-width: 100%; max-height: 100%;">';
		}
	 ?>
	</div>
	<div class="col-sm-9">
		<?php if(isset($userinfo[0]['avatar']) && $userinfo[0]['avatar']!=''){ ?>
			<h4><?= $userinfo[0]['name'] ?></h4>
			<p>Дата народження: <?= $userinfo[0]['date_birth'] ?></p>
			<p>Родной город: <?= $userinfo[0]['address'] ?></p>
			<p>Доп. телефон: <?= $userinfo[0]['phone'] ?></p>
		<?php }else{ ?>
			<h4>Аноним</h4>
		<?php } ?>
<?php
	$events = array();
	foreach ($event as &$value) {
		$Event = new \yii2fullcalendar\models\Event();
		$Event->id = $value['id'];
		$Event->title = $value['title'];
		$Event->start = date('Y-m-d\TH:i:s\Z', $value['start']);
		$events[] = $Event;
	}
?>

  <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
      'events'=> $events,
  ));
?>
<br/>
		<form>
			<div class="form-group">
			<?php
				echo DatePicker::widget([
					'name'  => 'date',
				    'attribute' => 'from_date',
				    'language' => 'ru',
				    'dateFormat' => 'yyyy-MM-dd',
				    'options' => [
				    	'class' => 'form-control',
				    	'placeholder' => 'Дата',
				    ], 
				]);
			?>
			</div>
			<div class="form-group">
		      <input type="text" name="text"  class="form-control" placeholder="Опис">
		    </div>
			<button type="submit" class="btn btn-default">Зберегти шабаш</button>
		</form>
	</div>
</div>
<br/>
<div class="row">
<div class="col-sm-12">
<br/>
<script type="text/javascript">
        $(document).ready(function() {
        	$( "form" ).submit(function( event ) {
			  var data = $( "form" ).serializeArray();
			  	$.ajax({
					  type: 'POST',
					  url: '/site/addevent',
					  data: data,
					  success: success,
					  dataType: dataType
				});
			  event.preventDefault();
			});
			    $('.fullcalendar').fullCalendar({
            	defaultView: 'agendaWeek',
                firstDay: 1,
                height: 450,
                width: 200,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                monthNames: ['Січень','Лютий','Березень','Квітень','Травень','Червень','Липень','Серпень','Вересень','Жовтень','Листопад','Грудень'],
                monthNamesShort: ['Січ.','Лют.','Бер.','Кві.','Тра.','Чер.','Лип.','Сер.','Вер.','Жов.','Лис.','Гру.'],
                dayNames: ["Субота","Понеділок","Вівторок","Среда","Четверг","Пятница","Суббота"],
                dayNamesShort: ["НД","ПН","ВТ","СР","ЧТ","ПТ","СБ"],
                buttonText: {
                    prev: "<",
                    next: ">",
                    prevYear: "&nbsp;&lt;&lt;&nbsp;",
                    nextYear: "&nbsp;&gt;&gt;&nbsp;",
                    today: "Сегодня",
                    month: "Місяць",
                    week: "Тиждень",
                    day: "День"
                }
            });
    });
</script>
<?php
	$body = 'Cras sit amet nibh libero, in gravida nulla. '.
    'Nulla vel metus scelerisque ante sollicitudin commodo. '.
    'Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.';
	echo Html::mediaList([
	    [
	     'heading' => 'Media heading 1',
	     'body' => $body,
	     'src' => '#',
	     'img' => '/data/img/64_64.png',
	     'items' => [
	         [
	             'heading' => 'Media heading 1.1',
	             'body' => $body,
	             'src' => '#',
	             'img' => '/data/img/64_64.png',
	         ],
	         [
	             'heading' => 'Media heading 1.2',
	             'body' => $body,
	             'src' => '#',
	             'img' => '/data/img/64_64.png',
	         ],
	     ]
	    ],
	 [
	     'heading' => 'Media heading 2',
	     'body' => $body,
	     'src' => '#',
	     'img' => '/data/img/64_64.png',
	    ],
	]);
?>

</div>
</div>