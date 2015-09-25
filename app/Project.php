<?php

namespace Prego;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function scopePersonal($query)
    {
        return $query->where('user_id', Auth::user()->id);
    }
}
