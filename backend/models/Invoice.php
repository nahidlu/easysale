<?php
namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class Invoice extends Model
{
    public $attentionName;
    public $title;
	public $address;
	public $date;
	public $service;
	public $invoiceNumber;
	public $terms;
	
	public $description;
	public $quantity;
	public $unitPrice;
	public $cost;
	


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['attentionName', 'title', 'address', 'date', 'service', 'invoiceNumber', 'terms', 'description', 'quantity', 'unitPrice', 'cost'], 'safe']
            // username and password are both required
            //[['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            //['rememberMe', 'boolean'],
            // password is validated by validatePassword()
        ];
    }

    

    
}
