<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "{{%ledger}}".
 *
 * @property integer $ID
 * @property string $refNO
 * @property string $transactionDate
 * @property integer $headID
 * @property string $particular
 * @property double $debit
 * @property double $credit
 * @property string $voucherNO
 */
class Ledger extends \yii\db\ActiveRecord
{
	public $amount;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ledger}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['refNO', 'transactionDate', 'headID', 'particular', 'debit', 'credit', 'voucherNO'], 'required'],
            [['transactionDate','amount'], 'safe'],
            [['headID','subHeadID','generalLedgerID'], 'integer'],
            [['particular'], 'string'],
            [['debit', 'credit'], 'number'],
            [['refNO'], 'string', 'max' => 100],
            [['voucherNO'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'refNO' => 'Ref No',
            'transactionDate' => 'Transaction Date',
            'headID' => 'Head ID',
            'particular' => 'Particular',
            'debit' => 'Debit',
            'credit' => 'Credit',
            'voucherNO' => 'Voucher No',
        ];
    }
	
	public function getLedgerData()
	{
		$query = self::find()
			->where('subHeadID !='.LedgerSubhead::CASH_IN_HAND)
			->orderBy('ID DESC')
			->all();
		return $query;	
	}
	
	
	public function searchGLwise($glid)
    {
        $query = self::find()
					->where('generalLedgerID='.$glid.' AND subHeadID!='.LedgerSubhead::CASH_IN_HAND)
					->orderBy('ID DESC')
					->all();
        return $query;
    } 
	
	
	
}
