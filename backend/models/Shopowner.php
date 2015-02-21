<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_shopowner".
 *
 * @property integer $owner_id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $business_name
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 */
class Shopowner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_shopowner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'phone', 'business_name', 'created_at', 'status'], 'required'],
            [['address'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 20],
            [['business_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'owner_id' => 'Owner ID',
            'name' => 'Name',
            'address' => 'Address',
            'phone' => 'Phone',
            'business_name' => 'Business Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }
}
