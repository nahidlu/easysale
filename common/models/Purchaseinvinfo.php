<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%purchaseinvinfo}}".
 *
 * @property string $InvoiceNo
 * @property integer $SupplierID
 * @property string $InvoiceDate
 * @property string $ReceivedDate
 * @property double $SubTotal
 * @property double $TotalVat
 * @property double $Discount
 * @property double $CarryingCost
 * @property double $InvTotal
 * @property double $InvTotalInRupee
 * @property double $CurrencyExRate
 * @property double $LC
 * @property integer $ShopID
 */
class Purchaseinvinfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%purchaseinvinfo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['InvoiceNo','SupplierID','ShopID'], 'required'],
            [['SupplierID', 'ShopID'], 'integer'],
            [['InvoiceDate', 'ReceivedDate'], 'safe'],
            [['SubTotal', 'TotalVat', 'Discount', 'CarryingCost', 'InvTotal', 'InvTotalInRupee', 'CurrencyExRate', 'LC'], 'number'],
            [['InvoiceNo'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'InvoiceNo' => 'Invoice No',
            'SupplierID' => 'Supplier ID',
            'InvoiceDate' => 'Invoice Date',
            'ReceivedDate' => 'Received Date',
            'SubTotal' => 'Sub Total',
            'TotalVat' => 'Total Vat',
            'Discount' => 'Discount',
            'CarryingCost' => 'Carrying Cost',
            'InvTotal' => 'Inv Total',
            'InvTotalInRupee' => 'Inv Total In Rupee',
            'CurrencyExRate' => 'Currency Ex Rate',
            'LC' => 'Lc',
            'ShopID' => 'Shop ID',
        ];
    }
}
