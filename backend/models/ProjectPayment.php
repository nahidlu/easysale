<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%project_payment}}".
 *
 * @property integer $ID
 * @property integer $projectID
 * @property string $paymentDate
 * @property double $amount
 * @property string $paidBy
 */
class ProjectPayment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%project_payment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['projectID', 'paymentDate', 'amount', 'paidBy'], 'required'],
            [['projectID'], 'integer'],
            [['paymentDate'], 'safe'],
            [['amount'], 'number'],
            [['paidBy'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'projectID' => 'Project ID',
            'paymentDate' => 'Payment Date',
            'amount' => 'Amount',
            'paidBy' => 'Paid By',
        ];
    }
	
	public function getPaymentList()
	{
		$query=self::find()->all();
		return $query;
	}
	
	public static function getProjectWiseTotalPayment($projectID)
	{
		$query = (new \yii\db\Query())
			->select(['SUM(amount) as val'])
			->from('tbl_project_payment')
			->where(['projectID'=>$projectID])
			->one();
		return $query['val'];	
	}
	
	
	
}
