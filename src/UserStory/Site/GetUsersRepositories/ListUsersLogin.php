<?php

declare(strict_types=1);

namespace GhInfo\UserStory\Site\GetUsersRepositories;

use app\models\GhUser;
use yii\helpers\ArrayHelper;

class ListUsersLogin
{
    public function value(): array
    {
        return ArrayHelper::getColumn(
            GhUser::find()->all(),
            'login'
        );
    }
}