<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Головна';
?>
<div class="site-index">
<div class="row">
<div class="col-sm-3">
    <?php 
        $form = ActiveForm::begin([
            'id' => 'login-form',
            'fieldConfig' => [
                'template' => "{label}\n{input}{error}",
            ],
        ]); 
    ?>
    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= 
        $form->field($model, 'rememberMe')->checkbox([
            'template' => "{input} {label}{error}",
        ]) 
    ?>
    <div class="form-group">
            <?= Html::submitButton('Вхід', ['class' => 'btn btn-primary btn-sm btn-block', 'name' => 'login-button']) ?>
    </div>
    <div class="form-group">
            <?= Html::a('Реєстрація', Url::toRoute('/site/registration') ,['class' => 'btn btn-primary btn-sm btn-block']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<div class="col-sm-9"> 
############### ####### ###### ######## ####### ######### ## ###### ###### ####### ###### ##### #### ##### ######## ###### ##### ####### #### ##
</div>
</div>
</div>
