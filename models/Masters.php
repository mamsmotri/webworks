<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Masters".
 *
 * @property integer $PK_Masters
 * @property string $MasterName
 * @property string $MasterAddress
 * @property string $MasterPhone
 * @property string $MasterDesq
 *
 * @property Reviews $pKMasters
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
            [['MasterName', 'MasterAddress', 'MasterPhone', 'MasterDesq'], 'required'],
            [['MasterName', 'MasterAddress', 'MasterPhone', 'MasterDesq'], 'string'],
            [['PK_Masters'], 'exist', 'skipOnError' => true, 'targetClass' => Reviews::className(), 'targetAttribute' => ['PK_Masters' => 'PK_Masters']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PK_Masters' => 'Pk  Masters',
            'MasterName' => 'Master Name',
            'MasterAddress' => 'Master Address',
            'MasterPhone' => 'Master Phone',
            'MasterDesq' => 'Master Desq',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPKMasters()
    {
        return $this->hasOne(Reviews::className(), ['PK_Masters' => 'PK_Masters']);
    }
}
