<?php

use yii\db\Migration;

/**
 * Class m180824_080750_create_curse_data
 */
class m180824_080750_create_curse_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%course}}', ['name', 'duration'], [
                ['Основы философии', 40],
                ['Теория вероятностей', 100],
                ['Веб-программирование', 105],
                ['Базы Данных', 80],
            ]
        );
    }
}
