<?php

namespace app\models;

use Yii;
use webvimark\modules\UserManagement\models\User;


/**
 * This is the model class for table "Masters".
 *
 * @property integer $PK_Masters
 * @property string $MasterName
 * @property string $MasterAddress
 * @property string $MasterPhone
 * @property string $MasterDesq
 * @property integer $user_id
 *
 * @property User $user
 * @property Reviews $reviews
 */
class Masters extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Masters';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MasterName', 'MasterAddress', 'MasterPhone', 'MasterDesq', 'user_id'], 'required'],
            [['MasterName', 'MasterAddress', 'MasterPhone', 'MasterDesq'], 'string'],
            [['user_id'], 'integer'],
            [['user_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PK_Masters' => 'Pk  Masters',
            'MasterName' => 'Название вашей мастерской',
            'MasterAddress' => 'Адрес мастерской',
            'MasterPhone' => 'Телефон для связи',
            'MasterDesq' => 'Описание мастерской (услуги, виды работ...)',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasOne(Reviews::className(), ['PK_Masters' => 'PK_Masters']);
    }
}
