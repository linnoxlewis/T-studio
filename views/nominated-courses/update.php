<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\nominatedCourses */

$this->title = 'Редактировать назначенный курс';
$this->params['breadcrumbs'][] = ['label' => 'Назначенный курс', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Курс '. $model->group->name . '/'.$model->course->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="nominated-courses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
