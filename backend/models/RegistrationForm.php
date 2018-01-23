<?php
/**
 * Created by PhpStorm.
 * User: zhipeng-finlai
 * Date: 2018/1/23
 * Time: 上午8:09
 */

namespace backend\models;

use dektrium\user\models\Profile;
use dektrium\user\models\RegistrationForm as BaseForm;
use dektrium\user\models\User;

class RegistrationForm extends BaseForm
{
    public $name;

    public function rules()
    {
        $rules = parent::rules();
        $rules['usernameLength'] = ['username', 'string', 'min' => 5, 'max' => 255];
        $rules['name'] = ['name', 'required'];
        return $rules;
    }

    public function attributeLabels()
    {
        $labels = parent::attributeLabels();

        $labels['name'] = \Yii::t('user', 'Full Name');

        return $labels;
    }

    public function loadAttributes(User $user)
    {
        $user->setAttributes($this->attributes);

        $profile = \Yii::createObject(Profile::className());

        $profile->setAttributes([
            'name' => $this->name,
        ]);

        $user->setProfile($profile);
    }

}
