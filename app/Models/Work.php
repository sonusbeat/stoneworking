<?php

namespace Stoneworking\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'name', 'permalink',
        'image', 'image_alt','active', 'description',
        'meta_title', 'meta_description', 'meta_robots'
    ];

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWorks($query)
    {
        return $query->orderBy('name')
            ->select('category_id','name','permalink','image','image_alt')
            ->where('active',true)
            ->get();
    }

    // ADMIN

    /**
     * Get all jobs with category
     *
     * @param $query
     * @param string $order
     * @return Query
     */
    public static function OrderedWithCategory($categoryId, $order='asc')
    {
        return self::where('category_id', $categoryId)
            ->orderBy('created_at',$order)
            ->with(['category' => function($query) {
                $query->select('id','name','permalink');
            }])
            ->get();
    }

    /**
     * Get work with category permalink
     *
     * @param string $permalink
     * @return Query
     */
    public static function publicWork($permalink)
    {
        return self::select([
            'works.id',
            'works.name',
            'works.permalink',
            'works.image',
            'works.image_alt',
            'works.active',
            'works.description',
            'works.meta_title',
            'works.meta_description',
            'works.meta_robots',
            \DB::raw('categories.permalink as category_permalink')
        ])
            ->leftJoin('categories','categories.id','=','works.category_id')
            ->where('works.permalink',$permalink)
            ->first();
    }

    /**
     * Get the category that owns the work.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
