<?php

namespace Modules\Users\Repository\Eloquent;

use Modules\Users\Repository\UserRepositoryInterface;
use Modules\Users\Entities\User;
use App\Repository\Eloquent\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $model) {
        $this->model = $model;
    }
}
