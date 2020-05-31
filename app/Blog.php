<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Blog
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property string $slug
 * @property int $user_id
 * @property int $category_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Blog newModelQuery()
 * @method static Builder|Blog newQuery()
 * @method static Builder|Blog query()
 * @method static Builder|Blog whereCreatedAt($value)
 * @method static Builder|Blog whereId($value)
 * @method static Builder|Blog whereTitle($value)
 * @method static Builder|Blog whereSlug($value)
 * @method static Builder|Blog whereBody($value)
 * @method static Builder|Blog whereUserId($value)
 * @method static Builder|Blog whereCategoryId($value)
 * @method static Builder|Blog whereUpdatedAt($value)
 * @method static Blog create($values)
 * @mixin Model
 * @property-read Collection|Message[] $messages
 * @property-read User $user
 * @property-read Category $category
 */
class Blog extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model)
        {
            $model->generateSlug();
            $model->addUser();
        });
    }

    protected function generateSlug()
    {
        $this->slug = \Illuminate\Support\Str::slug($this->title);
    }

    protected function addUser()
    {
        $this->user_id = auth()->id();
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
