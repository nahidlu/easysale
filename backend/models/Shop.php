<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_shop".
 *
 * @property integer $shopid
 * @property string $ShopName
 * @property string $Address1
 * @property string $Address2
 * @property string $ContactNo
 * @property string $owner_name
 * @property string $Logo
 * @property string $Slogan
 * @property integer $owner_id
 * @property string $shop_type
 * @property integer $status
 */
class Shop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_shop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Address1', 'Address2', 'Logo', 'Slogan'], 'string'],
            [['owner_id', 'shop_type', 'status'], 'required'],
            [['owner_id', 'status'], 'integer'],
            [['ShopName', 'owner_name'], 'string', 'max' => 100],
            [['ContactNo'], 'string', 'max' => 50],
            [['shop_type'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'shopid' => 'Shopid',
            'ShopName' => 'Shop Name',
            'Address1' => 'Address1',
            'Address2' => 'Address2',
            'ContactNo' => 'Contact No',
            'owner_name' => 'Owner Name',
            'Logo' => 'Logo',
            'Slogan' => 'Slogan',
            'owner_id' => 'Owner ID',
            'shop_type' => 'Shop Type',
            'status' => 'Status',
        ];
    }
}
