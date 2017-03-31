<?php

namespace Stoneworking\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','permalink'];

    /**
     * Belongs To Many News Releationship
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function works()
    {
        return $this->belongsToMany(Work::class)->withTimestamps();
    }
}
