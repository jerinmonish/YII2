<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "quotes".
 *
 * @property integer $id
 * @property string $quote
 * @property string $status
 * @property string $createdOn
 */
class Quotes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quotes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quote', 'status'], 'required'],
            [['status'], 'string'],
            [['createdOn'], 'safe'],
            [['quote'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quote' => 'Quote',
            'status' => 'Status',
            'createdOn' => 'Created On',
        ];
    }
}
