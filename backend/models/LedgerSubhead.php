<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%ledger_subhead}}".
 *
 * @property integer $subHeadID
 * @property integer $generalLedgerID
 * @property string $name
 */
class LedgerSubhead extends \yii\db\ActiveRecord
{
	const ASSETS = 101;
	const LIABILITY = 102;
	const INCOME = 103;
	const EXPENSE = 104;
	const EQUITY = 105;
	
	const CASH_IN_HAND = 123;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ledger_subhead}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['generalLedgerID', 'name'], 'required'],
            [['generalLedgerID'], 'integer'],
            [['name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'subHeadID' => 'Sub Head ID',
            'generalLedgerID' => 'General Ledger ID',
            'name' => 'Name',
        ];
    }
	
	public function GeneralLedgerWiseSubheadList($glID)
	{
		$query=self::find()
				->select('subHeadID,name')
				->where(['generalLedgerID'=>$glID])
				->all();					
		$list='<option value="">Select Sub Head</option>';
		foreach ($query as $val)
		{
			$list.='<option value="'.$val->subHeadID.'">'.$val->name.'</option>';
		}
		return $list;
	}
	
	public function getSubheadList()
	{
		$query=self::find()->all();
		return $query;
	}
	
	
	
}
