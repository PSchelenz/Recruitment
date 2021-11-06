<?php

namespace Modules\PageCreation\Repository\Eloquent;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\PageCreation\Entities\Page;
use Modules\PageCreation\Repository\PageRepositoryInterface;
use Modules\Users\Entities\User;
use App\Repository\Eloquent\BaseRepository;

class PageRepository extends BaseRepository implements PageRepositoryInterface
{
    protected $model;

    public function __construct(Page $model) {
        $this->model = $model;
    }
}
