<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    protected $table = 'ratings';
    protected $fillable = ['user_id', 'item_id', 'rating', 'comment'];
    protected $primaryKey = 'rating_id';

    public function item()
    {
        return $this->belongsTo(Items::class, 'item_id', 'item_id');
    }

    protected static function booted()
    {
        static::created(function ($rating) {
            $rating->item->updateAverageRating();
        });

        static::updated(function ($rating) {
            $rating->item->updateAverageRating();
        });

        static::deleted(function ($rating) {
            $rating->item->updateAverageRating();
        });
    }

}
