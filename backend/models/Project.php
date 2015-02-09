<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%project}}".
 *
 * @property integer $ID
 * @property string $projectName
 * @property string $projectType
 * @property integer $assignedTo
 * @property string $startDate
 * @property string $endDate
 * @property string $delayedDeliveryDate
 * @property string $contactPersonName
 * @property integer $contactPersonNumber
 * @property string $address
 * @property double $contractAmount
 * @property integer $status
 */
class Project extends \yii\db\ActiveRecord
{
	const WEBSITE = 1;
	const WEB_APPLICATION = 2;
	const GRAPHICS_DESIGN = 3;
	const DESKTOP_APPLICATION = 4;
	const SEO = 5;
	const TRAINING = 6;
	
	const STATUS_CLOSED = 1;
	const STATUS_PENDING = 2;
	const STATUS_WORKING = 3;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%project}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['projectName', 'projectType', 'assignedTo', 'startDate', 'endDate', 'contactPersonName', 'contactPersonNumber', 'address', 'contractAmount', 'status'], 'required'],
            [['assignedTo', 'contactPersonNumber', 'status'], 'integer'],
            [['startDate', 'endDate', 'delayedDeliveryDate'], 'safe'],
            [['address'], 'string'],
            [['contractAmount'], 'number'],
            [['projectName', 'projectType'], 'string', 'max' => 125],
            [['contactPersonName'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'projectName' => 'Project Name',
            'projectType' => 'Project Type',
            'assignedTo' => 'Assigned To',
            'startDate' => 'Start Date',
            'endDate' => 'End Date',
            'delayedDeliveryDate' => 'Delayed Delivery Date',
            'contactPersonName' => 'Contact Person Name',
            'contactPersonNumber' => 'Contact Person Number',
            'address' => 'Address',
            'contractAmount' => 'Contract Amount',
            'status' => 'Status',
        ];
    }
	
	public function getProjectList()
	{
		$query=self::find()->all();
		return $query;
	}
	
	public static function getProjectName($id)
	{
		$query=self::find()
				->select('projectName')
				->where(['ID'=>$id])
				->one();
		return $query->projectName;
	}
	
	public static function typeIdToText($type)
	{
		if($type == self::WEBSITE)
		{
			return 'Web Site';
		}
		elseif($type == self::WEB_APPLICATION)
		{
			return 'Web Application';
		}
		elseif($type == self::GRAPHICS_DESIGN)
		{
			return 'Graphics Design';
		}
		elseif($type == self::DESKTOP_APPLICATION)
		{
			return 'Desktop Application';
		}
		elseif($type == self::SEO)
		{
			return 'SEO';
		}
		elseif($type == self::TRAINING)
		{
			return 'Training';
		}
	}
	
	public static function statusIdToText($status)
	{
		if($status == self::STATUS_CLOSED)
		{
			return 'Closed';
		}
		elseif($status == self::STATUS_PENDING)
		{
			return 'Pending';
		}
		elseif($status == self::STATUS_WORKING)
		{
			return 'Working';
		}
	}
	
	
	
}
