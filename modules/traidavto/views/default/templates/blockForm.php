<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
            'id' => 'traidavto',
            'action' => 'traidavto/default/new',
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => "<div class=\"col-lg-5 text-right\">{label}</div><div class=\"col-lg-5\">{input}</div>\n"
                . "<div class=\"col-lg-5-offset col-lg-7 col-md-12 col-sm-12 col-xs-12 error_height\">{error}</div>",
                'labelOptions' => ['class' => 'bf-label-text'],
            ],
        ])
?>
<div class="container">
    <div class="col-lg-12 bf-background">
        <?= $form->field($model, 'typeAvto')->radioList($typeAvto) ?>
        <?= $form->field($model, 'modelAvto')->textInput(['placeholder' => 'марка, модель']) ?>
        <?= $form->field($model, 'year')->dropDownList($year) ?>
        <?= $form->field($model, 'typeKyzov')->dropDownList($typeKyzov) ?>
        <?= $form->field($model, 'modelDvigatel')->textInput(['placeholder' => 'модель, объем, модификация']) ?>
        <?= $form->field($model, 'typeDvigatel')->radioList($typeDvigatel) ?>
        <?= $form->field($model, 'kpp')->radioList($kpp) ?>
        <?= $form->field($model, 'sostoyanie')->textarea(['rows' => '6', 'placeholder' => 'пожалуйста опишите основные повреждения и неисправности']) ?>
        <?= $form->field($model, 'summ')->textInput() ?>
        <?= $form->field($model, 'city')->textInput() ?>
        <?= $form->field($model, 'name')->textInput() ?>
        <?= $form->field($model, 'telephone')->textInput() ?>
        <?= $form->field($model, 'email')->textInput() ?>
        <?= $form->field($model, 'evakyator')->radioList($evakyator) ?>
        <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
        <div class="col-lg-12 text-center">
            <?= Html::submitButton('ОТПРАВИТЬ', ['class' => 'btn btn-primary bf-button']) ?>
        </div>
    </div>

</div>
<?php ActiveForm::end() ?>