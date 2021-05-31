<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShortUrl extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'url',
    ];

    public function getShortUrlAttribute()
    {
        return route('short-url', $this->code);
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            $unique = false;
            $code = '';

            while (! $unique) {
                $code = Str::random(6);

                $unique = ! self::where('code', $code)->exists();
            }

            $model->code = $code;
        });
    }
}
