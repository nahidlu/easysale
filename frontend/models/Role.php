<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_role".
 *
 * @property integer $id
 * @property string $type
 * @property string $role
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'role'], 'required'],
            [['type', 'role'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'role' => 'Role',
        ];
    }
}
