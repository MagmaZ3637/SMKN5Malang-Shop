<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    protected $fillable = [
        'order_id',
        'item_id',
        'jumlah'
    ];
    protected $primaryKey = 'order_detail_id';

    public function order(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Order', 'order_id', 'order_id');
    }

    public function item(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo('App\Models\Items', 'item_id', 'item_id');
    }
}
