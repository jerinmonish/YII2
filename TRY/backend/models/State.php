<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "state".
 *
 * @property integer $id
 * @property string $state_code
 * @property integer $country_id
 * @property string $name
 * @property string $status
 * @property string $created_on
 * @property string $modified_on
 * @property string $ip
 */
class State extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'state';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'state_code', 'country_id', 'name'], 'required'],
            [['id', 'country_id'], 'integer'],
            [['status'], 'string'],
            [['created_on', 'modified_on'], 'safe'],
            [['state_code'], 'string', 'max' => 4],
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
            'state_code' => 'State Code',
            'country_id' => 'Country ID',
            'name' => 'Name',
            'status' => 'Status',
            'created_on' => 'Created On',
            'modified_on' => 'Modified On',
            'ip' => 'Ip',
        ];
    }
}
