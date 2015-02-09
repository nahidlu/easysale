<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%employee_attendance}}".
 *
 * @property integer $ID
 * @property integer $empID
 * @property string $date
 * @property string $startTime
 * @property string $endTime
 */
class EmployeeAttendance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%employee_attendance}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['empID', 'date', 'startTime'], 'required'],
            [['empID'], 'integer'],
            [['date', 'startTime', 'endTime'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'empID' => 'Emp ID',
            'date' => 'Date',
            'startTime' => 'Start Time',
            'endTime' => 'End Time',
        ];
    }
	
	public function getTodaysList()
	{
		$query=self::find()
				->where(['date'=>date('Y-m-d')])
				->all();
		return $query;
	}
	
	
	
	
	
}
