<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchCourse */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Курсы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::a('Создать курс', ['create'], ['class' => 'btn btn-success']) ?></p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'duration',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
