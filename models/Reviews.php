<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Reviews".
 *
 * @property integer $PK_Reviews
 * @property integer $PK_Masters
 * @property integer $PK_Drivers
 * @property string $Text
 *
 * @property Drivers $drivers
 * @property Masters $masters
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
            [['PK_Masters', 'PK_Drivers', 'Text'], 'required'],
            [['PK_Masters', 'PK_Drivers'], 'integer'],
            [['Text'], 'string'],
            [['PK_Masters'], 'unique'],
            [['PK_Drivers'], 'unique'],
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
            'PK_Drivers' => 'Pk  Drivers',
            'Text' => 'Text',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrivers()
    {
        return $this->hasOne(Drivers::className(), ['PK_Drivers' => 'PK_Drivers']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMasters()
    {
        return $this->hasOne(Masters::className(), ['PK_Masters' => 'PK_Masters']);
    }
}
