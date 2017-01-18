<?php

namespace CodeEduBook\Repositories;

use CodePub\Criteria\CriteriaTrashedInterface;
use CodePub\Repositories\RepositoryRestoreInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CategoryRepository
 * @package namespace CodePub\Repositories;
 */
interface CategoryRepository extends
    RepositoryInterface,
    CriteriaTrashedInterface,
    RepositoryRestoreInterface
{
    public function listsWithMutators($column, $key = null);
}
