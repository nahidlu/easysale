<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%customer}}".
 *
 * @property string $CustomerID
 * @property string $CustomerName
 * @property string $Address
 * @property string $MobileNo
 * @property string $DiscountCardID
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%customer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Address'], 'string'],
            [['CustomerName'], 'string', 'max' => 100],
            [['MobileNo', 'DiscountCardID'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CustomerID' => 'Customer ID',
            'CustomerName' => 'Customer Name',
            'Address' => 'Address',
            'MobileNo' => 'Mobile No',
            'DiscountCardID' => 'Discount Card ID',
        ];
    }
}
