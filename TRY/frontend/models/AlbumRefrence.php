<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "albumRefrence".
 *
 * @property integer $id
 * @property integer $albumId
 * @property string $pics
 * @property integer $photoOrder
 * @property integer $albumCount
 * @property string $createdOn
 * @property string $updatedOn
 *
 * @property UserAlbum $album
 */
class AlbumRefrence extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'albumRefrence';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['albumId', 'pics', 'photoOrder', 'createdOn'], 'required'],
            [['albumId', 'albumCount'], 'integer'],
            [['createdOn', 'updatedOn'], 'safe'],
            [['photoOrder'], 'string', 'max' => 1],
            //[['pics'], 'file'],
            [['pics'], 'file', 'maxFiles' => 5],
            [['albumId'], 'exist', 'skipOnError' => true, 'targetClass' => UserAlbum::className(), 'targetAttribute' => ['albumId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'albumId' => 'Album ID',
            'pics' => 'Pics',
            'photoOrder' => 'Photo Order',
            'albumCount' => 'Album Count',
            'createdOn' => 'Created On',
            'updatedOn' => 'Updated On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbum()
    {
        return $this->hasOne(UserAlbum::className(), ['id' => 'albumId']);
    }
}
