<?php

declare(strict_types=1);

namespace app\models;

use yii\db\ActiveRecord;


/**
 * @property int $id
 * @property string $login
 */
class GhUser extends ActiveRecord
{
    public static function tableName()
    {
        return 'gh_user';
    }

    public function rules()
    {
        return [
            ['login', 'required'],
            ['login', 'string', 'max' => 256],
            ['login', 'unique'],
        ];
    }
}