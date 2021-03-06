<?php

namespace Stoneworking\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Stoneworking\Models\Work
 *
 * @property-read \Stoneworking\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\Stoneworking\Models\Tag[] $tags
 * @method static \Illuminate\Database\Query\Builder|\Stoneworking\Models\Work works()
 * @mixin \Eloquent
 */
class Work extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'name', 'permalink',
        'image', 'image_alt','material','active', 'description',
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

    ######################### ADMIN #########################

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
            ->orderBy('works.created_at',$order)
            ->select([
                'works.id',
                'works.category_id',
                'works.name',
                'works.permalink',
                'works.material',
                'works.active',
                \DB::raw('categories.name as category_name'),
                \DB::raw('categories.permalink as category_permalink'),
                \DB::raw('COUNT(DISTINCT work_images.id) as images_count')
            ])
            ->leftJoin('categories','categories.id','=','works.category_id')
            ->leftJoin('work_images','work_images.work_id','=','works.id')
            ->groupBy('works.name')
            ->get();
    }

    /**
     * Get admin work
     *
     * @param Query $query
     * @param string $permalink
     * @return Query
     */
    public static function details($permalink)
    {
        return self::where('permalink',$permalink)->with('images')->first();
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
            'works.material',
            'works.active',
            'works.description',
            'works.meta_title',
            'works.meta_description',
            'works.meta_robots',
            \DB::raw('categories.name as category_name'),
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

    /**
     * Belongs And Has Many Tags Relationship
     *
     * @return BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    /**
     * Has Many Work Images Relationship
     *
     * @return HasMany
     */
    public function images()
    {
        return $this->hasMany(WorkImage::class);
    }
}
