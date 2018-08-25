<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchStudent */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Студенты в группе';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'surname',
            'groupId',
            'columns' => [
                'label' => 'Фото',
                'format' => 'raw',
                'value' => function ($data) {
                    if ($data->photo !== "") {
                        return Html::img(($data->photo), [
                            'alt' => 'фото',
                            'style' => 'width:180px;height:150px'
                        ]);
                    } else {
                        return "Фото отсутствует";
                    }
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
