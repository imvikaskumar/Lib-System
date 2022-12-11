<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function scopeActive($query)
    {
        return $query->where("is_disabled", 0);
    }

    public function scopeOfSearchBook($query, $input)
    {
        if (is_null($input)) {
            return $query;
        }
        return $query->where("book_name", "like", "%$input%");
    }
}