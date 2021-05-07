<?php

declare(strict_types=1);

namespace app\models\searchies;

use app\models\GhUser;
use yii\data\ActiveDataProvider;

class GhUserSearch extends GhUser
{
    public function search()
    {
        $query = GhUser::find();

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
    }
}