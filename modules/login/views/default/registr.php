<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>



<div class="modal fade" id="regUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Регистрация</h4>
            </div>
            <div class="modal-body">
                <div class="row">

                    <?php
                    $form = ActiveForm::begin([
                                'id' => 'registr-form',
                                'action' => 'login/default/regval',
                                'layout' => 'horizontal',
                                'fieldConfig' => [
                                    'template' => "<div class=\"col-lg-offset-1 col-lg-10 col-lg-offset-1"
                                    . " col-md-offset-1 col-md-10 col-lg-offset-1"
                                    . " col-sm-offset-1 col-sm-10 col-sm-offset-1"
                                    . " col-xs-offset-1 col-xs-10 col-xs-offset-1 \">{label}<br>{input}</div>\n"
                                    . "<div class=\"col-lg-offset-1 col-lg-10 col-lg-offset-1"
                                    . " col-md-offset-1 col-md-10 col-lg-offset-1"
                                    . " col-sm-offset-1 col-sm-10 col-sm-offset-1"
                                    . " col-xs-offset-1 col-xs-10 col-xs-offset-1 error_height\">{error}</div>",
                                    'labelOptions' => ['class' => 'control-label'],
                                ],
                    ]);
                    ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                    <?= $form->field($model, 'email', ['enableAjaxValidation' => true])->textInput() ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <?=
                    $form->field($model, 'termsOfUse')->checkbox([
                        'template' => "<div class=\"termsOfUse\">{input} {label}</div>",
                    ])
                    ?>

                    <?= Html::submitButton('Зарегистрировать', ['class' => 'btn btn-primary reg_button', 'name' => 'login-button']) ?>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

        </div>
    </div>
</div>