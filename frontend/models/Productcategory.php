<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_productcategory".
 *
 * @property string $CategoryID
 * @property string $CategoryName
 */
class Productcategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_productcategory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CategoryName'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CategoryID' => 'Category ID',
            'CategoryName' => 'Category Name',
        ];
    }
}
