<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\Student */
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Студенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить студента?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'surname',
            'groupId',
            'columns' => [
                'label'=>'Фото',
                'format' => 'raw',
                'value' => function($data){
                    if($data->photo !=="") {
                        return Html::img(($data->photo), [
                            'alt' => 'фото',
                            'style' => 'width:180px;height:150px'
                        ]);
                    } else {
                        return "Фото отсутствует" ;
                    }
                },
            ],
        ],
    ]) ?>
</div>
