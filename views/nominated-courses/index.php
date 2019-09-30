<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchNominatedCourses */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Назначенные курсы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nominated-courses-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::a('Назначить курс', ['create'], ['class' => 'btn btn-success']) ?></p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'teacherId',
                'value' => function ($model) {
                    return $model->teacher->surname. " " . $model->teacher->name  ;
                },

            ],
            [
                'attribute' => 'groupId',
                'value' => function ($model) {
                    return $model->group->name;
                },
            ],
            [
                'attribute' => 'courseId',
                'value' => function ($model) {
                    return $model->course->name;
                },
            ],
            [
                'attribute' => 'statusId',
                'value' => function ($model) {
                    return $model->status->name;
                },
            ],
            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'courses' => function ($url, $model) {
                        $customurl = Yii::$app->getUrlManager()->createUrl(['/nominated-courses/set-status/', 'id' => $model->id]);
                        return \yii\helpers\Html::a('<button class="btn-primary">Сменить статус</button>', $customurl,
                            ['title' =>'Сменить статус']);
                    },
                ],
                'template' => '{update}  {view}  {delete} {student} {courses}',
            ],
        ],
    ]); ?>
