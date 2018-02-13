<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $prName
 * @property string $prImage
 * @property string $prPrice
 * @property string $prShortDesc
 * @property string $prLongDesc
 * @property string $prStockStatus
 * @property string $prStatus
 * @property string $prCreatedOn
 * @property string $prUpdatedOn
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prName', 'prImage', 'prPrice', 'prShortDesc', 'prLongDesc', 'prStockStatus', 'prStatus'], 'required'],
            [['prPrice'], 'number'],
            [['prLongDesc', 'prStockStatus', 'prStatus'], 'string'],
            [['prCreatedOn', 'prUpdatedOn'], 'safe'],
            [['prName'], 'string', 'max' => 100],
            [['prImage', 'prShortDesc'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prName' => 'Pr Name',
            'prImage' => 'Pr Image',
            'prPrice' => 'Pr Price',
            'prShortDesc' => 'Pr Short Desc',
            'prLongDesc' => 'Pr Long Desc',
            'prStockStatus' => 'Pr Stock Status',
            'prStatus' => 'Pr Status',
            'prCreatedOn' => 'Pr Created On',
            'prUpdatedOn' => 'Pr Updated On',
        ];
    }
}
