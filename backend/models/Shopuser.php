<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_shopuser".
 *
 * @property integer $sn
 * @property string $shop_id
 * @property string $username
 * @property string $password
 * @property integer $type
 */
class Shopuser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_shopuser';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'username', 'password', 'type'], 'required'],
            [['type'], 'integer'],
            [['shop_id', 'username', 'password'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sn' => 'Sn',
            'shop_id' => 'Shop ID',
            'username' => 'Username',
            'password' => 'Password',
            'type' => 'Type',
        ];
    }
}
