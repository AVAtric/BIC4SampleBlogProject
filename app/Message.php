<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        $this->slug = \Illuminate\Support\Str::slug($this->body);
    }

    protected function addUser()
    {
        $this->user_id = auth()->user()->id;
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
