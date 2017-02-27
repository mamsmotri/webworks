<?php

namespace app\models;

use Yii;
use webvimark\modules\UserManagement\models\User;

/**
 * This is the model class for table "Requests".
 *
 * @property integer $PK_Requests
 * @property string $Car
 * @property integer $user_id
 * @property string $Phone
 * @property string $Text
 *
 * @property User $user
 */
class Requests extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Requests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Car', 'user_id', 'Phone', 'Text'], 'required'],
            [['Car', 'Phone', 'Text'], 'string'],
            [['user_id'], 'integer'],
            [['user_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => false, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PK_Requests' => 'Pk  Requests',
            'Car' => 'Марка машины',
            'user_id' => 'User ID',
            'Phone' => 'Ваш телефон для связи',
            'Text' => 'Текст заявки на ремонт',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
