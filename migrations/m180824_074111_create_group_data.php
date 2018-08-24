<?php

use yii\db\Migration;

/**
 * Class m180824_074111_create_student_data
 */
class m180824_074111_create_group_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%group}}', ['name'], [
                ['532'],
                ['582-2'],
                ['582-1'],
                ['512'],
            ]
        );
    }
}
