<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface
{
    # Get all models
    public function all(array $columns = ['*'], array $relations = []): Collection;

    # Create a model
    public function create(array $payload): ?Model;

    # Update existing model
    public function update(int $modelId, array $payload): bool;

    #Delete a model
    public function delete(int $modelId): bool;

    public function findById(
        int $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $appends = []
    ): ?Model;
}
