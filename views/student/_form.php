<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'groupId')->dropDownList(ArrayHelper::map(\app\models\Group::getGroups(), 'id', 'name')); ?>

    <?= $form->field($model, 'photo')->textarea()->hiddenInput()->label("") ?>

    <?= $form->field($model, 'prePhoto')->fileInput()->label("Загрузить фото") ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<div>
    <img id="img" height="150">
</div>

<script>
    function readFile() {
        if (this.files && this.files[0]) {
            var FR = new FileReader();
            FR.addEventListener("load", function (e) {
                document.getElementById("student-photo").value = e.target.result;
                document.getElementById("img").src = e.target.result;
            });
            FR.readAsDataURL(this.files[0]);
        }

    }
    document.getElementById("student-prephoto").addEventListener("change", readFile);
</script>
