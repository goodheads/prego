<?php

namespace Prego;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['task_name', 'project_id'];

    public function scopeProject($query, $id)
    {
        return $query->where('project_id', $id);
    }

}
