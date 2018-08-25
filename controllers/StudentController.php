<?php

namespace app\controllers;

use app\models\Student;
use app\models\SearchStudent;
use Yii;

/**
 * Контроллер для работы со студентами.
 */
class StudentController extends CommonController
{
    /**
     * Возвращает имя модели
     *
     * @return string
     */
    protected function getModelName(): string
    {
        return Student::class;
    }

    /**
     * Возвращает имя поисковой модели
     *
     * @return string
     */
    protected function getSearchModelName(): string
    {
        return SearchStudent::class;
    }

    /**
     * Возвращает модель
     *
     * @param int|null $id
     *
     * @return Student
     */
    protected function getModel(int $id = null): Student
    {
        if (null == $id) {
            $modelName = $this->getModelName();
            return new $modelName;
        }

        return $this->findModel($id);
    }

    /**
     * Создаёт новую модель студента.Перегружаем метод базового контроллера ввиду добавления логики логирования.
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Student();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $messageLog = "Студент " . $model->name . " " . $model->surname . " добавлен";
            $this->on(Student::EVENT_ADD_NEW_STUDENT, [$this, Yii::info($messageLog, 'student')]);

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Получение студентов по группе.
     *
     * @param int $idGroup id группы
     *
     * @return string
     */
    public function actionGetStudentForGroup(int $idGroup)
    {
        $model = new SearchStudent();
        $dataProvider = $model->searchStudent($idGroup);

        return $this->render('studentInGroup', [
            'dataProvider' => $dataProvider,
        ]);

    }
}
