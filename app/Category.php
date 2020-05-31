<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Category
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereSlug($value)
 * @method static Builder|Category whereName($value)
 * @method static Builder|Category whereDescription($value)
 * @method static Builder|Category whereUpdatedAt($value)
 * @method static Category create($values)
 * @mixin Model
 * @property-read Collection|Blog[] $blogs
 */
class Category extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model)
        {
            $model->generateSlug();
        });
    }

    protected function generateSlug()
    {
        $this->slug = \Illuminate\Support\Str::slug($this->name);
    }

    protected $guarded = ['id'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
