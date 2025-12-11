<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Orders extends Model
{
    protected $table = 'orders';
    protected $fillable = ['user_id', 'order_number', 'order_status'];
    protected $primaryKey = 'order_id';

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'user_id');
    }
}
