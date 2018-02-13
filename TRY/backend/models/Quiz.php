<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "quiz".
 *
 * @property integer $id
 * @property string $question
 * @property string $answer
 * @property string $option1
 * @property string $option2
 * @property string $option3
 * @property string $option4
 * @property integer $courseId
 * @property integer $topicId
 * @property string $createdOn
 */
class Quiz extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quiz';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question', 'answer', 'option1', 'option2', 'option3', 'option4', 'courseId'], 'required'],
            [['courseId', 'topicId'], 'integer'],
            ['topicId', 'required','message' => 'Topics Cannot be blank'],
            [['createdOn'], 'safe'],
            [['question', 'answer', 'option1', 'option2', 'option3', 'option4'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question' => 'Question',
            'answer' => 'Answer',
            'option1' => 'Option1',
            'option2' => 'Option2',
            'option3' => 'Option3',
            'option4' => 'Option4',
            'courseId' => 'Course',
            'topicId' => 'Topic ID',
            'createdOn' => 'Created On',
        ];
    }
}
