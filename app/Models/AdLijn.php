<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdLijn extends Model
{
    use SoftDeletes;

    protected $table = 'ad_lijnen';

    protected $fillable = [
        'name',
        'mobile',
        'message_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
