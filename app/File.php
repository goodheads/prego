<?php

namespace Prego;

use Auth;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function scopeProject($query, $id)
    {
        return $query->where('project_id', $id);
    }
}
