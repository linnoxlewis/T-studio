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
        $this->createTable('{{%studentGroupCourseWithTeacher}}', [
            'id' => $this->primaryKey(),
            'teacherId' => $this->integer(),
            'groupId' => $this->integer(),
            'courseId' => $this->integer(),
            'statusId' => $this->integer()
        ]);

        $this->addForeignKey(
            'fk-sTeacher-groupId',
            'studentGroupCourseWithTeacher',
            'teacherId',
            'teacher',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-sGroup-groupId',
            'studentGroupCourseWithTeacher',
            'groupId',
            'group',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-sCourse-groupId',
            'studentGroupCourseWithTeacher',
            'courseId',
            'course',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-sStatus-statusId',
            'studentGroupCourseWithTeacher',
            'statusId',
            'status',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%studentGroupCourseWithTeacher}}');
    }
}
