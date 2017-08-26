<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
            'id' => 'traidavto',
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => "<div class=\"col-lg-5 text-right\">{label}</div><div class=\"col-lg-5\">{input}</div>\n"
                . "<div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12 error_height\">{error}</div>",
                'labelOptions' => ['class' => 'bf-label-text'],
            ],
        ])
?>
<div class="container">
    <div class="col-lg-12 bf-background">

        <?= $form->field($model, 'typeAvto')->radioList(['ЛЕГКОВОЙ','ГРУЗОВОЙ']) ?>
        <?= $form->field($model, 'modelAvto')->textInput(['placeholder' => 'марка, модель']) ?>
        <?= $form->field($model, 'year')->dropDownList($year) ?>
        <?= $form->field($model, 'typeKyzov')->dropDownList($typeKyzov) ?>
    </div>

</div>
<?php ActiveForm::end() ?>