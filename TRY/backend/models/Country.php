<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property integer $id
 * @property string $sort_name
 * @property string $name
 * @property string $status
 * @property string $created_on
 * @property string $modified_on
 * @property string $ip
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sort_name', 'name'], 'required'],
            [['id'], 'integer'],
            [['status'], 'string'],
            [['created_on', 'modified_on'], 'safe'],
            [['sort_name'], 'string', 'max' => 4],
            [['name'], 'string', 'max' => 255],
            [['ip'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sort_name' => 'Sort Name',
            'name' => 'Name',
            'status' => 'Status',
            'created_on' => 'Created On',
            'modified_on' => 'Modified On',
            'ip' => 'Ip',
        ];
    }
}
