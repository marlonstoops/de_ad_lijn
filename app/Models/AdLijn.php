<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdLijn extends Model
{
    protected $table = 'ad_lijnen';

    protected $fillable = [
        'name',
        'mobile',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
