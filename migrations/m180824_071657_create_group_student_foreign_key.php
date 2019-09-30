<?php

use yii\db\Migration;

/**
 * Class m180824_071657_create_group_student_foreign_key
 */
class m180824_071657_create_group_student_foreign_key extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-group-groupId',
            'student',
            'groupId',
            'group',
            'id',
            'CASCADE'
        );
    }
}
