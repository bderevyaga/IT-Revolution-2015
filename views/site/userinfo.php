<?php

/* @var $this \yii\web\View */
/* @var $content string */

use kartik\helpers\Html;
use kartik\helpers\Enum;
use yii\jui\DatePicker;
use yii\helpers\Url;

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
	 <br>
	 <a href='#' class="btn btn-danger btn-block five">Пятниця 13</a>
		 <div style="display: none;" class="fiveh">
			13.02.2009
			13.03.2009
			13.11.2009
			13.03.2010
			13.05.2011
			13.01.2012
			13.04.2012
			13.07.2012
			13.09.2013
			13.12.2013
			13.06.2014
			13.02.2015
			13.03.2015
			13.11.2015
			13.05.2016
			13.01.2017
			13.10.2017
			13.04.2018
			13.07.2018
			13.09.2019
			13.12.2020
			13.03.2020
			13.11.2020
			13.08.2021
			13.05.2022
			13.01.2023
			13.10.2023
			13.09.2024
			13.12.2024
			13.06.2025
			13.02.2026
			13.03.2026
			13.11.2026
			13.08.2027
			13.10.2028
		</div>
		<script type="text/javascript">
		    $(document).ready(function() {
				$('.five').click(function() {
					$('.fiveh').show();
				});
			});
		</script>
	</div>
	<div class="col-sm-9">
		<?php if(isset($userinfo[0]['avatar']) && $userinfo[0]['avatar']!=''){ ?>
			<p>iм'я:            <label><?= $userinfo[0]['name'] ?></label></p>
			<p>Дата народження: <label><?= $userinfo[0]['date_birth'] ?></label></p>
			<p>Родной город:    <label><?= $userinfo[0]['address'] ?></label></p>
			<p>Доп. телефон:    <label><?= $userinfo[0]['phone'] ?></label></p>
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
        	$("form button").click(function(){

        	});
        	$( "form" ).submit(function( e ) {
			  var data = $( "form" ).serializeArray();
			  	e.preventDefault();
				(e.cancelBubble) ? e.cancelBubble : e.stopPropagation;
			  	$.ajax({
					  type: 'POST',
					  url: <?= Url::toRoute('site/addevent'); ?>,
					  data: data,
					  dataType: 'json',
					  success: function(msg){
					    console.log(msg);
					  }
				});
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
                monthNames: ['Сiчень','Лютий','Березень','Квiтень','Травень','Червень','Липень','Серпень','Вересень','Жовтень','Листопад','Грудень'],
                monthNamesShort: ['Сiч.','Лют.','Бер.','Квi.','Тра.','Чер.','Лип.','Сер.','Вер.','Жов.','Лис.','Гру.'],
                dayNames: ["Субота","Понеділок","Вівторок","Среда","Четверг","Пятница","Суббота"],
                dayNamesShort: ["НД","ПН","ВТ","СР","ЧТ","ПТ","СБ"],
                buttonText: {
                    prev: "<",
                    next: ">",
                    prevYear: "&nbsp;&lt;&lt;&nbsp;",
                    nextYear: "&nbsp;&gt;&gt;&nbsp;",
                    today: "Сегодня",
                    month: "Мiсяць",
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