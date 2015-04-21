<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%salesinvinfo}}".
 *
 * @property string $SN
 * @property string $SalesInvoiceNo
 * @property string $SalesDate
 * @property string $CounterNo
 * @property double $CartTotal
 * @property double $Discount
 * @property double $Vat
 * @property double $GrandTotal
 * @property double $DueAmount
 * @property string $PaymentMode
 * @property string $CustomerID
 * @property string $CustomerMobileNo
 * @property string $DiscountCardNo
 * @property double $DiscountCardAmount
 * @property integer $AdvanceStatus
 * @property double $Profit
 * @property string $SalesBy
 * @property integer $ShopID
 * @property string $DiscountGivenBy
 */
class Salesinvinfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%salesinvinfo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SN', 'SalesInvoiceNo'], 'required'],
            [['SN', 'CustomerID', 'AdvanceStatus', 'ShopID', 'DiscountGivenBy'], 'integer'],
            [['SalesDate'], 'safe'],
            [['CartTotal', 'Discount', 'Vat', 'GrandTotal', 'DueAmount', 'DiscountCardAmount', 'Profit'], 'number'],
            [['SalesInvoiceNo', 'CounterNo', 'PaymentMode', 'CustomerMobileNo', 'DiscountCardNo', 'SalesBy'], 'string', 'max' => 50]
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
            'SalesDate' => 'Sales Date',
            'CounterNo' => 'Counter No',
            'CartTotal' => 'Cart Total',
            'Discount' => 'Discount',
            'Vat' => 'Vat',
            'GrandTotal' => 'Grand Total',
            'DueAmount' => 'Due Amount',
            'PaymentMode' => 'Payment Mode',
            'CustomerID' => 'Customer ID',
            'CustomerMobileNo' => 'Customer Mobile No',
            'DiscountCardNo' => 'Discount Card No',
            'DiscountCardAmount' => 'Discount Card Amount',
            'AdvanceStatus' => 'Advance Status',
            'Profit' => 'Profit',
            'SalesBy' => 'Sales By',
            'ShopID' => 'Shop ID',
            'DiscountGivenBy' => 'Discount Given By',
        ];
    }
}
