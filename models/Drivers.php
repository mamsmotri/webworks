<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Drivers".
 *
 * @property integer $PK_Drivers
 * @property string $DriverName
 * @property string $DriverCar
 * @property string $DriverPhoneNumber
 *
 * @property Reviews $pKDrivers
 * @property Requests $requests
 */
class Drivers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Drivers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DriverName', 'DriverCar', 'DriverPhoneNumber'], 'required'],
            [['DriverName', 'DriverCar', 'DriverPhoneNumber'], 'string'],
            [['PK_Drivers'], 'exist', 'skipOnError' => true, 'targetClass' => Reviews::className(), 'targetAttribute' => ['PK_Drivers' => 'PK_Drivers']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PK_Drivers' => 'Pk  Drivers',
            'DriverName' => 'Driver Name',
            'DriverCar' => 'Driver Car',
            'DriverPhoneNumber' => 'Driver Phone Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPKDrivers()
    {
        return $this->hasOne(Reviews::className(), ['PK_Drivers' => 'PK_Drivers']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasOne(Requests::className(), ['PK_Drivers' => 'PK_Drivers']);
    }
}
