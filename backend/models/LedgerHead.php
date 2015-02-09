<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%ledger_head}}".
 *
 * @property integer $headID
 * @property integer $generalLedgerID
 * @property integer $subHeadID
 * @property string $accountName
 * @property string $description
 */
class LedgerHead extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ledger_head}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['generalLedgerID', 'subHeadID', 'accountName'], 'required'],
            [['generalLedgerID', 'subHeadID'], 'integer'],
            [['description'], 'string'],
            [['accountName'], 'string', 'max' => 120]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'headID' => 'Head ID',
            'generalLedgerID' => 'General Ledger ID',
            'subHeadID' => 'Sub Head ID',
            'accountName' => 'Account Name',
            'description' => 'Description',
        ];
    }
	
	public function getDataSubheadWise($headID,$subHeadID)
	{
		$query=self::find()
				->select('accountName')
				->where(['generalLedgerID'=>$headID,'subHeadID'=>$subHeadID])
				->all();
		return $query;		
	}
	
	public function Getsubheadwiseheadlist($subHeadID)
	{
		$query=self::find()
				->select('headID,accountName')
				->where(['subHeadID'=>$subHeadID])
				->all();					
		$list='<option value="">Select Head</option>';
		foreach ($query as $val)
		{
			$list.='<option value="'.$val->headID.'">'.$val->accountName.'</option>';
		}
		return $list;
	}
	
	public static function GetHeadList($subHeadID)
	{
		$headList = LedgerHead::find()
				->select('headID,accountName')
				->where(['subHeadID'=>$subHeadID])
				->all();
		$list = array();
		foreach($headList as $val)
		{
			$list[$val->headID]=$val->accountName;
		}
		return $list;
		//$list = json_encode($list);
		//print_r($list);
	}
	
	
	
}
