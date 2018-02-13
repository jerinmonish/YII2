<?php

namespace backend\models;

use Yii;
use backend\models\Course;
/**
 * This is the model class for table "subCourse".
 *
 * @property integer $id
 * @property integer $course_id
 * @property string $title
 * @property string $description
 * @property string $image
 */
class SubCourse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subCourse';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'title', 'description', 'image'], 'required'],
            [['course_id'], 'integer'],
            [['createdOn'], 'safe'],
            [['description'], 'string'],
            [['title', 'image'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_id' => 'Course ID',
            'title' => 'Title',
            'description' => 'Description',
            'image' => 'Image',
            'createdOn' => 'Created On',
        ];
    }

    public function getCourse(){
        return $this->hasOne(course::className(), ['id' => 'course_id']);
    }
}
