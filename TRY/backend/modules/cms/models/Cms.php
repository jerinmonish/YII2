<?php

namespace backend\modules\cms\models;

use Yii;

/**
 * This is the model class for table "Cms".
 *
 * @property integer $id
 * @property string $title
 * @property string $seoTitle
 * @property string $status
 * @property string $createdOn
 * @property string $modifiedOn
 * @property string $description
 */
class Cms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Cms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['title'],'unique'],
            [['modifiedOn'],'required', 'on'=>'update'],
            [['status', 'description'], 'string'],
            [['createdOn', 'modifiedOn'], 'safe'],
            [['title', 'seoTitle'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'seoTitle' => 'Seo Title',
            'status' => 'Status',
            'createdOn' => 'Created On',
            'modifiedOn' => 'Modified On',
            'description' => 'Description',
        ];
    }
}
