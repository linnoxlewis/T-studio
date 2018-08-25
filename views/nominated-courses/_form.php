<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\nominatedCourses */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nominated-courses-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'teacherId')->dropDownList(ArrayHelper::map(\app\models\Teacher::getTeachers(), 'id', 'surname')); ?>

    <?php if($group == null) { ?>
    <?= $form->field($model, 'groupId')->dropDownList(ArrayHelper::map(\app\models\Group::getGroups(), 'id', 'name')); ?>
    <?php } else { ?>
    <?= $form->field($model, 'groupId')->dropDownList(ArrayHelper::map(\app\models\Group::getGroup($group), 'id', 'name'),['selected' => true]);
    } ?>

    <?= $form->field($model, 'courseId')->dropDownList(ArrayHelper::map(\app\models\Course::getCourses(), 'id', 'name')); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
