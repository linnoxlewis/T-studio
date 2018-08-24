<?php

use yii\db\Migration;

/**
 * Handles the creation of table `course`.
 */
class m180824_071830_create_course_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('course', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'duration'=> $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('course');
    }
}
