<?php

use yii\db\Migration;

/**
 * Class m180824_080144_create_teacher_data
 */
class m180824_080144_create_teacher_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%teacher}}', ['name','surname'], [
                ['Владислав','Кретов'],
                ['Олег','Волкова'],
                ['Анна','Остапенко'],
                ['Владимир','Новопашин'],
                ['Валентина',"Синенко"],
            ]
        );
    }
}
