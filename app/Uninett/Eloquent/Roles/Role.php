<?php namespace Uninett\Eloquent\Roles;

use Eloquent;

class Role extends Eloquent {

    /**
     * Fillable fields for a new Role
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * A role belongs to many users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('Uninett\Eloquent\Users\User');
    }
}