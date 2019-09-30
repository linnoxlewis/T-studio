<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchGroup */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Группы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::a('Создать группу', ['create'], ['class' => 'btn btn-success']) ?></p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'courses' => function ($url, $model) {
                        $customurl = Yii::$app->getUrlManager()->createUrl(['/nominated-courses/create/', 'idGroup' => $model->id]);
                        return \yii\helpers\Html::a('<button class="btn-primary">Назначить курс</button>', $customurl,
                            ['title' => 'Назначить курс']);
                    },
                    'student' => function ($url, $model) {
                        $customurl = Yii::$app->getUrlManager()->createUrl(['/student/get-student-for-group/', 'idGroup' => $model->id]);
                        return \yii\helpers\Html::a('<span class="glyphicon glyphicon-user"></span>', $customurl,
                            ['title' =>'Показать студентов в группе']);
                    }
                ],
                'template' => '{update}  {view}  {delete} {student} {courses}',
            ],
        ],
    ]); ?>
</div>
