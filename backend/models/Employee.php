<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%employee}}".
 *
 * @property integer $empID
 * @property string $name
 * @property string $fathersName
 * @property integer $cellNo
 * @property string $address
 * @property string $position
 * @property string $skills
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%employee}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'fathersName', 'cellNo', 'address', 'position', 'skills'], 'required'],
            [['cellNo'], 'integer'],
            [['address', 'skills'], 'string'],
            [['name', 'fathersName'], 'string', 'max' => 100],
            [['position'], 'string', 'max' => 125]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'empID' => 'Emp ID',
            'name' => 'Name',
            'fathersName' => 'Fathers Name',
            'cellNo' => 'Cell No',
            'address' => 'Address',
            'position' => 'Position',
            'skills' => 'Skills',
        ];
    }
	
	public function getEmployeeList()
	{
		$query=self::find()->all();
		return $query;
	}
	
	public static function getEmployeeName($empID)
	{
		$query=self::find()
				->select('name')
				->where(['empID'=>$empID])
				->one();
		return $query->name;		
	}
	
	
	
}
