<?php

namespace app\models;

use Yii;
use webvimark\modules\UserManagement\models\User;
/**
 * This is the model class for table "Reviews".
 *
 * @property integer $PK_Reviews
 * @property integer $PK_Masters
 * @property integer $user_id
 * @property string $Text
 *
 * @property Masters $pKMasters
 * @property User $user
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Reviews';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PK_Masters', 'user_id', 'Text'], 'required'],
            [['PK_Masters', 'user_id'], 'integer'],
            [['Text'], 'string'],
            [['PK_Masters'], 'unique'],
            [['user_id'], 'unique'],
            [['PK_Masters'], 'exist', 'skipOnError' => true, 'targetClass' => Masters::className(), 'targetAttribute' => ['PK_Masters' => 'PK_Masters']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PK_Reviews' => 'Pk  Reviews',
            'PK_Masters' => 'Pk  Masters',
            'user_id' => 'User ID',
            'Text' => 'Text',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPKMasters()
    {
        return $this->hasOne(Masters::className(), ['PK_Masters' => 'PK_Masters']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
