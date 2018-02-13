<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $id
 * @property integer $state_id
 * @property string $name
 * @property string $status
 * @property string $created_on
 * @property string $modified_on
 * @property string $ip
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'state_id', 'name', 'created_on', 'ip'], 'required'],
            [['id', 'state_id'], 'integer'],
            [['status'], 'string'],
            [['created_on', 'modified_on'], 'safe'],
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
            'state_id' => 'State ID',
            'name' => 'Name',
            'status' => 'Status',
            'created_on' => 'Created On',
            'modified_on' => 'Modified On',
            'ip' => 'Ip',
        ];
    }
}
