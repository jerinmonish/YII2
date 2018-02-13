<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property integer $id
 * @property string $courseImage
 * @property string $title
 * @property string $description
 * @property string $createdOn
 */
class Course extends \yii\db\ActiveRecord
{

    public $existingCourseImage;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['courseImage', 'title', 'description'], 'required'],
            [['description'], 'string'],
            [['createdOn'], 'safe'],
            [['courseImage'], 'string', 'max' => 50],
            //[['courseId'],'message'=>'Course Name is required'],
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'courseImage' => 'Course Image',
            'title' => 'Title',
            'description' => 'Description',
            'createdOn' => 'Created On',
        ];
    }
}
