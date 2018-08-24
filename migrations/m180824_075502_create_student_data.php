<?php

use yii\db\Migration;

/**
 * Class m180824_075502_create_student_data
 */
class m180824_075502_create_student_data extends Migration
{
    public function safeUp()
    {
        $this->batchInsert('{{%student}}', ['name','surname','groupId','photo'], [
                ['Иван','Иванов',3,''],
                ['Петр','Петров',3,''],
                ['Евгений','Сидоров',1,''],
                ['Александр','Александров',3,''],
                ['Евгений','Соколов',1,''],
                ['Алексей','Антонов',3,''],
                ['Юлия','Воробьева',3,''],
                ['Александра','Леонтьева',1,''],
                ['Джон','Смит',2,''],
                ['Кертис','Джексон',2,''],
            ]
        );
    }

}
