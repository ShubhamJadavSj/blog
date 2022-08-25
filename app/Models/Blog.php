<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'creator_id',
        'title',
        'description',
        'published_at'
    ];

    protected $dates = [
        'published_at'
    ];

    protected static function booted()
    {
        static::creating(function($model) {
            $model->creator_id = $model->creator_id ?? auth()->id();
        });
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function scopeByAuthUser($query)
    {
        return $query->where('creator_id', auth()->id());
    }
}
