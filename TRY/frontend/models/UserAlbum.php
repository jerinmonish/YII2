<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "userAlbum".
 *
 * @property integer $id
 * @property integer $userId
 * @property string $abName
 * @property string $abDescription
 * @property string $abIcon
 * @property string $status
 * @property string $createdOn
 * @property string $updatedOn
 *
 * @property AlbumRefrence[] $albumRefrences
 */
class UserAlbum extends \yii\db\ActiveRecord
{

    public $existingAlbumIcon;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userAlbum';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'abName', 'abDescription', 'status', 'createdOn'], 'required'],
            [['userId'], 'integer'],
            [['status'], 'string'],
            [['createdOn', 'updatedOn'], 'safe'],
            [['abName', 'abIcon'], 'string', 'max' => 150],
            [['abDescription'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'abName' => 'Ab Name',
            'abDescription' => 'Ab Description',
            'abIcon' => 'Ab Icon',
            'status' => 'Status',
            'createdOn' => 'Created On',
            'updatedOn' => 'Updated On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbumRefrences()
    {
        return $this->hasMany(AlbumRefrence::className(), ['albumId' => 'id']);
    }
}
