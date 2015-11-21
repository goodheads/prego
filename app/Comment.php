<?php

namespace Prego;

use Prego\User;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['comments', 'project_id', 'user_id'];

    public function scopeProject($query, $id)
    {
        return $query->where('project_id', $id);
    }

    /**
     * Get the user that is reponsible for a comment
     * @return collection
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
