<?php

namespace Stoneworking\Models;

use Illuminate\Database\Eloquent\Model;

class WorkImage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'work_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['work_id','name','alt'];

    /**
     * Belongs to Work Relationship
     *
     * @return BelongsTo
     */
    public function work()
    {
        return $this->belongsTo(Work::class);
    }
}