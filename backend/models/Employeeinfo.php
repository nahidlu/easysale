<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_employeeinfo".
 *
 * @property integer $employeeid
 * @property string $name
 * @property string $contact
 * @property string $address
 */
class Employeeinfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_employeeinfo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employeeid', 'name', 'contact', 'address'], 'required'],
            [['employeeid'], 'integer'],
            [['name', 'contact', 'address'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'employeeid' => 'Employeeid',
            'name' => 'Name',
            'contact' => 'Contact',
            'address' => 'Address',
        ];
    }
}
