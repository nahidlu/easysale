<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

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
			[['ProductID','ProductName','CategoryID'], 'required'],
          
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
	public function search($params)
    {
        $query = Product::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // load the seach form data and validate
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        return $dataProvider;
    }
}
