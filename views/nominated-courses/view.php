<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\nominatedCourses */

$this->title = "Назначенный курс";
$this->params['breadcrumbs'][] = ['label' => 'Назначенный курс', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nominated-courses-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить назначение?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label'  => 'Преподователь',
                'value'  => function($model)
                {
                    return  $model->teacher->surname . " " . $model->teacher->name ;
                },

            ],
            [
                'label'  => 'Группа',
                'value'  => function($model)
                {
                    return $model->group->name;
                },

            ],
            [
                'label'  => 'Курс',
                'value'  => function($model)
                {
                    return $model->course->name;
                },

            ],
            [
                'label'  => 'Статус',
                'value'  => function($model)
                {
                    return $model->status->name;
                },

            ],
        ],
    ]) ?>
</div>
