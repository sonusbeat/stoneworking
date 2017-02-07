<?php

namespace Stoneworking\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'permalink', 'active',
        'meta_title', 'meta_description', 'meta_robots'
    ];

    /**
     * Get categories with works count
     *
     * @param string $order
     * @return Query
     */
    public static function getCategoriesWithWorksCount($order='asc')
    {
        return static::select([
                'categories.id',
                'categories.name',
                'categories.permalink',
                'categories.active',
                DB::raw('COUNT(DISTINCT works.id) as works_count'),
            ])
            ->leftJoin('works','works.category_id','=','categories.id')
            ->groupBy('categories.name')
            ->orderBy('categories.name', $order)
            ->get();
    }

    /*---------------------------- PUBLIC ----------------------------*/

    public function PublicLatestWorks($categoryId, $limit)
    {
        return $this->works()->select([
            'category_id',
            'name',
            'permalink',
            'image',
            'image_alt',
            'active'
        ])
            ->where([
                'active' => true,
                'category_id' => $categoryId
            ])
            ->latest()
            ->take($limit)
            ->get();
    }

    /**
     * Get category with its works
     *
     * @param string $permalink
     * @return mixed
     */
    public static function publicCategoryWithWorks($permalink)
    {
        return self::where([
                'permalink' => $permalink,
                'active' => true,
            ])
            ->select([
                'id',
                'name',
                'permalink',
                'active'
            ])
            ->with(['works' => function($query) {
                return $query->select([
                        'category_id',
                        'name',
                        'permalink',
                        'image',
                        'image_alt',
                        'description',
                        'active'
                    ])
                    ->where('active', true)
                    ->orderBy('created_at','desc')
                    ->take(16)
                    ->get();
            }])
            ->first();
    }

    /* ------------------- Relationships ------------------- */

    /**
     * Set category section relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongTo
     */
    public function section()
    {
        return $this->belongsTo(section::class);
    }

    /**
     * Get the works for current category.
     *
     * @return HasMany
     */
//    public function works()
//    {
//        return $this->hasMany(Work::class);
//    }

    /**
     * Get the works for current category.
     *
     * @return HasMany
     */
    public function works()
    {
        return $this->hasMany(Work::class);
    }
}
