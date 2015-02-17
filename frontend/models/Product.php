<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_product".
 *
 * @property string $SN
 * @property string $ProductID
 * @property string $ProductName
 * @property string $CategoryID
 * @property integer $BarcodeNeeded
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          //  [['SN', 'ProductID'], 'required'],
          //  [['sn', 'CategoryID', 'BarcodeNeeded'], 'integer'],
           // [['ProductID'], 'string', 'max' => 50],
            [['ProductName'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SN' => 'Sn',
            'ProductID' => 'Product ID',
            'ProductName' => 'Product Name',
            'CategoryID' => 'Category ID',
            'BarcodeNeeded' => 'Barcode Needed',
        ];
    }
}
