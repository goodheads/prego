<?php

namespace Prego;

use Prego\User;
use Illuminate\Database\Eloquent\Model;

class Collaboration extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_collaborator';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['project_id', 'collaborator_id'];


    /**
     * Query scope to return information about the current project
     * @param  [type] $query [description]
     * @param  [type] $id    [description]
     * @return [type]        [description]
     */
    public function scopeProject($query, $id)
    {
        return $query->where('project_id', $id);
    }

    /**
     * Get the user that is a collaborator on another project
     * @return collection
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'collaborator_id');
    }

    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

}
