<?php

namespace nuffic\profile\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * Class Admin
 *
 * @package nuffic\profile\models
 *
 * @property string $username
 * @property string $password
 * @property string $access_token
 *
 * @property string $first_name
 * @property string $last_name
 * @property string $picture
 * @property string $email
 */
class Admin extends \yii\easyii\models\Admin
{
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['first_name', 'last_name'], 'string'],
            [['email'], 'email'],
            [['picture'], 'image'],
            [[
                'first_name',
                'last_name',
                'email',
                'picture',
             ], 'required'],
        ]);
    }

    public function behaviors()
    {
        return [
            'profilePicture' => [
                'class' => \mongosoft\file\UploadImageBehavior::className(),
                'attribute' => 'picture',
                'scenarios' => ['default', 'insert'],
                'path' => '@webroot/uploads/admin_pictures/{id}',
                'url' => '@web/uploads/admin_pictures/{id}',
                'placeholder' => '@vendor/nuffic/easyii-admin-profile/src/assets/img/user.png',
                'thumbs' => [
                    'icon' => ['width' => 50, 'height' => 50, 'quality' => 85],
                    'medium' => ['width' => 100, 'height' => 100, 'quality' => 85],
                    'admin_form' => ['width' => 200, 'height' => 200, 'quality' => 85],
                ],
            ],
        ];
    }

    public function attributeHints()
    {
        return [
            'password' => 'Fill only if you want to change'
        ];
    }

    public function isRoot()
    {
        return !Yii::$app->user->isGuest;
    }
}
