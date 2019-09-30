<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\nominatedCourses */

$this->title = 'Назначить курс';
$this->params['breadcrumbs'][] = ['label' => 'Назначить курс', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nominated-courses-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
        'group' => $group,
    ]) ?>

</div>
