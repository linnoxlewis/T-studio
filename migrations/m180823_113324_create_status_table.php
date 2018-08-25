<?php

use yii\db\Migration;

/**
 * Handles the creation of table `status`.
 */
class m180823_113324_create_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('status', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);



        $this->batchInsert('{{%status}}', ['name'], [
                ['На согласовании'],
                ['Согласовано'],
                ['Отклонено'],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('status');
    }
}
