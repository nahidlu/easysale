<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_supplier".
 *
 * @property integer $SupplierID
 * @property string $SupplierName
 * @property string $Address
 * @property string $ContactNo
 * @property string $ContactPerson
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_supplier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Address'], 'string'],
            [['SupplierName', 'ContactPerson'], 'string', 'max' => 100],
            [['ContactNo'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SupplierID' => 'Supplier ID',
            'SupplierName' => 'Supplier Name',
            'Address' => 'Address',
            'ContactNo' => 'Contact No',
            'ContactPerson' => 'Contact Person',
        ];
    }
}
