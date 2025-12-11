<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table = 'items';
    protected $fillable = [
        'item_name',
        'item_price',
        'item_image',
        'item_stock',
        'item_brand',
        'item_color',
        'item_weight',
        'item_dimension',
        'item_description',
        'item_discount',
        'rating',
    ];

    protected $primaryKey = 'item_id';

    public function rating()
    {
        return $this->hasMany(Ratings::class, 'item_id', 'item_id');
    }

    public function updateAverageRating()
    {
        $avg = $this->rating()->avg('rating') ?? 0;

        $this->rating = round($avg);
        $this->save();
    }

}
