<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\nominatedCourses */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Назначить статус';
$this->params['breadcrumbs'][] = ['label' => 'Назначить курс', 'url' => ['index']];

?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="nominated-courses-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'statusId')->dropDownList(ArrayHelper::map(\app\models\Status::getStatus(), 'id', 'name')); ?>

    <div class="form-group">
        <?= Html::submitButton('Сменить статус', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>