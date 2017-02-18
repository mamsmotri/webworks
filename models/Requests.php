<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Requests".
 *
 * @property integer $PK_Requests
 * @property integer $PK_Drivers
 * @property string $Text
 *
 * @property Drivers $pKDrivers
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
            [['PK_Drivers', 'Text'], 'required'],
            [['PK_Drivers'], 'integer'],
            [['Text'], 'string'],
            [['PK_Drivers'], 'unique'],
            [['PK_Drivers'], 'exist', 'skipOnError' => true, 'targetClass' => Drivers::className(), 'targetAttribute' => ['PK_Drivers' => 'PK_Drivers']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PK_Requests' => 'Pk  Requests',
            'PK_Drivers' => 'Pk  Drivers',
            'Text' => 'Text',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPKDrivers()
    {
        return $this->hasOne(Drivers::className(), ['PK_Drivers' => 'PK_Drivers']);
    }
}
