<?php

use yii\db\Migration;

/**
 * Handles the creation of table `StudentGroupeCourseWithTeacher`.
 */
class m180824_072600_create_studentGroupeCourseWithTeacher_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('studentGroupeCourseWithTeacher', [
            'id' => $this->primaryKey(),
            'teacherId' => $this->integer(),
            'groupId' => $this->integer(),
            'courseId' => $this->integer(),
            'status' => $this->string()
        ]);

        $this->addForeignKey(
            'fk-sTeacher-groupId',
            'studentGroupeCourseWithTeacher',
            'teacherId',
            'teacher',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-sGroup-groupId',
            'studentGroupeCourseWithTeacher',
            'groupId',
            'group',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-sCourse-groupId',
            'studentGroupeCourseWithTeacher',
            'courseId',
            'course',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('StudentGroupeCourseWithTeacher');
    }
}
