<?php

namespace nuffic\profile\models;

use yii\helpers\ArrayHelper;

class Admin extends \yii\easyii\models\Admin
{
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            
        ]);
    }
}
