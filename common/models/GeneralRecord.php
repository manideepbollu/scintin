<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is a generalized model class which is extended by most of the business models in Scintin App.
 *
*/

class GeneralRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'value' => function(){return date('d/m/Y H:i:s');}, /* Ex: 01/01/2015 22:10:05 */
            ],
            BlameableBehavior::className(),
        ];
    }

}
