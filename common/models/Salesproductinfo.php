<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%salesproductinfo}}".
 *
 * @property string $SN
 * @property string $SalesInvoiceNo
 * @property string $ProductID
 * @property string $ProductCategoryID
 * @property double $SalesPrice
 * @property integer $Qty
 * @property double $TotalAmount
 * @property double $VatAmount
 * @property double $Discount
 * @property string $SalesDate
 * @property string $PurchaseInvNo
 */
class Salesproductinfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%salesproductinfo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ProductCategoryID', 'Qty'], 'integer'],
            [['SalesPrice', 'TotalAmount', 'VatAmount', 'Discount'], 'number'],
            [['SalesDate'], 'safe'],
            [['SalesInvoiceNo', 'ProductID', 'PurchaseInvNo'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SN' => 'Sn',
            'SalesInvoiceNo' => 'Sales Invoice No',
            'ProductID' => 'Product ID',
            'ProductCategoryID' => 'Product Category ID',
            'SalesPrice' => 'Sales Price',
            'Qty' => 'Qty',
            'TotalAmount' => 'Total Amount',
            'VatAmount' => 'Vat Amount',
            'Discount' => 'Discount',
            'SalesDate' => 'Sales Date',
            'PurchaseInvNo' => 'Purchase Inv No',
        ];
    }
}
