<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_shop".
 *
 * @property integer $ShopID
 * @property string $ShopName
 * @property string $Address1
 * @property string $Address2
 * @property string $ContactNo
 * @property string $ContactPerson
 * @property string $Logo
 * @property string $Slogan
 */
class Shop extends \yii\db\ActiveRecord
{
    
	public $username;
	public $password;
	public $usertype;
	
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
			//[['ShopID'], 'required'],
			[['ShopID'], 'string', 'max' => 255],
            [['Address1', 'Address2', 'Logo', 'Slogan','ShopID'], 'string'],
            [['ShopName', 'ContactPerson'], 'string', 'max' => 100],
            [['ContactNo'], 'string', 'max' => 50],
			
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ShopID' => 'Shop ID',
            'ShopName' => 'Shop Name',
            'Address1' => 'Address1',
            'Address2' => 'Address2',
            'ContactNo' => 'Contact No',
            'ContactPerson' => 'Contact Person',
            'Logo' => 'Logo',
            'Slogan' => 'Slogan',
        ];
    }
	
	public function guid(){
		 if (function_exists('com_create_guid')) {
        return com_create_guid();
		} else {
			mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
			$charid = strtoupper(md5(uniqid(rand(), true)));
			$hyphen = chr(45);// "-"
			$uuid = chr(123)// "{"
					.substr($charid, 0, 8).$hyphen
					.substr($charid, 8, 4).$hyphen
					.substr($charid,12, 4).$hyphen
					.substr($charid,16, 4).$hyphen
					.substr($charid,20,12)
					.chr(125);// "}"
			return $uuid;
    }
	}	
}
