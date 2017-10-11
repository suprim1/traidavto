<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
            'id' => 'avto',
            'action' => 'traidavto/default/new',
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => "<div class=\"col-lg-5 col-md-5 col-sm-5 col-xs-12 bf-margin-xs text-right bf-text-768\">{label}</div>"
                . "<div class=\"col-lg-5 col-md-5 col-sm-5 col-xs-12 bf-margin-xs\">{input}</div>\n"
                . "<div class=\"col-lg-offset-5 col-lg-7 col-md-7 col-md-offset-5 col-sm-7 col-sm-offset-5 col-xs-12 error_height\">{error}</div>",
                'labelOptions' => ['class' => 'bf-label-text'],
            ],
        ])
?>
<div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bf-background">
        <?= $form->field($model, 'modelAvto')->textInput(['placeholder' => 'марка, модель']) ?>
        <?= $form->field($model, 'summ')->textInput() ?>
        <?= $form->field($model, 'city')->textInput() ?>
        <?= $form->field($model, 'name')->textInput() ?>
        <?= $form->field($model, 'telephone')->textInput()->widget(\yii\widgets\MaskedInput::className(), ['mask' => '+7 (999) 999-99-99',]) ?>
        <?= $form->field($model, 'email')->textInput() ?>
        <?= $form->field($model, 'evakyator')->radioList($evakyator) ?>
        <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
        <div class="col-lg-12 text-center">
            <?= Html::submitButton('ОТПРАВИТЬ', ['class' => 'btn btn-primary bf-button']) ?>
        </div>
    </div>

</div>
<?php ActiveForm::end() ?>