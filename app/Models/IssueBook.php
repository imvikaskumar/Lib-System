<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueBook extends Model
{
    /**
     * Get the book details that owns the IssueBook
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function myBook()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

}