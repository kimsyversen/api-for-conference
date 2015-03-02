<?php namespace Uninett\Eloquent\Maps;

use Eloquent;

class Map extends Eloquent {
    
    /**
     * Fillable fields for a new Map
     *
     * @var array
     */
    protected $fillable = [];


    /**
     * A map belongs to a conference
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conference()
    {
        return $this->belongsTo('Uninett\Eloquent\Conferences\Conference');
    }

}