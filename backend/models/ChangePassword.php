<?php
namespace backend\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class ChangePassword extends Model
{
    public $oldPassword;
    public $newPassword;
    public $confirmPassword;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['oldPassword', 'newPassword', 'confirmPassword'], 'required'],
			['confirmPassword', 'compare', 'compareAttribute' => 'newPassword'],
            /* ['oldPassword', 'validatePassword'], */
            
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function checkOldPassword($oldPass)
    {
		$id = Yii::$app->user->identity->id; /* get user id*/
		$model = AdminUser::findOne($id);
		if($model->password == $this->hashPassword($oldPass))
		{
			return true;
		}
		else
		{
			return false;
		}
        
    }

    private function hashPassword($password)
	{
		return md5($password);
	}
	
	public function updatePassword($newPassword)
	{
		$id = Yii::$app->user->identity->id;
		$query = AdminUser::updateAll(['password' => $this->hashPassword($newPassword)], 'ID = '.$id);
		if($query)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	

    
}
