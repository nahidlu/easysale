<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%purchaseproductinfo}}".
 *
 * @property string $SN
 * @property integer $SupplierID
 * @property string $InvoiceNo
 * @property string $ProductCategoryID
 * @property string $ProductID
 * @property double $UnitCost
 * @property double $UnitCostInRupee
 * @property integer $Qty
 * @property double $TotalAmount
 * @property double $SalesPrice
 * @property double $VatAmount
 * @property double $Discount
 * @property integer $ShopID
 * @property string $InvoiceNoHidden
 */
class Purchaseproductinfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%purchaseproductinfo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SupplierID', 'ProductCategoryID', 'Qty', 'ShopID'], 'integer'],
            [['UnitCost', 'UnitCostInRupee', 'TotalAmount', 'SalesPrice', 'VatAmount', 'Discount'], 'number'],
            [['InvoiceNo'], 'string', 'max' => 100],
            [['ProductID', 'InvoiceNoHidden'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SN' => 'Sn',
            'SupplierID' => 'Supplier ID',
            'InvoiceNo' => 'Invoice No',
            'ProductCategoryID' => 'Product Category ID',
            'ProductID' => 'Product ID',
            'UnitCost' => 'Unit Cost',
            'UnitCostInRupee' => 'Unit Cost In Rupee',
            'Qty' => 'Qty',
            'TotalAmount' => 'Total Amount',
            'SalesPrice' => 'Sales Price',
            'VatAmount' => 'Vat Amount',
            'Discount' => 'Discount',
            'ShopID' => 'Shop ID',
            'InvoiceNoHidden' => 'Invoice No Hidden',
        ];
    }
}
