<?php

use yii\db\Migration;

/**
 * Handles the creation of table `student`.
 */
class m180824_070320_create_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('student', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'surname' => $this->string(),
            'groupId' => $this->integer(),
            'photo' => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('student');
    }
}
