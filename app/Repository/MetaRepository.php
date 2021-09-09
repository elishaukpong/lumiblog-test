<?php

namespace App\Repository;

use App\Contracts\MetaInterface;
use App\Models\Meta;

class MetaRepository extends BaseRepository implements MetaInterface
{
    protected function getModelClass(): string
    {
        return Meta::class;
    }
}
