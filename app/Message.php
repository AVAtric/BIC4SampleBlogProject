<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Message
 *
 * @property int $id
 * @property string $body
 * @property string $slug
 * @property int $user_id
 * @property int $blog_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Message newModelQuery()
 * @method static Builder|Message newQuery()
 * @method static Builder|Message query()
 * @method static Builder|Message whereCreatedAt($value)
 * @method static Builder|Message whereId($value)
 * @method static Builder|Message whereSlug($value)
 * @method static Builder|Message whereBody($value)
 * @method static Builder|Message whereUserId($value)
 * @method static Builder|Message whereBlogId($value)
 * @method static Builder|Message whereUpdatedAt($value)
 * @method static Message create($values)
 * @mixin Model
 * @property-read User $user
 * @property-read Blog $blog
 */
class Message extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->generateSlug();
            $model->addUser();
        });
    }

    protected function generateSlug()
    {
        $this->slug = \Illuminate\Support\Str::slug(auth()->id() . ' - ' .rand() . ' - ' . $this->id);
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

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

}
